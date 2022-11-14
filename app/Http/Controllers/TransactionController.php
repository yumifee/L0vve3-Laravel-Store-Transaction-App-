<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::all();
        return view('transactions.index', [
            'transactions' => $transactions
        ]);
    }

    public function create(){
        $data = array('title' => 'Detail Transaction');
        return view('transactions.create', ['transactions' => $data]);
    }

    public function show($id){
        $transactiondetails = TransactionDetail::all();
        return view('transactions.show', [
            'transactiondetails' => $transactiondetails
        ]);
    }

    public function edit($id){
        $data = array('title' => 'Edit Transaction');
        return view('transactions.edit', ['transactions' => $data]);
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
