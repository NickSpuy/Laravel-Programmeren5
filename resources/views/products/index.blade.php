@extends('layouts.app')

@section('content')

    <form action="{{ route('search') }}" method="GET">
        <div class="form-row">
          <div class="col">
                <label for="nameTable">Check Body</label>
                <input type="checkbox" value="stock" name="stock" id="stock">
          </div>
          <div class="col">
                <select class="form-control" name="category" id="category">
                    <option value="all" name="category" id="category">All categories</option>
                    <option value="phone" name="category" id="category">Phone</option>
                    <option value="laptop" name="category" id="category">Laptop</option>
                </select>
          </div>
          <div class="col-7">
                <input class="form-control mr-sm-2" value="{{request()->input('search')}}" name="search" id="search" type="search" placeholder="Search" aria-label="Search">
          </div>
        </div>
    </form>

    <h1>Posts</h1>
    <div class="container">
    @if(count($products) > 0)
        @foreach ($products->chunk(3) as $chunk)
            <div style="margin-bottom: 10px;" class="row">
                @foreach ($chunk as $product)
                    <div style="max-width: 360px;" class="col-sm">
                        <img style="width:100%" src="/storage/product_image/{{$product->product_image}}">
                        <h3><a href="/product/{{$product->id}}">{{$product->name}}</a></h3>
                    </div>
                @endforeach
            </div>
          
        @endforeach
    </div>
        {{$products->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection