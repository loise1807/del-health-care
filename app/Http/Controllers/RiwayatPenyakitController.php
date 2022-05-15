<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use App\Models\RiwayatPenyakit;
use Illuminate\Support\Facades\DB;

class RiwayatPenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'mahasiswa'){
            $data = DB::table('riwayat_penyakits')
                        ->orderBy('riwayat_penyakits.created_at', 'asc')
                        ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'riwayat_penyakits.mhs_id')
                        ->select('riwayat_penyakits.*','mahasiswas.nama as nama_mahasiswa','mahasiswas.id as id_mahasiswa')
                        ->where('mahasiswas.user_id', auth()->user()->id)
                        ->get();
            // return $data;
            return view('Mahasiswa.RiwayatPenyakit.riwayatpenyakit',[
                'riwayat_penyakits' => $data,
                'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>"Riwayat Penyakit"
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
     * @param  \App\Models\RiwayatPenyakit  $riwayatPenyakit
     * @return \Illuminate\Http\Response
     */
    public function show(RiwayatPenyakit $riwayatpenyakit)
    {
        $data = DB::table('mahasiswas')
                    ->leftJoin('riwayat_penyakits', 'mahasiswas.id', '=', 'riwayat_penyakits.mhs_id')
                    ->select('mahasiswas.*')
                    ->where('riwayat_penyakits.id',$riwayatpenyakit->id)
                    ->where('riwayat_penyakits.mhs_id','like',$riwayatpenyakit->mhs_id)
                    ->first();

        if($data){
            if (auth()->user()->id == $data->user_id && $data->user_id != null) {
                return view('Mahasiswa.RiwayatPenyakit.show',[
                    'riwayat_penyakit' => RiwayatPenyakit::where('id',$riwayatpenyakit->id)->first(),
                    'mahasiswa' => $data,
                    'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>"Riwayat Penyakit / Detail Riwayat Penyakit"
                ]);
            }else{
                return back();
            }
        }else{
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RiwayatPenyakit  $riwayatPenyakit
     * @return \Illuminate\Http\Response
     */
    public function edit(RiwayatPenyakit $riwayatPenyakit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RiwayatPenyakit  $riwayatPenyakit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RiwayatPenyakit $riwayatPenyakit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RiwayatPenyakit  $riwayatPenyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy(RiwayatPenyakit $riwayatPenyakit)
    {
        //
    }
}
