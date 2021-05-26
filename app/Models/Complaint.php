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
        'media',
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
        'kode_lanjutan',
        'is_valid',
        'alasan',
        'is_public'
    ];
    protected $casts = ['kode' => 'string'];
    public function job()
    {
        return $this->belongsTo(Job::class, 'pekerjaan');
    }
    public function media_()
    {
        return $this->belongsTo(Media::class, 'media');
    }
    public function parent()
    {
        return $this->belongsTo(Complaint::class, 'kode_lanjutan', 'kode');
    }
}
