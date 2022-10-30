<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h2>{{ $title }}</h2>
    <p>Tanggal : {{ $date }}</p>
    <table class="table table-5m">

        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga Barang</th>
                </tr>
            </thead>
            <tbody>
            @foreach($product as $key => $products)
              <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$products->code}}</td>
                <td>{{$products->product_name}}</td>
                <td>{{$products->quantity}}</td>
                <td>{{$products->price}}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
</body>
</html>