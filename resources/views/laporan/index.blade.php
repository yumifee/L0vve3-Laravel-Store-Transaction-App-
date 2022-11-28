<?php
/**
 * @Author: Your name
 * @Date:   2022-11-21 08:17:57
 * @Last Modified by:   Your name
 * @Last Modified time: 2022-11-28 07:15:20
 */
?>
@extends('adminlte::page')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-12 col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Form Laporan</h3>
        </div>
        <div class="card-body">
          <form action="/laporan/proses" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="bulan">Bulan</label>
              <select name="bulan" id="bulan" class="form-control">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">Nopember</option>
                <option value="12">Desember</option>
              </select>
            </div>
            <div class="form-group">
              <label for="tahun">Tahun</label>
              <select name="tahun" id="tahun" class="form-control">
                @for($a = 2020; $a <= 2025; $a++)
                <option value="{{$a}}">{{$a}}</option>
                @endfor
              </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Buka Laporan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection