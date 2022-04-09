<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Asrama;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('mahasiswas')
                    ->leftjoin('users', 'users.id', '=', 'mahasiswas.user_id')
                    ->leftjoin('asramas', 'asramas.id', '=', 'mahasiswas.asrama_id')
                    ->get();
        // return view('Admin.Mahasiswa.mahasiswa',[
        //     'mahasiswas' => $data,
        //     'asramas' => Asrama::all(),
        //     'users' => User::all('username')
        // ]);

        // dd($data);

        return view('Admin.Mahasiswa.mahasiswa')->with('mahasiswas', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Mahasiswa.create',[
            'asramas' => Asrama::all()
        ]);
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
            'asrama_id' => 'required',
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'email' => 'email|unique:mahasiswas',
            'prodi' => 'required',
            'angkatan' => 'required',
            'alamat' => 'nullable',
            'no_telp' => 'nullable|integer',
            'tanggal_lahir' => 'nullable',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('gambar-mahasiswa');
        }

        Mahasiswa::create($validateData);

        return redirect('/admin/mahasiswas')->with('success-create','Data Mahasiswa berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $data = DB::table('mahasiswas')
                    ->leftJoin('users', 'users.id', '=', 'mahasiswas.user_id')
                    ->leftJoin('asramas', 'asramas.id', '=', 'mahasiswas.asrama_id')
                    ->where('user_id','=',$mahasiswa->user_id)->get();

        return view('Admin.Mahasiswa.show',[
            'mahasiswa' => $mahasiswa,
            'user' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('Admin.Mahasiswa.edit',[
            'mahasiswa' => $mahasiswa,
            'asramas' => Asrama::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $rules = [
            'asrama_id' => 'required',
            'nama' => 'required|max:255',
            'prodi' => 'required',
            'angkatan' => 'required',
            'alamat' => 'required',
            'alamat' => 'nullable',
            'no_telp' => 'nullable|integer',
            'tanggal_lahir' => 'nullable',
            'image' => 'image|file|max:1024'
        ];

        if($request->nim != $mahasiswa->nim){
            $rules['nim'] = 'required|unique:mahasiswas';
            $validateData = $request->validate($rules);
        }
        
        if($request->email != $mahasiswa->email){
            $rules['email'] = 'email|required|unique:mahasiswas';
            $validateData = $request->validate($rules);
        }

        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldimage){
                Storage::delete($request->oldimage);
            }

            $validateData['image'] = $request->file('image')->store('gambar-mahasiswa');
        }

        Mahasiswa::where('id',$mahasiswa->id)
            ->update($validateData);

        return redirect('/admin/mahasiswas')->with('success-edit','Data Mahasiswa sudah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        if($mahasiswa->image){
            Storage::delete($mahasiswa->image);
        }

        Mahasiswa::destroy($mahasiswa->id);
        return redirect('/admin/mahasiswas')->with('success-delete','Data Mahasiswa di hapus!');
    }
    
}
