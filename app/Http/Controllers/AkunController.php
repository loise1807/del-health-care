<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Asrama;
use App\Models\PetugasAsrama;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Akun.akun',[
            'users' => User::all()
        ]);
    }

    public function hubungkan(User $user){
        if($user->role == 'dokter'){
            $data = DB::table('dokters')
                    ->where('user_id','=',null)->get();
            
            return view('Admin.Akun.hubungkan',[
                'user' => $user,
                'dokters' => $data
            ]);
        }
        if($user->role == 'mahasiswa'){
            $data = DB::table('mahasiswas')
                    ->where('user_id','=',null)->get();
            
            return view('Admin.Akun.hubungkan',[
                'user' => $user,
                'mahasiswas' => $data
            ]);
        }
        if($user->role == 'petugas'){
            $data = DB::table('petugas_asramas')
                    ->where('user_id','=',null)->get();
            
            return view('Admin.Akun.hubungkan',[
                'user' => $user,
                'petugas_asramas' => $data
            ]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Akun.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|max:20|unique:users',
            'role' => 'required|max:15',
            'password' => 'required|min:5|max:20',
            'repassword' => 'same:password'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);
        if($request->role == 'admin'){
            $validateData['status'] = 1;
        }else{
            $validateData['status'] = 0;
        }

        User::create($validateData);

        return redirect('/admin/users')->with('success','Akun Baru Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
        if($user->role =='admin'){
            return view('Admin.Akun.show',[
                'user' => $user
            ]);
        }elseif($user->role =='mahasiswa'){
            $data = DB::table('mahasiswas')
                    ->where('user_id','=',$user->id)->first();
            
            if($data == null){
                return view('Admin.Akun.show',[
                    'user' => $user,
                    'mahasiswa' => null
                ]);
            }else{
                return view('Admin.Akun.show',[
                    'user' => $user,
                    'mahasiswa' => $data
                ]);
            }
        }elseif($user->role =='dokter'){
            $data = DB::table('dokters')
                    ->where('user_id','=',$user->id)->first();
            
            if($data == null){
                return view('Admin.Akun.show',[
                    'user' => $user,
                    'dokter'=> null
                ]);
            }else{
                return view('Admin.Akun.show',[
                'user' => $user,
                'dokter' => $data
            ]);
        }
        }elseif($user->role =='petugas'){
            $data = DB::table('petugas_asramas')
                    ->where('user_id','=',$user->id)->first();
            
            if($data == null){
                return view('Admin.Akun.show',[
                    'user' => $user,
                    'petugas_asrama' => null
                ]);
            }else{
                return view('Admin.Akun.show',[
                    'user' => $user,
                    'petugas_asrama' => $data
                ]);
            }        
        }else{
            return view('Admin.Akun.show',[
                'user' => $user
            ]);
        }
        
        // return $user->role;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
    
            return view('Admin.Akun.edit',[
                'user' => $user
            ]);
       
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($request->aksi == 'hubungkan'){
            // return $user;
            if($request->role == 'mahasiswa'){
                Mahasiswa::where('id',$request->id_user)
                    ->update(['user_id' => $user->id]);
            }elseif($request->role == 'petugas'){
                PetugasAsrama::where('id',$request->id_user)
                    ->update(['user_id' => $user->id]);
            }elseif($request->role == 'dokter'){
                Dokter::where('id',$request->id_user)
                    ->update(['user_id' => $user->id]);
            }

            User::where('id',$user->id)
                ->update(['status' => 1]);
                  
            return redirect('/admin/users')->with('success','Data Akun sudah dihubungkan!');
        }else{
            $request->validate([
                'repassword' => 'same:password'
            ]);
    
            if($request->username != $user->username){
                $request->validate([
                    'username' => 'required|unique:users'
                ]);
                $user->username = $request->username;
            }
            if ($request->password)
                $user->password = Hash::make($request->password);
            $user->save();
            
            return redirect('/admin/users')->with('success','Akun sudah diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->role == 'mahasiswa'){
            Mahasiswa::where('user_id',$user->id)
                ->update(['user_id' => null]);
        }elseif($user->role == 'petugas'){
            PetugasAsrama::where('user_id',$user->id)
                ->update(['user_id' => null]);
        }elseif($user->role == 'dokter'){
            Dokter::where('user_id',$user->id)
                ->update(['user_id' => null]);
        }
              
        User::destroy($user->id);
        return redirect('/admin/users')->with('success','Data Akun di hapus!');
    }
}
