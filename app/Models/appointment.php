<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;


    protected $table = "appointments";

    public function patients()
    {
        return $this->belongsTo(Patient::class ,'patient_id');
    }
    public function Doctor()
    {
        return $this->belongsTo(doctor::class);
    }
}
