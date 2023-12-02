@extends('admin.layout')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach
    </ul>
</div>
@endif

<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Ubah Data Admin</h5>
        <form method="post" action="{{ route('admin.updateBeli', $data->ID_Pembelian) }}">
            @csrf
            <div class="mb-3">
                <label for="ID_Pembelian" class="form-label">ID Pembelian</label>
                <input type="text" class="form-control" id="ID_Pembelian" name="ID_Pembelian" value="{{ $data->ID_Pembelian }}">
            </div>
            <div class="mb-3">
                <label for="ID_Produk" class="form-label">ID Produk</label>
                <input type="text" class="form-control" id="ID_Produk" name="ID_Produk" value="{{ $data->ID_Produk }}">
            </div>
            <div class="mb-3">
                <label for="ID_User" class="form-label">ID User</label>
                <input type="text" class="form-control" id="ID_User" name="ID_User" value="{{ $data->ID_User }}">
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $data->jumlah }}">
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $data->tanggal }}">
            </div>
            <div class="mb-3">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="text" class="form-control" id="total_harga" name="total_harga" value="{{ $data->total_harga }}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
@stop