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

    public function nama()
    {
        return $this->hasOneThrough(
            User::class,
            Unit::class,
            'id', // Foreign key on the unit table...
            'unit_id', // Foreign key on the User table...
            'responden', // Local key on the respon table...
            'id' // Local key on the unit table...
        );
    }

    public function user(){
        return $this->belongsTo(User::class,'responden');
    }
}
