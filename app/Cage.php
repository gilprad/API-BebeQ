<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cage extends Model
{
    protected $guarded = [];

    public function category()
    {
    	return $this->belongsTo('App\Category','category_id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
    public function history()
    {
    	return $this->hasMany('App\HistoryCage','cage_id');
    }
}
