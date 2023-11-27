<?php

namespace App\Models;
use App\Models\Sucursal;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable=['nit','nombre','propietario','celular','telefono','direccion','correo','descripcion'];

 
        /**
         * Get all of the Sucursal for the Empresa
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function Sucursal()
        {
            return $this->hasmany( Sucursal::class)->orderBy('tipo_sede_sucur','ASC');
        }
        public function Empresaconvenio()
        {
            return $this->hasMany( Convenio::class);
        }
            

}
