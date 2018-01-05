<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	protected $fillable = ['name'];
	protected $hidden = array('pivot');
	public function products() {
		return $this->belongsToMany('App\Product')
			->withTimestamps();
	}
}
