<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_model extends Model
{
    use HasFactory;
    protected $table='commenttable';
    protected $primaryKey='id';
}
