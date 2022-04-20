@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Create Product Category</h1>
        @include('includes.form_error')
        <form action="{{route('categories.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Product Category...">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="description" id="description" cols="100%" rows="10"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Add Product Category</button>
            </div>
        </form>
    </div>
@endsection
