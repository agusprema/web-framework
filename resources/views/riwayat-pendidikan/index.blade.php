@extends('layouts.master')

@section('title', 'Data Riwayat Pendidikan')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1>Data Riwayat Pendidikan</h1>
        </div>
        <div class="col text-end">
            <a href="{{ url('riwayat-pendidikan/'. $mhs_id .'/create') }}" class="mt-3 btn btn-sm btn-primary">Tambah</a>
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
                <th>Jenjang</th>
                <th>Nama Sekolah</th>
                <th>Alamat</th>
                <th>Tahun masuk</th>
                <th>Tahun lulus</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $val)
                <tr>
                    <td>{{ ($key + 1) }}.</td>
                    <td>{{ $val->jenjang }}</td>
                    <td>{{ $val->nama_sekolah }}</td>
                    <td>{{ $val->alamat }}</td>
                    <td>{{ $val->tahun_masuk }}</td>
                    <td>{{ $val->tahun_lulus }}</td>
                    <td class="text-center">
                        <a href="{{ url('riwayat-pendidikan/'. $mhs_id. '/update/'. $val->id) }}" class="btn btn-sm btn-warning">Ubah</a>
                        <a href="{{ url('riwayat-pendidikan/'. $mhs_id. '/delete/'. $val->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
