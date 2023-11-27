<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresaconvenio extends Model
{
    use HasFactory;
    protected $fillable =['empresa_id','convenio_id'];

     /**
         * Get all of the Sucursal for the Empresa
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function Empresa()
        {
            return $this->hasMany(Empresa::class, 'empresa_id');
        }  
        public function Convenio()
        {
            return $this->hasMany(Convenio::class, 'convenio_id');
        }
}
