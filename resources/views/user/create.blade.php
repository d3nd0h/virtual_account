@extends('master')

@section('title')
    Create User
@endsection

@section('content-header')
    <div>
        Create User
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-12">
        @if (Session::has('id'))
            <div class="alert alert-success">
                <span>User created with ID - <b>{{ Session::get('id') }}</b></span>
            </div>
        @endif
        <div class="box box-solid box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Add a new user</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['url' => route('admin.user.store'), 'class' => 'form-group']) !!}

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
                        <label for="username">Username</label>
                        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => "Enter username"]) !!}
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