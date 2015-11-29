@extends('master')

@section('title')
    Edit Account
@endsection

@section('content-header')
    <div>
        Edit Account
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-12">
        @if (Session::has('updated'))
            <div class="alert alert-success">
                <span>Account with ID - <b>{{ $account->id }}</b> has been updated!</span>
            </div>
        @endif
        <div class="box box-solid box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Edit account with ID - {{ $account->id }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($account, ['url' => route('admin.account.update', $account->id), 'class' => 'form-group', 'method' => 'PUT']) !!}
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
                    <button type="submit" class="btn btn-warning">Update</button>
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