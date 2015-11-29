@extends('master')

@section('title')
    Users
@endsection

@section('content-header')
    <div>
        User List
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box  table-responsive">
                <div class="box-header">
                    <h3 class="box-title">All users will be displayed here.</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if (Session::has('delete'))
                        <div class="col-xs-12 col-md-12 alert alert-danger">
                            {{ Session::get('delete') }}
                        </div>
                    @endif
                    <table id="example1" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        <button title="delete" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete_modal_{{ $user->id }}"><span class="fa fa-remove"></span></button>
                                        <div class="modal fade modal-danger" id="delete_modal_{{ $user->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">Delete Account</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure want to delete the following user</p>
                                                        <b>
                                                            <p>Username: {{ $user->username }}</p>
                                                            <p>Name: {{ $user->name }}</p>
                                                        </b>
                                                        <p>Transaction authorized by this user will be deleted too!</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                        {!! Form::open(['url' => route('admin.user.destroy', $user->id), 'class' => 'form-group', 'method' => 'delete']) !!}
                                                            <button type="submit" class="btn btn-outline">Delete!</button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <a href="{{ route('admin.user.edit', $user->id) }}">
                                            <button title="edit" class="btn btn-xs btn-info"><span class="fa fa-edit"></span></button>
                                        </a>
                                        <a href="{{ route('admin.user.show', $user->id) }}">
                                            <button title="details" class="btn btn-xs btn-success"><span class="fa fa-child"></span></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

@section('more-script')
    <script>
        $(function () {
            $("#example1").DataTable({
                responsive: true
            });
        });
    </script>
@endsection