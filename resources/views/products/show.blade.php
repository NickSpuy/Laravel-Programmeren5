@extends('layouts.app')

@section('content')
    <a href="/products" class="btn btn-primary">Go Back</a>
    <h1>{{$product->name}}</h1>
    <img style="width:100%" src="/storage/product_image/{{$product->product_image}}">
    <br><br>
    <div>
        {!!$product->description!!}
    </div>
    <hr>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->type == 'admin')
            <a href="/admin/{{$product->id}}/edit" class="btn btn-primary">Edit</a>
            {!!Form::open(['action' => ['AdminController@destroy', $product->id], 'method' => 'product', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection
