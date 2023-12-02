@extends('admin.layout')

@section('content')

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<h4 class="mt-5">Sampah Data Pembelian</h4>
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID Pembelian</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trashBeli as $data)
        <tr>
            <td>{{ $data->ID_Pembelian }}</td>
            <td>{{ $data->Nama_Produk }}</td>
            <td>{{ $data->jumlah }}</td>
            <td>{{ $data->tanggal }}</td>
            <td>{{ $data->total_harga }}</td>
            <td>
            <a href="{{ route('admin.restoreBeli', $data->ID_Pembelian) }}" type="button"
                    class="btn btn-warning rounded-3">Restore</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->ID_Pembelian }}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->ID_Pembelian }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.deleteBeli', $data->ID_Pembelian) }}">
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

<h4 class="mt-5">Sampah Data Penjualan</h4>
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

    <tbody>
        @foreach ($trashJual as $data)
        <tr>
            <td>{{ $data->ID_Penjualan }}</td>
            <td>{{ $data->Nama_Produk }}</td>
            <td>{{ $data->jumlah }}</td>
            <td>{{ $data->tanggal }}</td>
            <td>{{ $data->total_harga }}</td>
            <td>
            <a href="{{ route('admin.restoreJual', $data->ID_Penjualan) }}" type="button"
                    class="btn btn-warning rounded-3">Restore</a>        
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
                            <form method="POST" action="{{ route('admin.deleteJual', $data->ID_Penjualan) }}">
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