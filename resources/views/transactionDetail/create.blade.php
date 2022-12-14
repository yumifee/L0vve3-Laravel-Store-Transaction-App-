@extends('adminlte::page')
@section('title', 'Transaksi')
@section('content_header')
    <h1 class="m-0 text-dark">Transaksi</h1>
@stop
@section('content')
    <form action="{{route('transactions.index')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                    <label for="product">Nama Barang:</label>
                    <select wire:model="products" class="form-control" id="products">
                    <!-- <input list="products" name="products" id="product"> -->
                    <!-- <datalist id="products"> -->
                        <option selected value=""></option>
                            @foreach ($products as $product)
                                <option value="{{$product->code}}">{{$product->product_name}}</option>
                            @endforeach
                    </select>
                    </div>
                
                    <!-- <div class="form-group">
                        <label for="exampleInputName">Nama Barang</label>
                        <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputUserName" placeholder="Nama Barang" name="product_name" value="{{old('product_name')}}">
                        @error('product_name') <span class="text-danger">{{$message}}</span> @enderror
                    </div> -->
                    <div class="form-group">
                        <label for="exampleInputEmail">Jumlah Barang</label>
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Jumlah" name="quantity" value="{{old('quantity')}}">
                        @error('quantity') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleInputPassword">Total Harga</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="exampleInputPassword" placeholder="Masukkan Harga" name="price" value="{{old('price')}}">
                        @error('price') <span class="text-danger">{{$message}}</span> @enderror
                    </div> -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('transactions.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop