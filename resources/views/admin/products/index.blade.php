@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <a class="btn btn-info" href="{{route('products.index')}}">All</a>
        @foreach($brands as $brand)
            <a class="btn btn-info" href="{{route('admin.productsPerBrand', $brand->id)}}">{{$brand->name}}</a>
        @endforeach
        <h1>Products</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Name</th>
                <th>Keywords</th>
                <th>Body</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($products)
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>
                            <img width="auto" height="62"
                                 src="{{$product->photo ? asset('img/products') . $product->photo->file : 'http://via.placeholder.com/62'}}"
                                 alt="{{$product->name}}">
                        </td>
                        <td>{{$product->productcategory ? $product->productcategory->name : 'no category'}}</td>
                        <td>{{$product->brand ? $product->brand->name : 'no brand'}}</td>
                        <td>{{$product->name}}</td>
                        <td>
                            @if($product->keywords)
                                @foreach($product->keywords as $keyword)
                                    <span class="badge badge-pill badge-info">{{$keyword->name}}</span>
                                @endforeach
                            @endif
                        </td>
                        <td>{{$product->body}}</td>
                        <td>{{$product->created_at->diffForHumans()}}</td>
                        <td>{{$product->updated_at->diffForHumans()}}</td>
                        <td class="d-flex">
                            <a class="btn btn-info mr-1" href="#">Show</a>
                            <a class="btn btn-warning mr-1" href="#">Edit</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" class="alert alert-warning">
                        {{session('products_message')}}
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="text-center">
            {{$products->links()}}
        </div>
    </div>
@stop
