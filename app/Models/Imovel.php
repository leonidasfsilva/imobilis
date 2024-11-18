<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $table = "imoveis";

    public function tipo()
    {
    	return $this->belongsTo('App\Models\Tipo','tipo_id');
    }
    public function cidade()
    {
    	return $this->belongsTo('App\Models\Cidade','cidade_id');
    }
    public function galeria()
    {
    	return $this->hasMany('App\Models\Galeria','imovel_id');
    }
}
