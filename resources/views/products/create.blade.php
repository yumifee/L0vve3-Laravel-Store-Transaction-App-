@extends('adminlte::page')
@section('title', 'Tambah product')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah product</h1>
@stop
@section('content')
    <form action="{{route('products.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="form-group">
                        <label for="exampleInputName">Kode Barang</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="exampleInputName" placeholder="Kode Barang" name="code" value="{{old('code')}}">
                        @error('code') <span class="text-danger">{{$message}}</span> @enderror
                    </div> -->
                    <div class="form-group">
                        <label for="exampleInputName">Nama Barang</label>
                        <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputUserName" placeholder="Nama Barang" name="product_name" value="{{old('product_name')}}">
                        @error('product_name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Jumlah Barang</label>
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Jumlah" name="quantity" value="{{old('quantity')}}">
                        @error('quantity') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Harga Barang</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="exampleInputPassword" placeholder="Masukkan Harga" name="price" value="{{old('price')}}">
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