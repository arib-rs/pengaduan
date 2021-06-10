<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintProgress extends Model
{
    use HasFactory;
    protected $table = "complaint_progresses";
    protected $fillable = ['complaint_id', 'aksi', 'lokasi','user_id'];
}
