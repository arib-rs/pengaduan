<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    protected $fillable = [
        'complaint_id',
        'uraian',
        'jenis',
        'responden',
        'pict_1',
        'pict_2',
        'pict_3',
        'long',
        'lat'
    ];
}
