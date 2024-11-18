<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    public function imoveis()
    {
    	return $this->hasMany('App\Models\Imovel','cidade_id');
    }
}
