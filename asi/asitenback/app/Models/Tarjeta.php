<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;

    public $table = "tarjetas";

    // protected $fillable = array("*");
 
     protected $fillable = [
         'codigo_tarjeta','codigo_usuario','usuario_id'
     ];
 
}
