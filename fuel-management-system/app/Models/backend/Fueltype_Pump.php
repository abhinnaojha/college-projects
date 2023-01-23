<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fueltype_Pump extends Model
{
    use HasFactory;

    protected $table = 'fueltype_pump';
    protected $fillable = ['fuel', 'pump'];
}
