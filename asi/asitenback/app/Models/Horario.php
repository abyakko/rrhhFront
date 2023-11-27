<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    public $table = "horarios";

    protected $fillable = array("*");

    //public $timestamps = true;

    public function usuarios(){
        return $this->belongsTo(Usuario::class,"horarios");
    }
}
