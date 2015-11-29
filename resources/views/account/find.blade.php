@extends('master')

@section('title')
    Find Account
@endsection

@section('content-header')
    <div>
        Find Account
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="box box-solid box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Find an account</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['url' => route('admin.account.find'), 'class' => 'form-group']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label>Choose ID</label>
                        {!! Form::select('id', $accounts, null, ['class' => 'form-control', 'style' => 'width: 100%;']) !!}
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-info">Find</button>
                </div>
            {!! Form::close() !!}
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection

@section('more-script')
    <script>
    $(function () {
        $(".select2").select2();
    });
    </script>
@endsection