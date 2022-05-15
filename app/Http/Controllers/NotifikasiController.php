<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('notifikasi',[
            'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() ,
            'title' =>'Semua Notifikasi'
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
     * @param  \App\Models\Notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(Notifikasi $notifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Notifikasi $notifikasi)
    {
        //
    }

    public function belum_dibaca(Notifikasi $notifikasi)
    {
        Notifikasi::where('id',$notifikasi->id)
                    ->update([
                        'status' => 0,
                        'bgcolor' => 'rgb(255, 184, 51, 0.2)'
                    ]);
    
        return redirect('/notifikasi')->with('success-edit','Notifikasi berhasil diubah');
    }

    public function telah_dibaca(Notifikasi $notifikasi)
    {
        Notifikasi::where('id',$notifikasi->id)
                    ->update([
                        'status' => 1,
                        'bgcolor' => 'rgb(179, 179, 179, 0.2)'
                    ]);
    
        return redirect('/notifikasi')->with('success-edit','Notifikasi berhasil diubah');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notifikasi $notifikasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notifikasi $notifikasi)
    {
        Notifikasi::destroy($notifikasi->id);
        return redirect('/notifikasi')->with('success-delete','Notifikasi di hapus!');
    }

    public function hapus($notifikasi)
    {
        Notifikasi::where('penerima_id','=',$notifikasi)->delete();
        return redirect('/notifikasi')->with('success-delete','Notifikasi di hapus!');
    }
}
