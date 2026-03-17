<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'lokasi',
        'program',
        'deskripsi_pekerjaan',
        'persyaratan',
        'status',
        'gambar'
    ];
}
