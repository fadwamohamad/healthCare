<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class patient extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


protected $guarded=[];
    protected $table = "patients";

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, "doc_patient");
    }

    public function disease()
    {
        return $this->belongsTo(Disease::class, "dis_patient");
    }


    public function appointment()
    {
        return $this->belongsTo(Appointment::class, "app_patient");
    }
}
