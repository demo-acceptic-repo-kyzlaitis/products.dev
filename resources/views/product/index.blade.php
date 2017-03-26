@extends('layouts.app')


@section('content')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['url' => action('ProductController@store'), 'class' => 'form-horizontal']) !!}
                <legend>Add product</legend>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Product name:</label>
                    <div class="col-sm-9">
                        {!! Form::text('product_name', null, ['class' => 'form-control', 'placeholder' => 'Enter product name']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Product price:</label>
                    <div class="col-sm-9">
                        {!! Form::number('product_price', null, ['class' => 'form-control', 'placeholder' => 'Enter price']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Product description:</label>
                    <div class="col-sm-9">
                        {!! Form::textarea('product_desc', null, ['class' => 'form-control', 'placeholder' => 'Enter product description']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-success pull-right">Add</button>
                </div>
            {!! Form::close() !!}
        </div>

    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            @if(count($products) == 0)
                <p>Oppps! There are no products! Add some products, not a lot, just a little bit.</p>
            @else
                <table class="table table-condensed">
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
                                    <button class="btn btn-warning"></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>

@endsection