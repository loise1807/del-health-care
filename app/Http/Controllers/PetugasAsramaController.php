<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Asrama;
use Illuminate\Http\Request;
use App\Models\PetugasAsrama;
use Illuminate\Support\Facades\Storage;

class PetugasAsramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('petugas_asramas')
                    ->leftjoin('users', 'users.id', '=', 'petugas_asramas.user_id')
                    ->leftjoin('asramas', 'asramas.id', '=', 'petugas_asramas.asrama_id')
                    ->get();

        return view('Admin.PetugasAsrama.petugas_asrama')->with('petugas_asramas', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.PetugasAsrama.create',[
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
            'no_pegawai' => 'required|unique:petugas_asramas',
            'nama' => 'required',
            'email' => 'email|unique:petugas_asramas',
            'jabatan' => 'required',
            'no_telp' => 'nullable|integer',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('gambar-pengurus');
        }

        PetugasAsrama::create($validateData);

        return redirect('/admin/petugas_asramas')->with('success-create','Data Pengurus Asrama berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PetugasAsrama  $petugasAsrama
     * @return \Illuminate\Http\Response
     */
    public function show(PetugasAsrama $petugasAsrama)
    {
        $data = DB::table('petugas_asramas')
                    ->leftJoin('users', 'users.id', '=', 'petugas_asramas.user_id')
                    ->leftJoin('asramas', 'asramas.id', '=', 'petugas_asramas.asrama_id')
                    ->where('user_id','=',$petugasAsrama->user_id)->get();

        return view('Admin.PetugasAsrama.show',[
            'petugas_asrama' => $petugasAsrama,
            'user' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PetugasAsrama  $petugasAsrama
     * @return \Illuminate\Http\Response
     */
    public function edit(PetugasAsrama $petugasAsrama)
    {
        return view('Admin.PetugasAsrama.edit',[
            'petugas_asrama' => $petugasAsrama,
            'asramas' => Asrama::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PetugasAsrama  $petugasAsrama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PetugasAsrama $petugasAsrama)
    {
        $rules = [
            'asrama_id' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'nullable|integer',
            'image' => 'image|file|max:1024'
        ];

        if($request->no_pegawai != $petugasAsrama->no_pegawai){
            $rules['no_pegawai'] = 'required|unique:petugas_asramas';
            $validateData = $request->validate($rules);
        }
        
        if($request->email != $petugasAsrama->email){
        $rules['email'] = 'email|required|unique:petugas_asramas';
        $validateData = $request->validate($rules);
        }

        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldimage){
                Storage::delete($request->oldimage);
            }

            $validateData['image'] = $request->file('image')->store('gambar-pengurus');
        }

        PetugasAsrama::where('id',$petugasAsrama->id)
            ->update($validateData);

        return redirect('/admin/petugas_asramas')->with('success-edit','Data Pengurus Asrama sudah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PetugasAsrama  $petugasAsrama
     * @return \Illuminate\Http\Response
     */
    public function destroy(PetugasAsrama $petugasAsrama)
    {
        if($petugasAsrama->image){
            Storage::delete($petugasAsrama->image);
        }

        PetugasAsrama::destroy($petugasAsrama->id);
        return redirect('/admin/petugas_asramas')->with('success-delete','Data Pengurus Asrama di hapus!');
    }
}
