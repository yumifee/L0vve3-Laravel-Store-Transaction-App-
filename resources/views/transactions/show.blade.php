@extends('adminlte::page')
@section('title', 'Detail Transaction Page')
@section('content_header')
    <h1 class="m-0 text-dark">Deatil Data Transaction</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="card-footer">
                    <a href="{{route('transactions.index')}}" class="btn btn-sm btn-danger">
                        Tutup
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Dibeli</th>
                            <th>Harga</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactiondetails as $key => $detail)
                            <tr>
                                <td>{{ $detail->id }}</td>
                                <td>{{ $detail->code }}</td>
                                <td>{{ $detail->product_name }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ $detail->price }}</td>
                                <td>
                                    <a href="{{route('transactions.edit', $transaction)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('transactions.destroy', $transaction)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1234567890121</td>
                                <td>baju</td>
                                <td>3</td>
                                <td>10000</td>
                                <td>
                                    <a href="{{route('transactions.edit', $transaction)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('transactions.destroy', $transaction)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <b>Total Harga</b>
                                </td>
                                <td class="text-right">
                                    <b>15000</b>
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