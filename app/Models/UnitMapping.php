<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitMapping extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'unit_id', 'scope_id'
    ];
    public function scope()
    {
        return $this->belongsTo(Scope::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
