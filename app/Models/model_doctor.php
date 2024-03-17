<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_doctor extends Model
{
    use HasFactory;
    protected $table = "doctor";
    protected $primaryKey = "d_id";
}
