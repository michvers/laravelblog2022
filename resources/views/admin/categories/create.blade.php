@extends('layouts.admin')
@section('content')
    <div class="col-12">
        @include('includes.form_error')
        <h1>Create Category</h1>
        {!! Form::open(['method'=>'post', 'action'=>'App\Http\Controllers\AdminPostsCategoriesController@store', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null,['class' =>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
