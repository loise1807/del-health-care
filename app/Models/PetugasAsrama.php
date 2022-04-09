<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasAsrama extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function asrama()
    {
        return $this->belongsTo(Asrama::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'no_pegawai';
    }
}
