<?php

namespace App\Http\Controllers;

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
                    ->select('req_konsuls.*','mahasiswas.nama as nama_mahasiswa','dokters.nama as nama_dokter')
                    ->where('dokter_id', auth()->user()->id)
                    ->get();

        // return $data;
        // return view('Dokter.RekamMedis.rekammedis')->with('rekammedis',$data);
        return view('Dokter.Konsultasi.konsultasi',[
            'konsultasis' => $data,
            'title' => "Konsultasi"
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

    public function terima(ReqKonsul $reqKonsul)
    {
        // return $reqKonsul;
        ReqKonsul::where('id',$reqKonsul->id)
                    ->update([
                        'status' => 'Diterima',
                        'acc_dokter' => 'Setuju'
                    ]);

        return redirect('/dokter/konsultasi')->with('success','Konsultasi berhasil diterima');
    }

    public function tolak(ReqKonsul $reqKonsul)
    {
        // return $reqKonsul;
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
        // return $reqKonsul;
        return view('Dokter.Konsultasi.show',[
            'reqKonsul' => $reqKonsul,
            'mahasiswa' => Mahasiswa::find($reqKonsul->mhs_id),
            'title' => "Konsultasi / Detail Konsultasi"
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
