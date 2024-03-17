<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class model_signup extends Authenticatable
{
    use HasFactory;

    protected $table = "signup";
    protected $primaryKey = "u_id";
}
