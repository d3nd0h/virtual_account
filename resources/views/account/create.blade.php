@extends('master')

@section('title')
    Create Account
@endsection

@section('content-header')
    <div>
        Create Account
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-12">
        @if (Session::has('id'))
            <div class="alert alert-success">
                <span>Account created with ID - <b>{{ Session::get('id') }}</b></span>
            </div>
        @endif
        <div class="box box-solid box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Add a new account</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['url' => route('admin.account.store'), 'class' => 'form-group']) !!}

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
                        <label for="birthdate">Birthdate</label>
                        {!! Form::text('birthdate', null, ['id' => 'datepicker', 'class' => 'form-control', 'placeholder' => "Pick birthdate"]) !!}
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => "Enter address"]) !!}
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => "Enter phone"]) !!}
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
    <script type="text/javascript">
        $(function () {
            $('#datepicker').datepicker({
                todayBtn: "linked",
                format: "yyyy/mm/dd"
            });
        });
    </script>
@endsection