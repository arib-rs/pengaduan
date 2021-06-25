<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['bidang'];
    public function units()
    {
        return $this->hasMany(UnitMapping::class);
    }
}
