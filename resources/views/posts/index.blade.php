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
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/storage/cover_image/{{$post->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
                
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection