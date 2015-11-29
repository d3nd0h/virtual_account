<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\TransactionRepository;

class ReportController extends Controller
{
    protected $transaction;

    public function __construct(TransactionRepository $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getIndex()
    {
        $transactions = $this->transaction->getTransactionPerDay();

        return view('reports.index',compact('transactions'));
    }
}
