<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_book extends Model
{
    use HasFactory;
    protected $table='book';
    protected $primaryKey='b_id';
}
