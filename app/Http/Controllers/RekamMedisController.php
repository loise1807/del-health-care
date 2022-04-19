<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'mahasiswa'){
            $data = DB::table('rekam_medis')
                        ->orderBy('rekam_medis.tanggal', 'asc')
                        ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'rekam_medis.mhs_id')
                        ->select('rekam_medis.*','mahasiswas.nama as nama_mahasiswa','mahasiswas.id as id_mahasiswa')
                        ->where('mahasiswas.user_id', auth()->user()->id)
                        ->get();

            return view('Mahasiswa.RekamMedis.rekammedis',[
                'rekmeds' => $data,
                'title' => "Rekam Medis"
            ]);
        }elseif(auth()->user()->role == 'petugas'){
            $data = DB::table('rekam_medis')
                        ->orderBy('rekam_medis.tanggal', 'asc')
                        ->orderBy('mahasiswas.nama', 'asc')
                        ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'rekam_medis.mhs_id')
                        ->select('rekam_medis.*','mahasiswas.nama as nama_mahasiswa','mahasiswas.id as id_mahasiswa')
                        // ->where('mahasiswas.user_id', auth()->user()->id)
                        ->get();
            


            // return 'petugas';
            return view('PengurusAsrama.RekamMedis.rekammedis',[
                'rekmeds' => $data,
                'title' => "Rekam Medis"
            ]);
        }

        // return $data;
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
     * @param  \App\Models\RekamMedis  $rekammedis
     * @return \Illuminate\Http\Response
     */
    public function show($rekmeds)
    {
        $data = DB::table('mahasiswas')
                    ->leftJoin('rekam_medis', 'mahasiswas.id', '=', 'rekam_medis.mhs_id')
                    ->select('mahasiswas.*')
                    ->where('rekam_medis.id',$rekmeds)
                    ->first();
        
                    // return $data;
       
                    
        if($data){
            if(auth()->user()->role == 'mahasiswa'){
                if (auth()->user()->id == $data->user_id && $data->user_id != null) {
                    return view('Mahasiswa.RekamMedis.show',[
                        'rekmed' => RekamMedis::where('id',$rekmeds)->first(),
                        'mahasiswa' => $data,
                        'title' => "Rekam Medis / Detail Rekam Medis"
                    ]);
                }else{
                    return back();
                }
            }elseif(auth()->user()->role == 'petugas'){
                return view('PengurusAsrama.RekamMedis.show',[
                    'rekmed' => RekamMedis::where('id',$rekmeds)->first(),
                    'mahasiswa' => $data,
                    'title' => "Rekam Medis / Detail Rekam Medis"
                ]);
            }
        }else{
            return back();
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamMedis  $rekammedis
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedis $rekammedis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamMedis  $rekammedis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamMedis $rekammedis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamMedis  $rekammedis
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedis $rekammedis)
    {
        //
    }
}
