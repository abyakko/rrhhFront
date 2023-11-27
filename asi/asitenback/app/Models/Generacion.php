<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generacion extends Model
{
    use HasFactory;

    public $table = "generacions";

    // protected $fillable = array("*");

     protected $fillable = [
         'generacion'
     ];
}
