<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campana extends Model
{
    protected $fillable=['id','nombre_campana'];

    public function Tarjeta()
    {
        return $this->hasmany(Tarjeta::class);
    }  
}
