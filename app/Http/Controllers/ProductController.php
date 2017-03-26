<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    //todo flash message
    /**
     * Display a listing of the product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $products = Product::orderBy('updated_at', 'desc')->get();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created product in storage.
     *
     * @param Requests\ProductStoreRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ProductStoreRequest $request) {
        $savedProduct = Product::create($request->all());

        return response()->json($savedProduct);
    }

    /**
     * Display the specified product.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
