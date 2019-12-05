@extends('layouts.admin')

@section('content')
<h1>Edit User</h1>
{!! Form::model($user, ['method' => 'PATCH', 'action'=>['AdminUsersController@update',$user->id],'files'=>'true']) !!}

<div class="row">
    <div class="col-sm-3">
        <img src="{{ $user->photo ? $user->photo->file : '/images/not_found.jpg'}}" alt=""
            class="img-responsive img-rounded" width="200px">
    </div>
    <div class="col-sm-9">
        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', null, ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('role_id', 'Role:') }}
            {{ Form::select('role_id', [''=>'Choose Options'] + $roles, null, ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('Photo', 'Photo:') }}
            {{ Form::file('photo_id', null, ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('is_active', 'Status:') }}
            {{ Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null , ['class'=>'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Create User',['class'=>'btn btn-primary']) }}
        </div>


    </div>

</div>




{!! Form::close() !!}


<div class="row">
    @include('includes/form_error')
</div>

@endsection
