@extends('layouts.master')

@section('title', 'Data Mahasiswa')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1>Data Mahasiswa</h1>
        </div>
        <div class="col text-end">
            <a href="{{ url('mahasiswa/create') }}" class="mt-3 btn btn-sm btn-primary">Tambah</a>
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
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Tahun Angkatan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $val)
                <tr>
                    <td>{{ ($key + 1) }}.</td>
                    <td>{{ $val->nim }}</td>
                    <td>{{ $val->nama }}</td>
                    <td>{{ $val->jenis_kelamin }}</td>
                    <td>{{ $val->jurusan }}</td>
                    <td>{{ $val->tahun_angkatan }}</td>
                    <td class="text-center">
                        <a href="{{ url('mahasiswa/update/'. $val->id) }}" class="btn btn-sm btn-warning">Ubah</a>
                        <a href="{{ url('mahasiswa/delete/'. $val->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
