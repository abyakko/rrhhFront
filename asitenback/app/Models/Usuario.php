<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public $table = "usuarios";

   // protected $fillable = array("*");

    protected $fillable = [
        'nombres','apellido1','apellido2','celular','f_nac','direccion','ci','extension','email','password','tarjeta_id','carrera_id','uniins_id','tipousuario_id','area_id','generacion_id'
    ];
    //public $timestamps = true;

    public function areas()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
    public function carreras()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }  
    public function tarjetas()
    {
        return $this->hasMany(Tarjeta::class);
    }  


}
