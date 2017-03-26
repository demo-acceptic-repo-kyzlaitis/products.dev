<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    //todo flash message
    /**
     * Display a listing of the product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $products = Product::orderBy('updated_at', 'desc')->paginate(10);

        return view('product.index', compact('products'));
    }


    /**
     * Store a newly created product in storage.
     *
     * @param Requests\ProductStoreRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ProductStoreRequest $request) {
        $savedProduct = Product::create($request->all());

        Session::flash('message', 'The product has been added successfully');
        return response()->json($savedProduct);
    }


}
