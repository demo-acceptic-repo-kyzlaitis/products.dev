@extends('layouts.app')


@section('content')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['url' => action('ProductController@store'), 'class' => 'form-horizontal', 'id' => 'add-product-form']) !!}
                <legend>Add product</legend>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Product name:</label>
                    <div class="col-sm-9">
                        {!! Form::text('product_name', null, ['class' => 'form-control', 'placeholder' => 'Enter product name', 'required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Product price:</label>
                    <div class="col-sm-9">
                        {!! Form::number('product_price', null, ['class' => 'form-control', 'placeholder' => 'Enter price', 'step' => 'any', 'required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Product description:</label>
                    <div class="col-sm-9">
                        {!! Form::textarea('product_desc', null, ['class' => 'form-control', 'placeholder' => 'Enter product description', 'required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm pull-right">
                        <span class="glyphicon glyphicon-plus"></span> Add product
                    </button>
                </div>
            {!! Form::close() !!}
        </div>

    </div>
    <hr>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(!$isAnyProducts)
                <p class="empty-message">Oppps! There are no products! Add some products, not a lot, just a little bit.</p>
            @endif

            <table class="table table-condensed products-table @if(!$isAnyProducts) hidden-content-table @endif">
                <thead>
                <tr>
                    <th>Product name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->product_name}}</td>
                            <td>
                                <div class="data-holder" data-product-name="{{$product->product_name}}" data-product-price="{{$product->product_price}}" data-product-desc="{{$product->product_desc}}"></div>
                                <button class="btn btn-primary btn-xs product-details" data-toggle="tooltip" title="Show product details">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Show details
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table preview-product-table" style="display: none">
                <tbody>
                    <tr>
                        <td><b>Product name</b></td>
                        <td class="product_name"></td>
                    </tr>
                    <tr>
                        <td><b>Product price</b></td>
                        <td class="product_price"></td>
                    </tr>
                    <tr>
                        <td><b>Product description</b></td>
                        <td class="product_desc"></td>
                    </tr>
                </tbody>

            </table>
        </div>
        <div class="col-md-1 hidden-get-back-button">
            <button class="btn btn-default btn-xs get-back-button">
                <span class="glyphicon glyphicon-share-alt"></span> Get back to products table
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 pull-right">
            {!! $products->render()!!}

        </div>
    </div>

@endsection
