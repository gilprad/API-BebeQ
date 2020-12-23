<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public function cage()
    {
    	return $this->hasMany('App\Cage','user_id');
    }
}
