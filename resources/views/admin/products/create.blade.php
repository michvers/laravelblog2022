@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Create Product</h1>
        @include('includes.form_error')
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Title...">
            </div>
            <div class="form-group">
                <label for="keyword">Keyword (CTRL + CLICK multiple select)</label>
                <select name="keywords[]" class="form-control custom-select" multiple>
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
            <button type="submit" class="btn btn-primary">Add product</button>
        </form>
    </div>

@endsection
