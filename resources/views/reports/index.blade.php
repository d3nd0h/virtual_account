@extends('master')

@section('title')
    Transaction per Day
@endsection

@section('content-header')
    <div>
        Transaction per day List
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box  table-responsive">
                <div class="box-header">
                    <h3 class="box-title">List transaction amount per day</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->date }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
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