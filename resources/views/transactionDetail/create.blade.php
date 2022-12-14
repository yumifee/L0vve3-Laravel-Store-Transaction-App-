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
                        <option selected value=""></option>
                            @foreach ($products as $product)
                                <option value="{{$product->code}}">{{$product->product_name}}</option>
                            @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Jumlah Barang</label>
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Jumlah" name="quantity" value="{{old('quantity')}}">
                        @error('quantity') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
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