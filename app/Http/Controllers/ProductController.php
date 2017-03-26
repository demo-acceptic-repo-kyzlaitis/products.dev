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

        $isAnyProducts = $products->count() > 0;

        return view('product.index', compact('products', 'isAnyProducts'));
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


}
