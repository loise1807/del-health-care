<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Mahasiswa;
use App\Models\ReqKonsul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class MahasiswaKonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('req_konsuls')
                    ->orderBy('req_konsuls.tgl_konsul', 'asc')
                    ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'req_konsuls.mhs_id')
                    ->leftJoin('dokters', 'dokters.id', '=', 'req_konsuls.dokter_id')
                    ->select('req_konsuls.*','mahasiswas.nama as nama_mahasiswa','dokters.nama as nama_dokter')
                    ->where('mahasiswas.user_id', auth()->user()->id)
                    ->get();

        // return $data;
        // return view('Dokter.RekamMedis.rekammedis')->with('rekammedis',$data);
        return view('Mahasiswa.Konsultasi.konsultasi',[
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
        $data = DB::table('mahasiswas')
                    ->select('mahasiswas.id as mhs_id','mahasiswas.nama as nama_mahasiswa')
                    ->where('mahasiswas.user_id', auth()->user()->id)
                    ->first();

        return view('Mahasiswa.Konsultasi.create',[
            'dokters' => Dokter::all(),
            'mahasiswa' => $data,
            'title' => "Tambah Konsultasi"
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
            'dokter_id' => 'required',
            'tgl_konsul' => 'required|max:255',
            'deskripsi' => 'required|max:255'
        ]);

        // // return dd($validateData);

        ReqKonsul::create($validateData);

        return redirect('/mahasiswa/konsultasi')->with('success-create','Data Rekam Medis berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReqKonsul  $reqKonsul
     * @return \Illuminate\Http\Response
     */
    public function show(ReqKonsul $reqKonsul)
    {
        $data = DB::table('mahasiswas')
                    ->where('mahasiswas.id', $reqKonsul->mhs_id)
                    ->first();
        
        
        // $mahasiswa = $reqKonsul->mhs_id;
        if (auth()->user()->id == $data->user_id) {
            return view('Mahasiswa.Konsultasi.show',[
                'reqKonsul' => $reqKonsul,
                'mahasiswa' => Mahasiswa::find($reqKonsul->mhs_id),
                'title' => "Detail Konsultasi"
            ]);
        }else{
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReqKonsul  $reqKonsul
     * @return \Illuminate\Http\Response
     */
    public function edit(ReqKonsul $reqKonsul)
    {
        $data = DB::table('mahasiswas')
                    ->where('id',$reqKonsul->mhs_id)
                    ->select('user_id as id_mahasiswa','nama','nim')
                    ->first();
        
        // return $reqKonsul;
        if (auth()->user()->id == $data->id_mahasiswa) {
            return view('Mahasiswa.Konsultasi.edit',[
                'konsultasi' => $reqKonsul,
                'mahasiswa' => $data,
                'dokters' => Dokter::all(),
                'title' => "Edit Konsultasi"
            ]);
        }else{
            return back();
        }
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
        $rules = [
            'id' => 'required',
            'dokter_id' => 'required',
            'tgl_konsul' => 'required',
            'deskripsi' => 'required'
        ];

        $validateData = $request->validate($rules);

        ReqKonsul::where('id',$request->id)
            ->update($validateData);

        return redirect('/mahasiswa/konsultasi')->with('success-edit','Permintaan Rekam Medis sudah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReqKonsul  $reqKonsul
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReqKonsul $reqKonsul)
    {
        // return $reqKonsul;

        ReqKonsul::destroy($reqKonsul->id);

        return redirect('/mahasiswa/konsultasi')->with('success-delete','Data Permintaan Konsultasi di hapus!');
    }
}
