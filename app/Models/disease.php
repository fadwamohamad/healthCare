<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disease extends Model
{
    use HasFactory;

    protected $table = "diseases";
protected $guarded =[];
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
