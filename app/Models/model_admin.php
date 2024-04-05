<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class model_admin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table='admin';
    protected $primaryKey='a_id';
}
