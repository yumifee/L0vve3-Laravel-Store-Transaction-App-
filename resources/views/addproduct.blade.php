@extends('adminlte::page')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-12 col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Scan Barcode</h3>
        </div>
        <div class="card-body">
        <center>
        <form action="/addstock" method="post">
            @method('PUT')
            @csrf
            <div class="col-4">
                <div>
                    <div id="reader" width="600px" name="code"></div>
                </div>
                <div>
                    
                    <label for="code">Kode Barang</label><br>
                    <input type="text" id="result" name="code">
                    <label for="jumlah">Masukkan Jumlah Tambah Stok</label><br>
                    <input type="number" name="jumlah">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </center>
</div>
   
<script>
    function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
  console.log(`Code matched = ${decodedText}`, decodedResult);
  $("#result").val(decodedText)
}


function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  console.warn(`Code scan error = ${error}`);
}


let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 250, height: 250} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>




   
</body>
</html>
@endsection