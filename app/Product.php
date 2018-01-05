<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'products';
	protected $hidden = array('pivot');
	public function categories() {
		return $this->belongsToMany('App\Category')
			->withTimestamps();
	}
}
