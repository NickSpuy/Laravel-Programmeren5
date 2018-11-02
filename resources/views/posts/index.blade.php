@extends('layouts.app')

@section('content')

    <form action="{{ route('search') }}" method="GET">
        <div class="form-row">
          <div class="col">
                <label for="nameTable">Check Body</label>
                <input type="checkbox" value="kees" name="nameTable" id="nameTable">
          </div>
          <div class="col">
                <select class="form-control" name="dropdown" id="dropdown">
                    <option value="title" name="dropdown" id="dropdown">Title</option>
                    <option value="created_at" name="dropdown" id="dropdown">Created At</option>
                </select>
          </div>
          <div class="col-7">
                <input class="form-control mr-sm-2" value="{{request()->input('search')}}" name="search" id="search" type="search" placeholder="Search" aria-label="Search">
          </div>
        </div>
    </form>

    <h1>Posts</h1>
    <div class="container">
    @if(count($posts) > 0)
        @foreach ($posts->chunk(3) as $chunk)
            <div style="margin-bottom: 10px;" class="row">
                @foreach ($chunk as $product)
                    <div style="max-width: 360px;" class="col-sm">
                        <img style="width:100%" src="/storage/cover_image/{{$product->cover_image}}">
                        <h3><a href="/posts/{{$product->id}}">{{$product->title}}</a></h3>
                    </div>
                @endforeach
            </div>
          
        @endforeach
    </div>
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection