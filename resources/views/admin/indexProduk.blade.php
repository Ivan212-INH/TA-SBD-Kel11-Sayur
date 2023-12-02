@extends('admin.layout')

@section('content')

<h4 class="mt-5">Data Produk</h4>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Stok</th>
            <th>Harga</th>
        </tr>
    </thead>

    <div class="mt-3">
    <form method="GET" action="{{ route('admin.searchProduk') }}">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search Sayur">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>
    </div>

    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->ID_Produk }}</td>
            <td>{{ $data->nama_produk }}</td>
            <td>{{ $data->stok }}</td>
            <td>{{ $data->harga }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop