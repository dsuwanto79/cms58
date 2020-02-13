@extends('layouts.admin')

@section('content')
@if (Session::has('deleted_post'))
<p class="bg-danger">{{session('deleted_post')}}</p>
@endif
@if (Session::has('updated_post'))
<p class="bg-danger">{{session('updated_post')}}</p>
@endif

<h1 class="text-center">Posts</h1>
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>Photo ID</th>
            <th>Owner</th>
            <th>Category ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Post Link</th>
            <th>Comments</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
    </thead>
    <tbody>
        @if ($posts)
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td><img height="50" src="{{ $post->photo ? $post->photo->file : 'not_found.jpg' }}" alt=""></td>
            <td><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
            <td>{{$post->category ? $post->category->name : 'uncategorized' }}</td>
            <td>{{$post->title }}</td>
            <td>{{'using helper function: ' . str_limit($post->body, 30) }}</td>
            <td><a href="{{ route('home.post',$post->slug) }}">View Post</a></td>
            <td><a href="{{ route('comments.show', $post->slug) }}">View Comments</a></td>
            <td>{{$post->created_at->diffForHumans() }}</td>
            <td>{{$post->updated_at->diffForHumans() }}</td>
        </tr>
        @endforeach

        @endif
    </tbody>
</table>
<div class="row">
    <div class="col-sm-6 col-sm-offset-5">
        {{$posts->render()}}
    </div>
</div>
@endsection
