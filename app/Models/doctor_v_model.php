<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class doctor_v_model extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table='doctor_vendor';
    protected $primaryKey='v_id';


    
}
