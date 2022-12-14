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
                <a href="{{route('transactiondetail.create')}}" class="btn btn-sm btn-primary">
                        Tambah
                    </a>
                    <a href="{{route('transactiondetail.index')}}" class="btn btn-sm btn-danger">
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