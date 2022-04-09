<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
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
                    ->select('riwayat_penyakits.*','mahasiswas.nama as nama_mahasiswa')
                    ->get();
           
        // return view('Dokter.RiwayatPenyakit.riwayatpenyakit')->with('riwayatpenyakits',$data,);
        if(auth()->user()->role == 'dokter'){
            return view('Dokter.RiwayatPenyakit.riwayatpenyakit',[
                'riwayatpenyakits' => $data,
                'title' => "Riwayat Penyakit"
            ]);
        }elseif(auth()->user()->role == 'petugas'){
            return view('PengurusAsrama.RiwayatPenyakit.riwayatpenyakit',[
                'riwayatpenyakits' => $data,
                'title' => "Riwayat Penyakit"
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
                'title' => "Tambah Riwayat Penyakit"
            ]);
        }elseif(auth()->user()->role == 'petugas'){
            return view('PengurusAsrama.RiwayatPenyakit.create',[
                'mahasiswas' => $data,
                'title' => "Tambah Riwayat Penyakit"
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
        
        
        // return $request;
        $validateData = $request->validate([
            'mhs_id' => 'required',
            'nama_penyakit' => 'required'
        ]);

        // return dd($validateData);

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

    public function show(RiwayatPenyakit $riwayatPenyakit)
    {
        if(auth()->user()->role == 'dokter'){
            return view('Dokter.RiwayatPenyakit.show',[
                'riwayatpenyakit' => $riwayatPenyakit,
                'mahasiswa' => Mahasiswa::find($riwayatPenyakit->mhs_id),
                'title' => "Detail Penyakit"
            ]);
        }elseif(auth()->user()->role == 'petugas'){
            return view('PengurusAsrama.RiwayatPenyakit.show',[
                'riwayatpenyakit' => $riwayatPenyakit,
                'mahasiswa' => Mahasiswa::find($riwayatPenyakit->mhs_id),
                'title' => "Detail Penyakit"
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
                'mahasiswa' => $data
            ]);
        }elseif(auth()->user()->role == 'petugas'){
            return view('PengurusAsrama.RiwayatPenyakit.edit',[
                'riwayatPenyakit' => $riwayatPenyakit,
                'mahasiswa' => $data
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
        // return $request;
        
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
        // return $riwayatPenyakit->id;
        RiwayatPenyakit::destroy($riwayatPenyakit->id);

        if(auth()->user()->role == 'dokter'){
            return redirect('/dokter/riwayatpenyakits')->with('success-delete','Data Riwayat Penyakit di hapus!');
        }elseif(auth()->user()->role == 'petugas'){
            return redirect('/pengurus/riwayatpenyakits')->with('success-delete','Data Riwayat Penyakit di hapus!');
        }
    }
}
