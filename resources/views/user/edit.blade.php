@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>
    {!! Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::textarea('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
                {{Form::label('email', 'Email')}}
                {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
                {{Form::label('password', 'Password')}}
                {{Form::text('password', $user->password, ['class' => 'form-control', 'placeholder' => 'Password'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection