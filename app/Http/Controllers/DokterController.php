<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('dokters')
                    ->leftjoin('users', 'users.id', '=', 'dokters.user_id')
                    ->get();
        
        return view('Admin.Dokter.dokter')->with('dokters', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Dokter.create');
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
            'no_pegawai_dokter' => 'required|unique:dokters|max:10',
            'email' => 'email|unique:dokters|max:20',
            'nama' => 'required|max:100',
            'spesialis' => 'required',
            'no_telp' => 'nullable|integer',
            'image' => 'image|file|max:1024'
        ]);

        $akun = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'repassword' => 'same:password'
        ]);

        $akun['password'] = Hash::make($request->password);
        $akun['role'] = 'dokter';
        $akun['status'] = 1;

        User::create($akun);

        $id_akun =User::where('username',$request->username)->first();

        $validateData['user_id'] = $id_akun['id'];

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('gambar-dokter');
        }

        Dokter::create($validateData);

        return redirect('/admin/dokters')->with('success-create','Data Dokter berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        $data = DB::table('dokters')
                    ->leftJoin('users', 'users.id', '=', 'dokters.user_id')
                    ->where('user_id','=',$dokter->user_id)->get();

        return view('Admin.Dokter.show',[
            'dokter' => $dokter,
            'user' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokter $dokter)
    {
        return view('Admin.Dokter.edit',[
            'dokter' => $dokter
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokter $dokter)
    {
        $rules = [
            'nama' => 'required|max:100',
            'spesialis' => 'required',
            'no_telp' => 'nullable|integer',
            'image' => 'image|file|max:1024'
        ];

        if($request->no_pegawai_dokter != $dokter->no_pegawai_dokter){
            $rules['no_pegawai_dokter'] = 'required|unique:dokters';
            $validateData = $request->validate($rules);
        }
        
        if($request->email != $dokter->email){
        $rules['email'] = 'email|required|unique:dokters';
        $validateData = $request->validate($rules);
        }

        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldimage){
                Storage::delete($request->oldimage);
            }

            $validateData['image'] = $request->file('image')->store('gambar-dokter');
        }

        Dokter::where('id',$dokter->id)
            ->update($validateData);

        return redirect('/admin/dokters')->with('success-edit','Data Dokter sudah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        if($dokter->image){
            Storage::delete($dokter->image);
        }

        if($petugasAsrama->user_id != null){
            User::destroy($dokter->user_id);
        }
        Dokter::destroy($dokter->id);
        return redirect('/admin/dokters')->with('success-delete','Data Dokter di hapus!');
    }
}
