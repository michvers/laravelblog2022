@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Edit Product Category</h1>
        @include('includes.form_error')
        <form action="{{route('categories.update', $productcategory->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{$productcategory->name}}" placeholder="Category...">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="description" id="" cols="100%" rows="10">{{$productcategory->description}}
                </textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Update Product Category</button>
            </div>
        </form>
    </div>
@endsection
