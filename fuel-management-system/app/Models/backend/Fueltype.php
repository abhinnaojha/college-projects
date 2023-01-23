<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fueltype extends Model
{
    use HasFactory;

    protected $table = 'fueltypes';
    protected $fillable = ['name'];
}
