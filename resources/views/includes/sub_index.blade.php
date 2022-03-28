<li>{{$sub_index->name}}</li>
@if($sub_index->tags)
    <ul>
        @if(count($sub_index->tags) > 0)
            @foreach($sub_index->tags as $childtags)
                @include('includes.sub_index',['sub_index'=>$childtags])
            @endforeach
        @endif
    </ul>
@endif
