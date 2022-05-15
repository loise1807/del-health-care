<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\User;
use App\Models\Asrama;
use App\Models\Dokter;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\PetugasAsrama;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Mahasiswa 
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
            
        return view('Mahasiswa.Profile.profile',[
            'mahasiswa' => Mahasiswa::where('user_id',auth()->user()->id)->first(),
            'asrama' => $asrama,
            'petugas_asrama' => $petugas_asrama,
            'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>'Profile'
        ]);
    }

    

    public function editMahasiswa($mahasiswa)
    {
        return view('Mahasiswa.Profile.edit',[
            'mahasiswa' => Mahasiswa::find($mahasiswa),
            'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>'Profile'
        ]);
    }

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

    // Pengurus
    public function indexPengurus()
    {
        $asrama = PetugasAsrama::where('user_id',auth()->user()->id)->first();
        return view('PengurusAsrama.Profile.profile',[
            'pengurus' => PetugasAsrama::where('user_id',auth()->user()->id)->first(),
            'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>'Profile'
        ]);
    }

    public function editPengurus($pengurus)
    {
        return view('PengurusAsrama.Profile.edit',[
            'pengurus' => PetugasAsrama::find($pengurus),
            'asramas' => Asrama::all(),
            'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>'Profile / Edit Profile'
        ]);
    }

    public function updatePengurus(Request $request, $pengurus)
    {
        // return $request;
        $pengurus = PetugasAsrama::find($pengurus);

        $rules = [
            'nama' => 'required|max:255',
            'email' => 'required|max:255',
            'jabatan' => 'required',
            'asrama_id' => 'required',
            'no_telp' => 'nullable|integer',
            'image' => 'image|file|max:1024'
        ];
        
        if($request->email != $pengurus->email){
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

        PetugasAsrama::where('id',$pengurus->id)
            ->update($validateData);

        return redirect('/petugas/profile')->with('success-edit','Data Anda sudah diubah');
    }

    // Dokter
    public function indexDokter()
    {  
        return view('Dokter.Profile.profile',[
            'dokter' => Dokter::where('user_id',auth()->user()->id)->first(),
            'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>'Profile'
        ]);
    }

    public function editDokter($dokter)
    {
        return view('Dokter.Profile.edit',[
            'dokter' => Dokter::find($dokter),
            'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>'Profile / Edit Profile'
        ]);
    }

    public function updateDokter(Request $request, $dokter)
    {
        // return $request;
        $dataDokter = Dokter::find($dokter);

        $rules = [
            'nama' => 'required|max:255',
            'spesialis' => 'required',
            'no_telp' => 'nullable|integer',
            'image' => 'image|file|max:1024'
        ];
        
        if($request->email != $dataDokter->email){
            $rules['email'] = 'email|required|unique:mahasiswas';
            $validateData = $request->validate($rules);
        }

        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldimage){
                Storage::delete($request->oldimage);
            }

            $validateData['image'] = $request->file('image')->store('gambar-dokter');
        }

        Dokter::where('id',$dataDokter->id)
            ->update($validateData);

        return redirect('/dokter/profile')->with('success-edit','Data Anda sudah diubah');
    }

    

    // Password
    public function indexPassword(){
        return view('password',[
            'user' => User::find(auth()->user()->id),
            'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>'Ubah Password'
        ]);
    }

    public function updatePassword(Request $request, $user){
        $rules = $request->validate([
            'password' => 'required',
            'repassword' => 'same:password'
        ]);

        $validateData['password'] = Hash::make($request->password);

        User::where('id',$user)
                ->update($validateData);

        return redirect('/'.auth()->user()->role.'/profile')->with('success-change','Password Berhasil di ganti!');
    }

}
