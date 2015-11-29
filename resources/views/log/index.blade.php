@extends('master')

@section('title')
    Logs
@endsection

@section('content-header')
    <div>
        Log
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <div class="box table-responsive">
                <div class="box-header">
                    <h3 class="box-title">Logs</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Action</th>
                            <th>Table</th>
                            <th>User_id</th>
                            <th>Timestamp</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{ $log->id }}</td>
                                    <td>{{ $log->action }}</td>
                                    <td>{{ $log->table }}</td>
                                    <td>{{ $log->user_id }}</td>
                                    <td>{{ $log->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Action</th>
                            <th>Table</th>
                            <th>User_id</th>
                            <th>Timestamp</th>
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
        $(document).ready(function () {
            $("#example1").DataTable({
                responsive: true
            });
        });
    </script>
@endsection