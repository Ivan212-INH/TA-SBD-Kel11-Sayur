@extends('admin.layout')

@section('content')

<h4 class="mt-5">Data Users</h4>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID Users</th>
            <th>Nama Users</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
    </thead>

    <div class="mt-3">
    <form method="GET" action="{{ route('admin.searchUsers') }}">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search Users">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>
    </div>

    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->ID_User }}</td>
            <td>{{ $data->nama_users }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->passwords }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop