<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cuarto extends Model
{
    protected $table = 'cuartos';
        protected $primarykey = 'id';
        protected $fillable = [ 'lat', 'lng', 'estatus','sexo','inmueble','precio_renta','universidd'];
}
