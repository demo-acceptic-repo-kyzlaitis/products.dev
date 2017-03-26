<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'product_name'  => 'required',
            'product_desc'  => 'required',
            'product_price' => 'required|numeric',
        ];
    }

    public function messages() {
        return [
            'product_name.required'  => 'Enter product name',
            'product_desc.required'  => 'Enter product description',
            'product_price.required' => 'Enter product price',
            'product_price.numeric'  => 'Product price has to be a number',
        ];
    }
}
