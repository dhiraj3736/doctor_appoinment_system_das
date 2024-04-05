<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_notification extends Model
{
    use HasFactory;
    protected $table = "notifications";
    protected $primaryKey = "id";
    
}
