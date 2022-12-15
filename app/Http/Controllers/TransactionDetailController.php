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

class TransactionDetailController extends Controller
{
    public function index(Request $request){
        // if($request->ajax()){
        //     $transactiondetais = TransactionDetail::all();
        //     return DataTables::of($transactions)
        //     ->addColumn('action', function($row){
        //         $html = '<a href='.route('transactiondetails.create', $row->id).'class="btn btn-xs btn-default text-primary mx-1 shadow" title="Tambah">
        //         <i class="fa fa-lg fa-fw fa-pen"></i>
        //         </a>';
        //         $html = '<a href='.route('transactiondetails.index', $row->id).'class="btn btn-xs btn-default text-primary mx-1 shadow" title="Selesai">
        //         <i class="fa fa-lg fa-fw fa-pen"></i>
        //         </a>';
        //         return $html;
        //     })
        //     ->toJson();
        //     }  
        $transactiondetails = TransactionDetail::all();
        return view('transactionDetail.index', [
            'transactiondetails' => $transactiondetails
        ]);
        Log::info('sedang di akses', ['user'=>Auth::user()->$transactiondetails->id]);
        }
    

    public function create(Request $request){
        $data = array('title' => 'Detail Transaction');
        $products = Product::all();
<<<<<<< HEAD
        return view('transactiondetail.index', compact(Product));
=======
        return view('transactiondetail.create', compact('products'));
        // $products = Product::all();
        // return view('transactiondetail.index', compact('products'));
>>>>>>> 666813062348040adb81b3c7008817473d86ce13
        // return view('products.index', ['products' => $request->only(['code','quantity'])]);
        // return view('transactiondetail.create', compact($products));
    }

    public function show(Request $request){
        $data = array('title' => 'Detail Transaction');
        // $transactiondetails = TransactionDetail::all();
        return view('transactiondetail.index', [
            'transactiondetails' => $transactiondetails
        ]);
    }

    public function store(Request $request)
    {
        try{
        Log::warning('User mencoba mengambil data produk', ['user' => Auth::user()->id, 'data' => $request]);
        $request->validate([
                'code'=>'required',
                'product_name'=> 'required',
                'quantity' => 'required',
                'price'=>'required'
        ]);
        $array = $request->all();
        $array['quantity'] = (int)$array['quantity'];
        $array['price'] = (int)$array['price'];
        // dd($array);
        $transactiondetails = TransactionDetail::create($array);
        Log::info('Berhasil menambah product baru', ['user' => Auth::user()->id, 'transactiondetail' => $transactiondetails->invoice]);
        return redirect()->route('transactiondetails.index')->with('success_message', 'Berhasil menambah Produk baru');
        }catch (\Exception $e) {
        Log::error('Format yang anda masukkan salah !', ['user' => Auth::user()->id, 'data' => $request]);
        return redirect()->route('transactions.create')->with('error_message', 'Format yang anda masukkan salah');
        }
    }

    // public function edit($id){
    //     $data = array('title' => 'Edit Transaction');
    //     return view('transactiondetails.edit', ['transactiondetails' => $data]);
    // }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
