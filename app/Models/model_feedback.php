<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_feedback extends Model
{
    use HasFactory;
    protected $table='table_feedback';
    protected $primaryKey='id';
}
