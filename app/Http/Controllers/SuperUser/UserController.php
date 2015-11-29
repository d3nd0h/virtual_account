<?php

namespace App\Http\Controllers\SuperUser;

use Illuminate\Http\Request;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\LogRepository;
use App\Repositories\TransactionCodeRepository;

class UserController extends Controller
{
    protected $user;

    protected $log;

    protected $transaction_code;

    public function __construct(UserRepository $user, LogRepository $log, TransactionCodeRepository $transaction_code)
    {
        $this->user = $user;
        $this->log = $log;
        $this->transaction_code = $transaction_code;
        $this->middleware('superuser');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->all();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->user->create($input);

        $log = $this->log->create(['action' => 'create', 'table' => 'users', 'user_id' => \Auth::user()->id]);

        return redirect()->back()->withId($user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->findorfail($id);

        $transactions = $this->user->transactions($id);

        $transaction_codes = $this->transaction_code->listId();

        return view('user.show', compact('user', 'transactions', 'transaction_codes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->findorfail($id);

        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->user->findorfail($id);

        $updated_field = $request->only('name', 'password');

        $updated_field['password'] = bcrypt($updated_field['password']);

        $user->update($updated_field);

        $log = $this->log->create(['action' => 'edit', 'table' => 'users', 'user_id' => \Auth::user()->id]);

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
        $user = $this->user->findorfail($id);

        $delete_message = 'User '.$user->username.'('.$id.') successfully deleted.';

        $user->delete();

        $log = $this->log->create(['action' => 'delete', 'table' => 'users', 'user_id' => \Auth::user()->id]);

        return redirect()->back()->withDelete($delete_message);
    }
}
