@extends('layouts.admin')
@section('content')
    <div class="col-12 text-center">
        @if(Session::has('category_message'))
            <p class="alert alert-info pt-2">{{session('category_message')}}</p>
        @endif
    </div>
    <h1>Categories</h1>
    <a class="btn btn-success" href="{{route('categories.create')}}">Create New Category</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Edit</th>
            <th>Deleted</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($categories)
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at->diffForHumans()}}</td>
                    <td>{{$category->updated_at->diffForHumans()}}</td>
                    <td><a class="btn btn-warning" href="{{route('categories.edit', $category->id)}}">Edit</a></td>
                    <td>{{$category->deleted_at}}</td>
                    <td>
                        @if($category->deleted_at != null)
                            <a class="btn btn-warning" href="{{route('categories.restore', $category->id)}}">Restore</a>
                        @else
                            {!! Form::open(['method' =>'DELETE', 'action' => ['App\Http\Controllers\AdminCategoriesController@destroy', $category->id]])!!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8" class="alert alert-warning">
                    {{session('category_message')}}
                </td>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="text-center">
        {{$categories->links()}}
    </div>
@stop
