<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class model_report extends Model
{
   
    use HasFactory, Notifiable;
    protected $table='doctor_report';
    protected $primaryKey='r_id';
}
