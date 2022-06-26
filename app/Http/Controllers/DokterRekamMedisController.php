<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Mahasiswa;
use App\Models\Notifikasi;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class DokterRekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mahasiswa::join('rekam_medis', 'mahasiswas.id', '=', 'rekam_medis.mhs_id')->select('mahasiswas.*')->distinct()->get();

        if(request('search')){
            $data = Mahasiswa::join('rekam_medis', 'mahasiswas.id', '=', 'rekam_medis.mhs_id')
            ->select('mahasiswas.*')
            ->where('mahasiswas.nama','like', '%'.request('search').'%')
            ->orwhere('mahasiswas.prodi','like', '%'.request('search').'%')
            ->orwhere('mahasiswas.nim','like', '%'.request('search').'%')
            ->distinct()
            ->get();
        }
                    
        return view('Dokter.RekamMedis.rekammedis',[
            'mahasiswa' => $data,
            'rekammedis' => RekamMedis::all(),
            'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>"Rekam Medis"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Dokter.RekamMedis.create',[
            'mahasiswas' => Mahasiswa::orderBy('nama', 'asc')->get(),
            'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>"Rekam Medis / Tambah Rekam Medis"
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
        $dokter = Dokter::find(auth()->user()->id);
        $mahasiswa= Mahasiswa::find($request->mhs_id);
        $validateData = $request->validate([
            'mhs_id' => 'required',
            'tanggal' => 'required',
            'anamnesa' => 'required|max:255',
            'pemeriksaan_fisik' => 'required|max:255',
            'diagnosa' => 'required|max:255',
            'plksn_edukasi' => 'required|max:255'
        ]);

        if($mahasiswa['user_id'] != null){
            $notifikasi['pengirim_id'] = auth()->user()->id;
            $notifikasi['penerima_id'] = $mahasiswa['user_id'];
            $notifikasi['judul'] = 'Rekam Medis Anda telah di tambahkan';
            $notifikasi['isi'] = $dokter->nama.' telah menambah data Rekam Medis Anda pada '.date('l, d M Y', strtotime($request->tanggal));
            $notifikasi['status'] = 0;
            $notifikasi['bgcolor'] = 'rgb(7, 190, 148,0.2)';

            Notifikasi::create($notifikasi);
        }

        RekamMedis::create($validateData);

        return redirect('/dokter/rekammedis')->with('success-create','Data Rekam Medis berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        $mahasiswa= Mahasiswa::where('nim',$nim)->first();
    
        if(Gate::allows('home-dokter')){
            return view('Dokter.RekamMedis.show',[
                'rekammedis' => RekamMedis::where('mhs_id',$mahasiswa->id)->get(),
                'mahasiswa' => $mahasiswa,
                'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
                'title' =>"Rekam Medis / Detail Rekam Medis"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedis $rekamMedis)
    {
        $data = DB::table('mahasiswas')
                    ->where('id',$rekamMedis->mhs_id)
                    ->first();
        
        // return $data;
        return view('Dokter.RekamMedis.edit',[
            'rekammedis' => $rekamMedis,
            'mahasiswa' => $data,
            'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>"Rekam Medis / Edit Rekam Medis"
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamMedis $rekamMedis)
    {

        $rules = [
            'tanggal' => 'required',
            'anamnesa' => 'required|max:255',
            'pemeriksaan_fisik' => 'required|max:255',
            'diagnosa' => 'required|max:255',
            'plksn_edukasi' => 'required|max:255'
        ];



        $validateData = $request->validate($rules);

        RekamMedis::where('id',$request->id_rekmed)
            ->update($validateData);

        return redirect('/dokter/rekammedis')->with('success-update','Rekam Medis sudah diubah');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedis $rekamMedis)
    {
        RekamMedis::destroy($rekamMedis->id);

        return Redirect::back()->with('success-delete','Data Rekam Medis di hapus!');
    }

    public function showDetail($rekamMedis){
        $rekmed = RekamMedis::find($rekamMedis);
        $mahasiswa = Mahasiswa::find($rekmed->mhs_id);

        if(Gate::allows('home-dokter')){
            return view('Dokter.RekamMedis.showDetail',[
                'rekammedis' => $rekmed,
                'mahasiswa' => $mahasiswa,
                'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
                'title' =>"Rekam Medis / Detail Rekam Medis"
            ]);
        }
    }
}
