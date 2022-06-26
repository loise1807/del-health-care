<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Mahasiswa;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data2 = Mahasiswa::join('rekam_medis', 'mahasiswas.id', '=', 'rekam_medis.mhs_id')->select('mahasiswas.*')->distinct()->get();

        if(request('search')){
            $data2 = Mahasiswa::join('rekam_medis', 'mahasiswas.id', '=', 'rekam_medis.mhs_id')
            ->select('mahasiswas.*')
            ->where('mahasiswas.nama','like', '%'.request('search').'%')
            ->orwhere('mahasiswas.prodi','like', '%'.request('search').'%')
            ->orwhere('mahasiswas.nim','like', '%'.request('search').'%')
            ->distinct()
            ->get();
        }

        if(auth()->user()->role == 'mahasiswa'){
        
            $mahasiswa = Mahasiswa::where('user_id', auth()->user()->id)->first();
            $rekammedis =RekamMedis::where('mhs_id',$mahasiswa->id)->get();

            return view('Mahasiswa.RekamMedis.rekammedis',[
                'mahasiswa' => $mahasiswa,
                'rekammedis' => $rekammedis,
                'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>"Rekam Medis"
            ]);
        }elseif(auth()->user()->role == 'petugas'){
            return view('PengurusAsrama.RekamMedis.rekammedis',[
                'mahasiswa' => $data2,
                'rekammedis' => RekamMedis::all(),
                'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
                'title' =>"Rekam Medis"
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
     * @param  \App\Models\RekamMedis  $rekammedis
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        $mahasiswa= Mahasiswa::where('nim',$nim)->first();
        $data = DB::table('mahasiswas')
                    ->leftJoin('rekam_medis', 'mahasiswas.id', '=', 'rekam_medis.mhs_id')
                    ->select('mahasiswas.*')
                    ->where('rekam_medis.id',$nim)
                    ->first();


        if(auth()->user()->role == 'petugas'){
            $mahasiswa= Mahasiswa::where('nim',$nim)->first();
            
            if(Gate::allows('home-pengurus')){
                return view('PengurusAsrama.RekamMedis.show',[
                    'rekammedis' => RekamMedis::where('mhs_id',$mahasiswa->id)->get(),
                    'mahasiswa' => $mahasiswa,
                    'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
                    'title' =>"Rekam Medis / Detail Rekam Medis"
                ]);
            }
        }

        if(auth()->user()->role == 'mahasiswa'){
            $rekammedis = RekamMedis::find($nim);
            $mahasiswa = Mahasiswa::find($rekammedis->mhs_id);
            // return $mahasiswa;

            return view('Mahasiswa.RekamMedis.show',[
                'rekmed' => $rekammedis,
                'mahasiswa' => $mahasiswa,
                'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get(),
                'title' =>"Rekam Medis / Detail Rekam Medis"
            ]);
        }

        // if($data){
        //     if(auth()->user()->role == 'mahasiswa'){
        //         if (auth()->user()->id == $data->user_id && $data->user_id != null) {
        //             return view('Mahasiswa.RekamMedis.show',[
        //                 'rekmed' => RekamMedis::where('id',$rekmeds)->first(),
        //                 'mahasiswa' => $data,
        //                 'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
        //                 'title' =>"Rekam Medis / Detail Rekam Medis"
        //             ]);
        //         }else{
        //             return back();
        //         }
        //     }elseif(auth()->user()->role == 'petugas'){
        //         return view('PengurusAsrama.RekamMedis.show',[
        //             'rekammedis' => RekamMedis::where('mhs_id',$mahasiswa->id)->get(),
        //             'mahasiswa' => $mahasiswa,
        //             'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
        //             'title' =>"Rekam Medis / Detail Rekam Medis"
        //         ]);
        //     }
        // }else{
        //     return back();
        // }
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

    public function showDetail($rekamMedis){
        $rekmed = RekamMedis::find($rekamMedis);
        $mahasiswa = Mahasiswa::find($rekmed->mhs_id);

        if(Gate::allows('home-pengurus')){
            return view('PengurusAsrama.RekamMedis.showDetail',[
                'rekammedis' => $rekmed,
                'mahasiswa' => $mahasiswa,
                'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
                'title' =>"Rekam Medis / Detail Rekam Medis"
            ]);
        }
    }
}
