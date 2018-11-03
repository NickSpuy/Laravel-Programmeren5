@extends('layouts.app')

@section('content')
    <h1>Search Results</h1>
    <div class="search-container container">
        <p>{{$products->count()}} result(s) for '{{request()->input('search')}}' </p>

        @if(count($products) > 0)
        @foreach ($products as $product)
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/storage/cover_image/{{$product->product_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/products/{{$product->id}}">{{$product->name}}</a></h3>
                    </div>
                </div>
                
            </div>
        @endforeach
    @else
        <p>No products found</p>
    @endif
    </div>
@endsection