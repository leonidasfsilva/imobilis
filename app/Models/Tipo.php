<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    public function imoveis()
    {
    	return $this->hasMany('App\Models\Imovel','tipo_id');
    }
}
