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
                        <label for="exampleInputName">Invoice</label>
                        <input type="text" class="form-control @error('invoice') is-invalid @enderror" id="exampleInputName" placeholder="Invioce" name="invoice" value="{{old('invoice')}}">
                        @error('invoice') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Total Harga</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="exampleInputPassword" placeholder="Masukkan Harga" name="price" value="{{old('price')}}">
                        @error('price') <span class="text-danger">{{$message}}</span> @enderror
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