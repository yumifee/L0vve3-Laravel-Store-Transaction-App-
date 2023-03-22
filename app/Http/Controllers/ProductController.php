<?php
/**
 * @Author: Your name
 * @Date:   2023-03-02 13:13:22
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-22 23:19:56
 */


namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $products = Product::all();
            return DataTables::of($products)
            ->addColumn('action', function ($row) {
                $html = '<a href='.route('products.edit',$row->id).' class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
                </a>';
                $html.= '<a href='.route('products.destroy', $row->id).' class="btn btn-xs btn-default text-danger mx-1 shadow" title="Edit" onclick="notificationBeforeDelete(event, this)">
                <i class="fa fa-lg fa-fw fa-trash"></i>
                </a>';
                return $html;
            })
            ->toJson();
            }
        return view('products.index');
        Log::info('User mengakses indeks produk', ['user' => Auth::user()->id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            Log::warning('User mencoba menambahkan data produk', ['user' => Auth::user()->id, 'data' => $request]);
            $product_count = Product::all()->count() + 1;
            $product = new Product;
            if($product_count < 10){
                $product->code = date("Y")."00000000".$product_count;
            }
            else if($product_count > 10){
                $product->code = date("Y")."0000000".$product_count;
            }
            else if($product_count > 100){
                $product->code = date("Y")."000000".$product_count;
            }
            else if($product_count > 1000){
                $product->code = date("Y")."00000".$product_count;
            }
            else if($product_count > 10000){
                $product->code = date("Y")."0000".$product_count;
            }
            else if($product_count > 100000){
                $product->code = date("Y")."000".$product_count;
            }
            else if($product_count > 1000000){
                $product->code = date("Y")."00".$product_count;
            }
            else if($product_count > 10000000){
                $product->code = date("Y")."0".$product_count;
            }
            else if($product_count > 100000000){
                $product->code = date("Y").$product_count;
            }
            $product->product_name = $request->product_name;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->save();
            Log::info('Berhasil menambah product baru', ['user' => Auth::user()->id]);
            return redirect()->route('products.index')->with('success_message', 'Berhasil menambah Produk baru');
            }catch (\Exception $e) {
            Log::error('Format yang anda masukkan salah !', ['user' => Auth::user()->id, 'data' => $request]);
            return redirect()->route('products.create')->with('error_message', 'Format yang anda masukkan salah');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('products.edit', [
            'product' => $products
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Log::warning('User mencoba mengupdate data produk', ['user' => Auth::user()->id, 'data' => $request]);
        $request->validate([
            'code' => 'required | min:13 | max:13',
            'product_name'=> 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);
        $product = product::find($id);
        $product->code = $request->code;
        $product->product_name = $request->product_name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        if($product->save()){
        Log::info('Berhasil mengubah product', ['user' => Auth::user()->id, 'product' => $product->id]);
        return redirect()->route('products.index') ->with('success_message', 'Berhasil mengupdate produk ');
        }
        Log::error('Data yang diubah tidak sesuai dengan format yang ditentukan', ['user' => Auth::user()->id, 'product' => $product->id, 'data' => $request]);
        return with('error_message', 'Format Tidak sesuai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        //menambahkan code
        if($product){
        Log::info('User berhasil menghapus data', ['user' => Auth::user()->id, 'product' => $id]);
        $product->delete();
        return redirect()->route('products.index')
            ->with('success_message', 'Berhasil menghapus produk',['product' => $product]);
        }
        Log::error('Data tidak tidak ditemukan user untuk dihapus', ['user' => Auth::user()->id, 'product' => $id]);
        return with('error_message', 'Format Tidak sesuai');//404
    }

    public function beli(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'jumlah' => 'required',
        ]);
        // $product = product::find($request->code);
        $product = product::where('code', '=', $request->code)->first();

        $product->quantity = $product->quantity + $request->jumlah;
        if($product->save()){
        Log::info('Berhasil mengubah product', ['user' => Auth::user()->id, 'product' => $product->id]);
        return redirect()->route('products.index') ->with('success_message', 'Berhasil mengupdate produk ');
        }
        Log::error('Data yang diubah tidak sesuai dengan format yang ditentukan', ['user' => Auth::user()->id, 'product' => $product->id, 'data' => $request]);
        return with('error_message', 'Format Tidak sesuai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

}
