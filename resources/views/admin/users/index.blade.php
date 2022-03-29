@extends('layouts.admin')
@section('content')

    <div class="col-12 text-center">
        @if(Session::has('user_message'))
            <p class="alert alert-info">{{session('user_message')}}</p>
        @endif
    </div>

    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Users</h1>
                <form>
                    <input type="text" name="search" class="form-control bg-gray-300 border-0 small"
                           placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                </form>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>@sortablelink('id')</th>
                <th>Photo</th>
                <th>@sortablelink('name')</th>
                <th>@sortablelink('email')</th>
                <th>Role</th>
                <th>Active</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Photo</th>
                <th>Deleted</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        <img height="62"
                             src="{{$user->photo ? asset('img/users') . $user->photo->file : 'http://via.placeholder.com/62x62'}}"
                             alt="{{$user->name}}">
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge badge-pill badge-info">{{$role->name}}</span>
                        @endforeach

                    </td>
                    <td>{{$user->is_active ? 'Active' : 'Not Active'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td>{{$user->photo ? $user->photo->file : 'niks'}}</td>
                    <td>{{$user->deleted_at}}</td>
                    <td>
                        @if($user->deleted_at != null)
                            <a class="btn btn-warning" href="{{route('users.restore', $user->id)}}">Restore</a>
                        @else
                            {!! Form::open(['method' =>'DELETE', 'action' => ['App\Http\Controllers\AdminUsersController@destroy', $user->id]])!!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    {{$users->appends(\Request::except('page'))->links()}}

@endsection
