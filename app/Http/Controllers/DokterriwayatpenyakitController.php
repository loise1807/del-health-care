<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use App\Models\RiwayatPenyakit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class DokterriwayatpenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('riwayat_penyakits')
                    ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'riwayat_penyakits.mhs_id')
                    ->select('riwayat_penyakits.*','mahasiswas.nama as nama_mahasiswa','mahasiswas.prodi as prodi_mahasiswa','mahasiswas.angkatan as angkatan_mahasiswa')
                    ->get();
              
        $names = RiwayatPenyakit::select('mhs_id')
                    ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'riwayat_penyakits.mhs_id')
                    ->select('riwayat_penyakits.mhs_id','mahasiswas.nama as nama_mahasiswa','mahasiswas.prodi as prodi_mahasiswa','mahasiswas.angkatan as angkatan_mahasiswa','mahasiswas.no_telp as no_telp')
                    ->orderBy('nama_mahasiswa','asc')
                    ->distinct()
                    ->get();

        if(request('search')){
            $names = RiwayatPenyakit::select('mhs_id')
                        ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'riwayat_penyakits.mhs_id')
                        ->select('riwayat_penyakits.mhs_id','mahasiswas.nama as nama_mahasiswa','mahasiswas.prodi as prodi_mahasiswa','mahasiswas.angkatan as angkatan_mahasiswa','mahasiswas.no_telp as no_telp')
                        ->orderBy('nama_mahasiswa','asc')
                        ->distinct()
                        ->where('mahasiswas.nama','like', '%'.request('search').'%')
                        ->orwhere('mahasiswas.prodi','like', '%'.request('search').'%')
                        ->orwhere('mahasiswas.angkatan','like', '%'.request('search').'%')
                        ->orwhere('riwayat_penyakits.nama_penyakit','like', '%'.request('search').'%')
                        ->get();
        }
        
        

        // return view('Dokter.RiwayatPenyakit.riwayatpenyakit')->with('riwayatpenyakits',$data,);
        if(auth()->user()->role == 'dokter'){
            return view('Dokter.RiwayatPenyakit.riwayatpenyakit',[
                'names' => $names,
                'riwayatpenyakits' => RiwayatPenyakit::all(),
                'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
                'title' =>"Riwayat Penyakit"
            ]);
        }elseif(auth()->user()->role == 'petugas'){
            return view('PengurusAsrama.RiwayatPenyakit.riwayatpenyakit',[
                'names' => $names,
                'riwayatpenyakits' => RiwayatPenyakit::all(),
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
        $data = DB::table('mahasiswas')
                    ->select('mahasiswas.id as mhs_id','mahasiswas.nama as nama_mahasiswa')
                    ->get();

        if(auth()->user()->role == 'dokter'){
            return view('Dokter.RiwayatPenyakit.create',[
                'mahasiswas' => $data,
                'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
                'title' =>"Riwayat Penyakit / Tambah Riwayat Penyakit"
            ]);
        }elseif(auth()->user()->role == 'petugas'){
            return view('PengurusAsrama.RiwayatPenyakit.create',[
                'mahasiswas' => $data,
                'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
                'title' =>"Riwayat Penyakit / Tambah Riwayat Penyakit"
            ]);
        }
        
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
            'mhs_id' => 'required',
            'nama_penyakit' => 'required'
        ]);

        RiwayatPenyakit::create($validateData);

        if(auth()->user()->role == 'dokter'){
            return redirect('/dokter/riwayatpenyakits')->with('success-create','Data Riwayat Penyakit berhasil ditambah!');
        }elseif(auth()->user()->role == 'petugas'){
            return redirect('/pengurus/riwayatpenyakits')->with('success-create','Data Riwayat Penyakit berhasil ditambah!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RiwayatPenyakit  $riwayatPenyakit
     * @return \Illuminate\Http\Response
     */
    // public function show(RiwayatPenyakit $riwayatPenyakit)
    // {
    //     return view('Dokter.RiwayatPenyakit.show',[
    //         'riwayatpenyakit' => $riwayatPenyakit
    //     ]);
    // }

    public function show($riwayatPenyakit)
    {
        $mahasiswa = Mahasiswa::find($riwayatPenyakit);
        $ripe = RiwayatPenyakit::where('mhs_id',$mahasiswa->id)->get();
        if(auth()->user()->role == 'dokter'){
            return view('Dokter.RiwayatPenyakit.show',[
                'riwayatpenyakits' => $ripe,
                'mahasiswa' => $mahasiswa,
                'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>"Riwayat Penyakit / Detail Penyakit"
            ]);
        }elseif(auth()->user()->role == 'petugas'){
            return view('PengurusAsrama.RiwayatPenyakit.show',[
                'riwayatpenyakits' => $ripe,
                'mahasiswa' => $mahasiswa,
                'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>"Riwayat Penyakit / Detail Penyakit"
            ]);
        }
    }

    // public function detail(RiwayatPenyakit $riwayatPenyakit)
    // {
    //     return view('Dokter.RiwayatPenyakit.show',[
    //         'riwayatpenyakit' => $riwayatPenyakit
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RiwayatPenyakit  $riwayatPenyakit
     * @return \Illuminate\Http\Response
     */
    public function edit(RiwayatPenyakit $riwayatPenyakit)
    {
        
        $data = DB::table('mahasiswas')
                    ->where('id',$riwayatPenyakit->mhs_id)
                    ->first();
        
        // return $data;
        if(auth()->user()->role == 'dokter'){
            return view('Dokter.RiwayatPenyakit.edit',[
                'riwayatPenyakit' => $riwayatPenyakit,
                'mahasiswa' => $data,
                'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>'Riwayat Penyakit / Edit Riwayat Penyakit'
            ]);
        }elseif(auth()->user()->role == 'petugas'){
            return view('PengurusAsrama.RiwayatPenyakit.edit',[
                'riwayatPenyakit' => $riwayatPenyakit,
                'mahasiswa' => $data,
                'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>'Riwayat Penyakit / Edit Riwayat Penyakit'
            ]);
        }
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
        $rules = [
            'nama_penyakit' => 'required'
        ];

        if($request->nama_penyakit != $riwayatPenyakit->nama_penyakit){
            $rules['nama_penyakit'] = 'required';
            $validateData = $request->validate($rules);
        }

        $validateData = $request->validate($rules);

        RiwayatPenyakit::where('id',$request->id)
            ->update($validateData);

        if(auth()->user()->role == 'dokter'){
            return redirect('/dokter/riwayatpenyakits')->with('success-update','Riwayat Penyakit sudah diubah');
        }elseif(auth()->user()->role == 'petugas'){
            return redirect('/pengurus/riwayatpenyakits')->with('success-update','Riwayat Penyakit sudah diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RiwayatPenyakit  $riwayatPenyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy(RiwayatPenyakit $riwayatPenyakit)
    {
        RiwayatPenyakit::destroy($riwayatPenyakit->id);

        if(auth()->user()->role == 'dokter'){
            return redirect('/dokter/riwayatpenyakits')->with('success-delete','Data Riwayat Penyakit di hapus!');
        }elseif(auth()->user()->role == 'petugas'){
            return redirect('/pengurus/riwayatpenyakits')->with('success-delete','Data Riwayat Penyakit di hapus!');
        }
    }
}
