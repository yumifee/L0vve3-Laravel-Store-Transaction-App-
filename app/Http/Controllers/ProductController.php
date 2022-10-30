<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', [
            'products' => $products
        ]);
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
        $request->validate([
                'code' => 'required | min:13 | max:13',
                'product_name'=> 'required',
                'quantity' => 'required',
                'price' => 'required'
        ]);
        $array = $request->only([
            'code', 'product_name','quantity', 'price'
        ]);
        $products = Product::create($array);
        
        return redirect()->route('products.index')
                ->with('success_message', 'Berhasil menambah product baru');
        }catch (\Exception $e) {
        return redirect()->route('products.create')
        ->with('error_message', 'Kode Barang yang Anda Masukkan Harus Memiliki 13 Karakter');;
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
        $request->validate([
            'code' => 'required',
            'product_name'=> 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);
        $product = product::find($id);
        $product->code = $request->code;
        $product->product_name = $request->product_name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->save();
        return redirect()->route('products.index')
            ->with('success_message', 'Berhasil mengubah product');
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
        $product->delete();
        return redirect()->route('products.index')
            ->with('success_message', 'Berhasil menghapus product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

}