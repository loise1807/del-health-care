<?php

namespace App\Models;

use App\Models\Asrama;
use App\Models\RiwayatPenyakit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function asrama()
    {
        return $this->belongsTo(Asrama::class);
    }

    public function riwayatpenyakit()
    {
        return $this->belongsTo(RiwayatPenyakit::class);
    }

    

    public function user()
    {
        return $this->belongsTo(User::class);
        // return $this->belongsTo(User::class);
        
    }

    public function getRouteKeyName()
    {
        return 'nim';
    }

}
