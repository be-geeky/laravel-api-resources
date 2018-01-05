<?php

namespace App\Http\Resources;

use App\Http\Resources\Categories as CategoriesCollection;
use Illuminate\Http\Resources\Json\Resource;

class Product extends Resource {
	/**
	 * Transform the resource into an array (a JSON:API resource).
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		return [
			'type' => 'products',
			'id' => (string) $this->id,
			'attributes' => [
				'name' => $this->name,
				'price' => $this->price,
			],
			'relationships' => new CategoriesCollection($this->categories),
		];
	}

	// public function with($request) {
	// 	return [
	// 		'version' => '1.0',
	// 		'url' => url('http://example.com'),
	// 	];
	// }
}
