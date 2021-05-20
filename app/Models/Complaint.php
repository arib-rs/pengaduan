<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode',
        'name',
        'gender',
        'alamat',
        'desa',
        'kecamatan',
        'kota',
        'telepon',
        'pekerjaan',
        'email',
        'subyek',
        'uraian',
        'pelapor',
        'status',
        'pict_1',
        'pict_2',
        'pict_3',
        'lng',
        'lat',
        'is_urgent',
        'kode_lanjutan'
    ];
}
