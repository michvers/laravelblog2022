@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Tags</h1>
        <ul>
            @if($tags)
                @foreach($tags as $tag)
                    <li>{{$tag->name}}</li>
                    <ul>
                        @if(count($tag->childtags))
                            @foreach($tag->childtags as $childtags)
                                @include('includes.sub_index',['sub_index'=>$childtags])
                            @endforeach
                        @endif
                    </ul>
                @endforeach
            @endif
        </ul>
    </div>
@endsection
