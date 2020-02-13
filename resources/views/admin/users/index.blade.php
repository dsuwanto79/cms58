@extends('layouts.admin')

@section('content')
@if (Session::has('deleted_user'))
<p class="bg-danger">{{session('deleted_user')}}</p>
@endif
@if (Session::has('updated_user'))
<p class="bg-danger">{{session('updated_user')}}</p>
@endif

<h1>Users</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>
    <tbody>
        @if($users)
        @foreach ($users as $user)
        <tr>
            <td scope="row">{{ $user->id }}</td>
            <td><img src="{{ $user->photo ? $user->photo->file : '/images/not_found.jpg'}}" width="50" alt="no photo">
            </td>
            <td><a href="{{ route('users.edit', $user->id)}}">{{$user->name }}</a> </td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name}}</td>
            <td>
                {{ $user->is_active == 1 ? 'Active' : 'Not Active' }}
            </td>
            <td>{{ $user->created_at->diffForHumans() }}</td>
            <td>{{ $user->updated_at->diffForHumans() }}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

@endsection
