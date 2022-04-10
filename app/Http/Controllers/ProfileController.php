<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMahasiswa()
    {
        $asrama = DB::table('mahasiswas')
                    ->leftjoin('users', 'users.id', '=', 'mahasiswas.user_id')
                    ->leftjoin('asramas', 'asramas.id', '=', 'mahasiswas.asrama_id')
                    ->leftjoin('petugas_asramas', 'petugas_asramas.asrama_id', '=', 'asramas.id')
                    ->select('asramas.*')
                    ->first();

        $petugas_asrama = DB::table('petugas_asramas')
                    ->leftjoin('users', 'users.id', '=', 'petugas_asramas.user_id')
                    ->leftjoin('asramas', 'asramas.id', '=', 'petugas_asramas.asrama_id')
                    ->select('petugas_asramas.*')
                    ->first();
            
        // return $asrama;
        return view('Mahasiswa.Profile.profile',[
            'mahasiswa' => Mahasiswa::where('user_id',auth()->user()->id)->first(),
            'asrama' => $asrama,
            'petugas_asrama' => $petugas_asrama,
            'title' => 'Profile'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function editMahasiswa($mahasiswa)
    {
        // return Mahasiswa::find($mahasiswa);
        return view('Mahasiswa.Profile.edit',[
            'mahasiswa' => Mahasiswa::find($mahasiswa),
            'title' => 'Profile'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function updateMahasiswa(Request $request, $mahasiswa)
    {
        // return $request;
        $dataMahasiswa = Mahasiswa::find($mahasiswa);

        $rules = [
            'nama' => 'required|max:255',
            'alamat' => 'nullable',
            'no_telp' => 'nullable|integer',
            'tanggal_lahir' => 'nullable',
            'image' => 'image|file|max:1024'
        ];
        
        if($request->email != $dataMahasiswa->email){
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

        Mahasiswa::where('id',$dataMahasiswa->id)
            ->update($validateData);

        return redirect('/mahasiswa/profile')->with('success-edit','Data Mahasiswa sudah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
