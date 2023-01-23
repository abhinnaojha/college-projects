<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuelscheme extends Model
{
    use HasFactory;

    protected $table = 'fuelschemes';
    protected $fillable = ['end_at', 'price', 'fuel'];
}
