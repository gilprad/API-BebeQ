<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
	protected $guarded = [];
    public function Penyakit()
    {
    	return $this->belongsToMany('gejala_penyakits','gejala_id','penyakit_id');
    }
}
