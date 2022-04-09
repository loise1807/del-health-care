<?php

namespace App\Http\Controllers;

use App\Models\Asrama;
use Illuminate\Http\Request;

class AsramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Asrama.asrama',[
            'asramas' => Asrama::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Asrama.create');
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
            'nama_asrama' => 'required|max:255|unique:asramas',
            'jenis_asrama' => 'required|max:255',
            'lokasi_asrama' => 'required|max:255',
            'alamat_asrama' => 'required|max:255'
        ]);

        Asrama::create($validateData);

        return redirect('/admin/asramas')->with('success','Asrama Baru Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function show(Asrama $asrama)
    {
        return view('Admin.Asrama.show',[
            'asrama' => $asrama
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function edit(Asrama $asrama)
    {
        return view('Admin.Asrama.edit',[
            'asrama' => $asrama
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asrama $asrama)
    {
        $rules = [
            'jenis_asrama' => 'required|max:255',
            'lokasi_asrama' => 'required|max:255',
            'alamat_asrama' => 'required|max:255'
        ];

        if($request->nama_asrama != $asrama->nama_asrama){
            $rules['nama_asrama'] = 'required|unique:asramas';
            $validateData = $request->validate($rules);
        }

        $validateData = $request->validate($rules);

        Asrama::where('id',$asrama->id)
            ->update($validateData);

        return redirect('/admin/asramas')->with('success','Asrama sudah diubah');


    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asrama $asrama)
    {
        Asrama::destroy($asrama->id);

        return redirect('/admin/asramas')->with('success','Data Asrama di hapus!');
    }
}
