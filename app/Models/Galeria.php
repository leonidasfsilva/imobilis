<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    public function imovel()
    {
    	return $this->belongsTo('App\Models\Imovel','imovel_id');
    }
}
