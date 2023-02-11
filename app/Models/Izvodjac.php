<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izvodjac extends Model
{
    use HasFactory;
    protected $fillable=[
        'firstName',
        'lastName',
        'birthYear',
        
    ];


    public function pesmas(){
        return $this->hasMany(Pesma::class);
    }
}
