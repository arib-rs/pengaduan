<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'telepon',
        'email',
        'tingkat',
        'is_active'
    ];
}
