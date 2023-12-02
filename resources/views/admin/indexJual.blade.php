@extends('admin.layout')

@section('content')

<h4 class="mt-5">Data Penjualan</h4>

<a href="{{ route('admin.createJual') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID Penjualan</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>Action</th>
        </tr>
    </thead>

    <div class="mt-3">
    <form method="GET" action="{{ route('admin.searchJual') }}">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search Penjualan">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>
    </div>

    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->ID_Penjualan }}</td>
            <td>{{ $data->Nama_Produk }}</td>
            <td>{{ $data->jumlah }}</td>
            <td>{{ $data->tanggal }}</td>
            <td>{{ $data->total_harga }}</td>
            <td>
                <a href="{{ route('admin.editJual', $data->ID_Penjualan) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
                    <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->ID_Penjualan }}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->ID_Penjualan }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.trashJual', $data->ID_Penjualan) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop