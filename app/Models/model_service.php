<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_service extends Model
{
    use HasFactory;
    protected $table = "service";
    protected $primaryKey = "s_id";
}
