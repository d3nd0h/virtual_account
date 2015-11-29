<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Account;
use App\Http\Requests\Account\CreateAccountRequest;
use App\Http\Requests\Account\UpdateAccountRequest;
use App\Http\Controllers\Controller;
use App\Repositories\AccountRepository;
use App\Repositories\TransactionCodeRepository;
use App\Repositories\LogRepository;

class AccountController extends Controller
{
    protected $account;

    protected $transaction_code;

    protected $log;

    public function __construct(AccountRepository $account, TransactionCodeRepository $transaction_code, LogRepository $log)
    {
        $this->account = $account;
        
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
        $accounts = $this->account->all();

        return view('account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAccountRequest $request)
    {
        //return $input = $request->all();
        $input = $request->all();

        $account = $this->account->createAccount($input);

        $log = $this->log->create(['action' => 'create', 'table' => 'accounts', 'user_id' => \Auth::user()->id]);

        return redirect()->back()->withId($account->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = $this->account->findorfail($id);

        $transactions = $this->account->getTransactions($id);

        $transaction_codes = $this->transaction_code->listId();

        $balance = $this->account->balance($id);

        return view('account.show', compact('account', 'transactions', 'transaction_codes', 'balance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = $this->account->findorfail($id);

        return view('account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountRequest $request, $id)
    {
        $account = $this->account->findorfail($id);

        $account->update($request->all());

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
        $account = $this->account->findorfail($id);

        $delete_message = 'Account '.$account->name.'('.$id.') successfully deleted.';

        $account->delete();

        $log = $this->log->create(['action' => 'delete', 'table' => 'accounts', 'user_id' => \Auth::user()->id]);

        return redirect()->back()->withDelete($delete_message);
    }

    public function find()
    {
        $accounts = $this->account->listId();

        return view('account.find', compact('accounts'));
    }

    public function doFind(Request $request)
    {
        $id = $request->get('id');

        return redirect()->route('admin.account.show', $id);
    }
}
