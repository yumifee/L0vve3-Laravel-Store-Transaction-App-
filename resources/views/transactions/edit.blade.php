@extends('adminlte::page')
@section('title', 'Edit product')
@section('content_header')
    <h1 class="m-0 text-dark">Edit product</h1>
@stop
@section('content')
    <form action="{{route('products.update', $product)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="form-group">
                        <label for="exampleInputName">Kode Barang</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="exampleInputName" placeholder="Kode Barang" name="code" value="{{$product->code ?? old('code')}}">
                        @error('code') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama Barang</label>
                        <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputUserName" placeholder="Nama Barang" name="product_name" value="{{$product->product_name ?? old('product_name')}}">
                        @error('product_name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Jumlah</label>
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Jumlah" name="quantity" value="{{$product->quantity ?? old('quantity')}}">
                        @error('quantity') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Harga Barang</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="exampleInputPassword" placeholder="Masukkan Harga" name="price" value="{{$product->price ?? old('price')}}">
                        @error('price') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('products.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop