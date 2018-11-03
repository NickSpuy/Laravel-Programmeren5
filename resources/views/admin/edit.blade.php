@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>
    {!! Form::open(['action' => ['AdminController@update', $product->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
                {{Form::label('price', 'Price')}}
                {{Form::text('price', $product->price, ['class' => 'form-control', 'placeholder' => 'Price'])}}
                {{Form::label('stock', 'Stock')}}
                {{Form::text('stock', $product->stock, ['class' => 'form-control', 'placeholder' => 'Stock'])}}
        </div>
        <div class="form-group">
                {{Form::file('product_image')}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection