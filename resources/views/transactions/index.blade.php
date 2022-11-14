@extends('adminlte::page')
@section('title', 'Transaction Page')
@section('content_header')
    <h1 class="m-0 text-dark">Data Transaction</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('transactions.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <a href="reportStock" class="btn btn-primary mb-2">
                        Laporan
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Invoice</th>
                            <!-- <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Total Barang</th> -->
                            <th>Total Harga</th>
                            <!-- <th>Diskon</th> -->
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $key => $transaction)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $transaction->invoice }}</td>
                                <td>{{$transaction->harga}}</td>
                                <td>
                                <a href="{{ route('transactions.show', $transaction) }}" class="btn btn-sm btn-info btn-xs">
                                    Detail
                                </a>
                                    <a href="{{route('transactions.edit', $transaction)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('transactions.destroy', $transaction)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush