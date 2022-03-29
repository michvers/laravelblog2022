@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Products</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Body</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($brands)
                @foreach($brands as $brand)
                    <tr>
                        <td>{{$brand->id}}</td>
                        <td>
                            <img width="auto" height="62"
                                 src="{{$brand->photo ? asset('img/products') . $brand->photo->file : 'http://via.placeholder.com/62'}}"
                                 alt="{{$brand->name}}">
                        </td>
                        <td>{{$brand->name}}</td>
                        <td>{{$brand->description}}</td>
                        <td class="d-flex">
                            <a class="btn btn-info mr-1" href="#">Show</a>
                            <a class="btn btn-warning mr-1" href="#">Edit</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" class="alert alert-warning">
                        {{session('brands')}}
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="text-center">
            {{$brands->links()}}
        </div>
    </div>
@stop
