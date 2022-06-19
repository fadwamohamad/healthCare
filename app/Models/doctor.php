<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "doctors";
protected $guarded=[];
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

}
