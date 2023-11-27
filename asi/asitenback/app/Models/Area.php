<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    public $table = "areas";

    // protected $fillable = array("*");
 
     protected $fillable = [
         'nombre_area','sigla'
     ];
     public function usuarios()
     {
         return $this->hasMany(Usuario::class);
     }

}
