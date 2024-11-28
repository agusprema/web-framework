@extends('layouts.master')

@section('title', 'Data Produk')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1>Data Produk</h1>
        </div>
        <div class="col text-end">
            <a href="{{ url('produk/create') }}" class="mt-3 btn btn-sm btn-primary">Tambah</a>
        </div>
    </div>
@stop

@section('content')
    @if (Session::has('msg'))
        <div class="alert alert-dismissible alert-{{ Session::get('msg')['alert'] }}" role="alert">
            {{ Session::get('msg')['msg'] }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $val)
                <tr>
                    <td>{{ ($key + 1) }}.</td>
                    <td>{{ $val->nama_produk }}</td>
                    <td>{{ $val->kategori }}</td>
                    <td>{{ $val->harga }}</td>
                    <td>{{ $val->stok }}</td>
                    <td>{{ $val->deskripsi }}</td>
                    <td class="text-center">
                        <a href="{{ url('produk/update/'. $val->id) }}" class="btn btn-sm btn-warning">Ubah</a>
                        <a href="{{ url('produk/delete/'. $val->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
