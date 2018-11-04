@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <a href="/admin/create" class="btn btn-primary">Add Product</a>
                        <br><br>
                        <h3>Products</h3>
                        @if(count($products) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td><a href="/admin/{{$product->id}}/edit" class="btn btn-primary">Edit</td>
                                        <td>{!!Form::open(['action' => ['AdminController@destroy', $product->id], 'method' => 'Product', 'class' => 'float-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p>You have no posts!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection