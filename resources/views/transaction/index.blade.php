@extends('master')

@section('title')
    Account Transactions
@endsection

@section('content-header')
    <div>
        View Transactions
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="box table-responsive">
                <div class="box-header">
                    <h3 class="box-title">List of Tansactions.</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if (Session::has('created'))
                        <div class="col-xs-12 col-md-12 alert alert-success">
                            {{ Session::get('created') }}
                        </div>
                    @endif
                    @if (Session::has('delete'))
                        <div class="col-xs-12 col-md-12 alert alert-danger">
                            {{ Session::get('delete') }}
                        </div>
                    @endif
                    @if (count($errors))
                        <div class="col-xs-12 col-md-12 alert alert-danger">
                            Error adding transaction!
                        </div>
                    @endif
                    <table id="example1" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Account ID</th>
                            <th>Account Name</th>
                            <th>Transaction Name</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Authorized by</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->account->id }}</td>
                                    <td>{{ $transaction->account->name }}</td>
                                    <td>{{ $transaction->transactionCode->transaction_name }}</td>
                                    <td>{{ $transaction->date }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->user->name }}</td>
                                    <td>
                                        <button title="destroy" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete_modal_{{ $transaction->id }}"><span class="fa fa-remove"></span></button>
                                        <div class="modal fade modal-danger" id="delete_modal_{{ $transaction->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">Delete Account</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure want to delete the following transaction</p>
                                                        <b>
                                                            <p>ID: {{ $transaction->id }}</p>
                                                            <p>Owner: {{ $transaction->account->name }}</p>
                                                            <p>Amount: {{ $transaction->amount }}</p>
                                                            <p>Type: {{ $transaction->transactionCode->transaction_name }}</p>
                                                        </b>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                        {!! Form::open(['url' => route('admin.transaction.destroy', $transaction->id), 'class' => 'form-group', 'method' => 'delete']) !!}
                                                            <button type="submit" class="btn btn-outline">Delete!</button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <button title="edit" class="btn btn-xs btn-info" data-toggle="modal" data-target="#edit_modal_{{ $transaction->id }}"><span class="fa fa-edit"></span></button>
                                        <div class="modal fade modal-info" id="edit_modal_{{ $transaction->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">Edit Transaction</h4>
                                                    </div>
                                                    {!! Form::model($transaction, ['url' => route('admin.transaction.update', $transaction->id), 'method' => 'PUT', 'class' => 'form-group']) !!}
                                                        <div class="modal-body">
                                                            @if (count($errors))
                                                                <div class="col-md-12 alert alert-danger">
                                                                    <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                            {!! Form::hidden('account_id', $transaction->account->id) !!}
                                                            <div class="form-group">
                                                                <label for="transaction_code_id">Transaction Type</label>
                                                                {!! Form::select('transaction_code_id', $transaction_codes, null, ['class' => 'form-control']) !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="date">Date</label>
                                                                {!! Form::text('date', null, ['id' => 'datepicker', 'class' => 'form-control', 'placeholder' => "Pick date"]) !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="amount">Amount</label>
                                                                {!! Form::text('amount', null, [    'class' => 'form-control money', 'placeholder' => "Enter amount"]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-outline">Edit</button>
                                                        </div>
                                                    {!! Form::close() !!}
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        <!-- /.modal-dialog -->
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Account ID</th>
                            <th>Account Name</th>
                            <th>Transaction Name</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Authorized by</th>
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
    <!-- InputMask -->
    <script src="{{ asset('plugins/jQuery-Mask-Plugin-1.13.4/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#example1").DataTable({
                responsive: true
            });

            $('#datepicker').datepicker({
                todayBtn: "linked",
                format: "yyyy/mm/dd",
                endDate: "today",
                autoclose: true,
                todayHighlight: true
            });

            $(".money").mask('000.000.000.000.000', {reverse: true});
        });
    </script>
@endsection