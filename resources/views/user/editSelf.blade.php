@extends('master')

@section('title')
    Edit Profile
@endsection

@section('content-header')
    <div>
        Edit Profile
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-12">
        @if (Session::has('updated'))
            <div class="alert alert-success">
                <span>Your account has been updated!</span>
            </div>
        @endif
        <div class="box box-solid box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Edit this user</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($user, ['url' => route('admin.my.update', $user->id), 'class' => 'form-group', 'method' => 'PUT']) !!}

                @if (count($errors))
                    <div class="col-md-12 alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => "Enter name"]) !!}
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => "Enter password"]) !!}
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        {!! Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => "Confirm password"]) !!}
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-info">Add</button>
                </div>
            {!! Form::close() !!}
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection

@section('more-script')
@endsection