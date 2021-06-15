<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    use HasFactory;
    protected $table = "followups";
    protected $fillable = [
        'complaint_id',
        'user_id',
        'tgl_mulai',
        'tgl_selesai',
        'kegiatan',
        'biaya',
        'sumber',
        'detail_sumber',
        'dasar',
        'tgl_dokumen',
        'no_dokumen',
        'rekanan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
