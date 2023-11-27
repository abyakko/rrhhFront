<?php

namespace App\Models;
use App\Models\Lugar;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{

    protected $fillable =['id','empresa_id','lugar_id','direccion','telefono','tipo_sede_sucur'];
   
   /**
         * Get all of the comments for the Sucursal
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function Lugar()
        {
            return $this->belongsto(Lugar::class);
        }  
        public function Empresa()
        {
            return $this->belongsto(Empresa::class);
        }    
}


