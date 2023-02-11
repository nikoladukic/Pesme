<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Izvodjac;
use App\Models\Kategorija;

class Pesma extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'duration',
        'publishinghouse'
        
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function kategorija(){
        return $this->belongsTo(Kategorija::class);
    }

    public function izvodjac(){
        return $this->belongsTo(Izvodjac::class);
    }

}
