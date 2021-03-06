<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aeroport extends Model
{
    use HasFactory;

    protected $fillable = [
        'horaire',
        'destination',
        'vol',
        'porte',
        'observation'
    ];      
    
}
