@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Comment Replies</h1>
        <p>Display {{$replies->count()}} of {{$replies->total()}}</p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($replies)
                @foreach($replies as $reply)
                    <tr>
                        <td>{{$reply->id}}</td>
                        <td>{{$reply->user->name}}</td>
                        <td>{{$reply->user->email}}</td>
                        <td>{{$reply->body}}</td>
                        <td>{{$reply->created_at->diffForHumans()}}</td>
                        <td>{{$reply->updated_at->diffForHumans()}}</td>
                        <td>
                            <div class="d-flex">
                                <form action="{{route('replies.update', $reply->id)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="is_active" value="{{$reply->is_active}}">
                                    @if($reply->is_active)
                                        <button type="submit" href="" data-toggle="tooltip" data-placement="top" title="Post comment approved" class="btn btn-success mr-1"><i class="fas fa-unlock"></i></button>
                                    @else
                                        <button type="submit" href="" class="btn btn-danger mr-1">
                                            <i class="fas fa-lock"></i>
                                        </button>
                                    @endif

                                    <a href="" class="btn btn-success mr-1"><i class="fas fa-eye">Replies</i></a>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {{$replies->links()}}
    </div>
@endsection
