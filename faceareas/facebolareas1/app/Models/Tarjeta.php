<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $fillable=['id','numero','f_inicio','codigo','estado','campaña','observacion','cliente_id'];

    public function cliente()
    {
        return $this->belongsto(Cliente::class);
    }  
}
