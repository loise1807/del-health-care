<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DokterRekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('rekam_medis')
                    ->orderBy('rekam_medis.tanggal', 'desc')
                    ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'rekam_medis.mhs_id')
                    ->select('rekam_medis.*','mahasiswas.nama as nama_mahasiswa')
                    ->get();
                    
        // return view('Dokter.RekamMedis.rekammedis')->with('rekammedis',$data);
        return view('Dokter.RekamMedis.rekammedis',[
            'rekammedis' => $data,
            'title' => "Rekam Medis"
        ]);
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
        return view('Dokter.RekamMedis.create',[
            'mahasiswas' => $data,
            'title' => "Rekam Medis / Tambah Rekam Medis"
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
        // return $request;
        $validateData = $request->validate([
            'mhs_id' => 'required',
            'gejala' => 'required|max:255',
            'diagnosa' => 'required|max:255',
            'deskripsi' => 'required|max:255'
        ]);

        // // return dd($validateData);

        RekamMedis::create($validateData);

        return redirect('/dokter/rekammedis')->with('success','Data Rekam Medis berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedis $rekamMedis)
    {
        // return $rekamMedis;
        if(Gate::allows('home-dokter')){
            return view('Dokter.RekamMedis.show',[
                'rekammedis' => $rekamMedis,
                'mahasiswa' => Mahasiswa::find($rekamMedis->mhs_id),
                'title' => "Rekam Medis / Detail Rekam Medis"
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
            'title' => "Rekam Medis / Edit Rekam Medis"
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
        // return $request;
        
        $rules = [
            'gejala' => 'required',
            'diagnosa' => 'required',
            'deskripsi' => 'required',
            'tanggal' => ' required'
        ];

        $validateData = $request->validate($rules);

        RekamMedis::where('id',$request->id)
            ->update($validateData);

        return redirect('/dokter/rekammedis')->with('success','Rekam Medis sudah diubah');
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

        return redirect('/dokter/rekammedis')->with('success','Data Rekam Medis di hapus!');
    }
}
