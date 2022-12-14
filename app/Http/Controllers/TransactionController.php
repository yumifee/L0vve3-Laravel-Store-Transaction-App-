<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $transactions = Transaction::all();
            return DataTables::of($transactions)
            ->addColumn('action', function($row){
                // $html = '<a href='.route('transaction.edit', $row->id).'class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                // <i class="fa fa-lg fa-fw fa-pen"></i>
                // </a>';
                $html.= '<a href='.route('transaction.destroy', $row->id).' class="btn btn-xs btn-default text-danger mx-1 shadow" title="Edit" onclick="notificationBeforeDelete(event, this)">
                <i class="fa fa-lg fa-fw fa-trash"></i>
                </a>';
                return $html;
            })
            ->toJson();
            }  
        return view('transactions.index');
        Log::info('sedang di akses', ['user'=>Auth::user()->$transactions->id]);
        }
    

    public function create(Request $request){
        $data = array('title' => 'Detail Transaction');
        $products = Product::all();
        return view('transactiondetail.create', compact('products'));
        // return view('products.index', ['products' => $request->only(['code','quantity'])]);
        //return view('transactiondetail.create', ['transactiondetail' => $data]);
    }

    public function show(Request $request){
        $data = array('title' => 'Detail Transaction');
        $this->product::all();
        return view('transactiondetails.index', compact(products));
    }

    public function store(Request $request)
    {
        try{
        Log::warning('User mencoba mengambil data produk', ['user' => Auth::user()->id, 'data' => $request]);
        $request->validate([
                'product_name'=> 'required',
                'quantity' => 'required',
                'price' => 'required'
        ]);
        $array = $request->only([
            'product_name','quantity', 'price'
        ]);
        $transaction = transaction::create($array);
        Log::info('Berhasil menambah product baru', ['user' => Auth::user()->id, 'transaction' => $transactions->invoice]);
        return redirect()->route('transactiondetail.index')->with('success_message', 'Berhasil menambah Produk baru');
        }catch (\Exception $e) {
        Log::error('Format yang anda masukkan salah !', ['user' => Auth::user()->id, 'data' => $request]);
        return redirect()->route('transactiondetails.create')->with('error_message', 'Format yang anda masukkan salah');
        }
    }

    public function edit($id){
        //   
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
