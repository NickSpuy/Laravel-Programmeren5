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

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Order</button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
