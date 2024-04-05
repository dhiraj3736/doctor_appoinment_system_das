<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class model_signup extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $table = "signup";
    protected $primaryKey = "u_id";
}
