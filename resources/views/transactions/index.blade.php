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
        $(document).ready(function(){
        $('#example2').DataTable({
            ajax: '',
            serverSide: true,
                processing: true,
                aaSorting:[[0,"asc"]],
                columns: [
                    {data: 'no', name: 'no', render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                    }, width: '5%'},
                    {data: 'invoice', name: 'invoice'},
                    {data: 'harga', name: 'harga'},
                ],
                lengthMenu: [10, 25, 50, 75, 100],
            });
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