<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\Transaction\CreateTransactionRequest;
use App\Http\Requests\Transaction\UpdateTransactionRequest;
use App\Http\Controllers\Controller;
use App\Repositories\TransactionRepository;
use App\Repositories\TransactionCodeRepository;
use App\Repositories\LogRepository;

class TransactionController extends Controller
{
    protected $transaction;

    protected $transaction_code;

    public function __construct(TransactionRepository $transaction, TransactionCodeRepository $transaction_code, LogRepository $log)
    {
        $this->transaction = $transaction;
        $this->transaction_code = $transaction_code;
        $this->log = $log;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = $this->transaction->all();

        $transaction_codes = $this->transaction_code->listId();

        return view('transaction.index',compact('transactions', 'transaction_codes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTransactionRequest $request)
    {
        $input = $request->only('account_id', 'transaction_code_id', 'date', 'amount');

        $transaction = $this->transaction->createTransaction($input);

        $log = $this->log->create(['action' => 'create', 'table' => 'transactions', 'user_id' => \Auth::user()->id]);

        return redirect()->back()->withCreated('Successfully added transaction!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, $id)
    {
        $transaction = $this->transaction->findorfail($id);

        $transaction->update($request->only('transaction_code'));

        $log = $this->log->create(['action' => 'edit', 'table' => 'accounts', 'user_id' => \Auth::user()->id]);

        return redirect()->back()->withUpdated('ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = $this->transaction->findorfail($id);

        $delete_message = $transaction->account->name.'\'s transaction  with amount('.$transaction->amount.') successfully deleted.';

        $transaction->delete();

        $log = $this->log->create(['action' => 'delete', 'table' => 'transactions', 'user_id' => \Auth::user()->id]);

        return redirect()->back()->withDelete($delete_message);
    }
}
