<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorija extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'name',
    ];
    public function pesma(){
        return $this->hasMany(Pesma::class);
    }
}
