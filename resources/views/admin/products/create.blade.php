@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Create Product</h1>
        @include('includes.form_error')
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Title...">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" min="0.01" step="0.01" name="price" id="price" class="form-control" placeholder="Price...">
<!--                Form::number('price', '0.00', ['class'=>'form-control text-center', 'step'=>'any']);-->
            </div>
            <div class="form-group">
                <label for="brand">Brand (CTRL + CLICK multiple select)</label>
                <select name="brand_id" class="form-control custom-select">
                    <option value="" disabled selected>Select</option>
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="brand">Brand (CTRL + CLICK multiple select)</label>
                <select name="category_id" class="form-control custom-select">
                    <option value="" disabled selected>Select</option>
                    @foreach($productcategories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="keyword">Keyword (CTRL + CLICK multiple select)</label>
                <select name="keywords[]" class="form-control custom-select" multiple>
                    <option value="" disabled selected>Select</option>
                    @foreach($keywords as $keyword)
                        <option value="{{$keyword->id}}">{{$keyword->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="body" id="body" cols="100%" rows="10" placeholder="Description..."></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="photo_id" id="ChooseFile">
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>

@endsection
