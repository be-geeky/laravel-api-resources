<?php

namespace App\Http\Controllers;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\Products as ProductResourceCollection;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//Get Products
		$products = Product::paginate(15);

		//Return collection of Products as a resourse
		return new ProductResourceCollection($products);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$product = $request->isMethod('put') ? Product::findOrFail($request->product_id) : new Product;

		$product->id = $request->input('product_id');
		$product->name = $request->input('name');
		$product->price = $request->input('price');

		if ($product->save()) {
			return New ProductResource($product);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		return new ProductResource(Product::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$product = Product::findOrFail($id);
		if ($product->delete()) {
			return new ProductResource($product);
		}

	}
}
