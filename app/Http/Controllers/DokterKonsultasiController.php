<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Mahasiswa;
use App\Models\ReqKonsul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterKonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('req_konsuls')
                    ->orderBy('req_konsuls.tgl_konsul', 'desc')
                    ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'req_konsuls.mhs_id')
                    ->leftJoin('dokters', 'dokters.id', '=', 'req_konsuls.dokter_id')
                    ->select('req_konsuls.*','mahasiswas.nama as nama_mahasiswa','mahasiswas.no_telp as telp_mahasiswa','dokters.nama as nama_dokter')
                    ->where('dokters.user_id', auth()->user()->id)
                    ->get();

        // return $data;

        return view('Dokter.Konsultasi.konsultasi',[
            'konsultasis' => $data,
            'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>"Konsultasi"
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

    public function terima(ReqKonsul $reqKonsul, Request $request)
    {
        $mahasiswa = Mahasiswa::find($reqKonsul->mhs_id);
        // return $mahasiswa;

        $validatedData = $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);

        $validatedData['pengirim_id'] = auth()->user()->id;
        $validatedData['penerima_id'] = $mahasiswa->user_id;
        $validatedData['status'] = 0;
        $validatedData['bgcolor'] = 'rgb(7, 190, 148,0.2)';

        Notifikasi::create($validatedData);

        ReqKonsul::where('id',$reqKonsul->id)
                    ->update([
                        'status' => 'Diterima',
                        'acc_dokter' => 'Setuju'
                    ]);

        return redirect('/dokter/konsultasi')->with('success','Konsultasi berhasil diterima');
    }

    public function tolak(ReqKonsul $reqKonsul, Request $request)
    {
        $mahasiswa = Mahasiswa::find($reqKonsul->mhs_id);

        $validatedData = $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);

        $validatedData['pengirim_id'] = auth()->user()->id;
        $validatedData['penerima_id'] = $mahasiswa->user_id;
        $validatedData['status'] = 0;
        $validatedData['bgcolor'] = 'rgb(255, 0, 0,0.2)';

        Notifikasi::create($validatedData);

        ReqKonsul::where('id',$reqKonsul->id)
                    ->update([
                        'status' => 'Ditolak',
                        'acc_dokter' => 'Tidak Setuju'
                    ]);

        return redirect('/dokter/konsultasi')->with('success','Konsultasi berhasil ditolak');
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
     * @param  \App\Models\ReqKonsul  $reqKonsul
     * @return \Illuminate\Http\Response
     */
    public function show(ReqKonsul $reqKonsul)
    {
        return view('Dokter.Konsultasi.show',[
            'reqKonsul' => $reqKonsul,
            'mahasiswa' => Mahasiswa::find($reqKonsul->mhs_id),
            'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>"Konsultasi / Detail Konsultasi"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReqKonsul  $reqKonsul
     * @return \Illuminate\Http\Response
     */
    public function edit(ReqKonsul $reqKonsul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReqKonsul  $reqKonsul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReqKonsul $reqKonsul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReqKonsul  $reqKonsul
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReqKonsul $reqKonsul)
    {
        //
    }
}
