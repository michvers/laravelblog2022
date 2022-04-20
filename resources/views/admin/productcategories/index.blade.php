@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Product Categories</h1>
        <table class="table table-striped shadow-lg p-3 mb-5 bg-body rounded table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($productcategories)
                @foreach($productcategories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>{{$category->created_at->diffForHumans()}}</td>
                        <td>{{$category->updated_at->diffForHumans()}}</td>
                        <td class="d-flex justify-content-around">

                            <a class="btn btn-warning" href="{{route('categories.edit', $category)}}">Edit</a>
                            <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="text-center">
            {{$productcategories->links()}}
        </div>
    </div>
@stop
