<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable=['id','ci','nombre','paterno','materno','direccion','correo','celular'];
    public function Tarjeta()
    {
        return $this->hasmany(Tarjeta::class);
    }  
}
