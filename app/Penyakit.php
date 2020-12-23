<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $guarded = [];

    public function Gejala()
    {
    	return $this->belongsToMany('App\Gejala', 'gejala_penyakits','penyakit_id','gejala_id');
    }
}
