<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class universidad extends Model
{
    protected $table = 'universidads';
    protected $primarykey = 'id';
    protected $fillable = [ 'lat' ,'name', 'lng'];
}
