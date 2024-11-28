@extends('layouts.master')

@section('title', 'Data Mahasiswa')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1>{{ isset($data) ? 'Ubah' : 'Tambah' }} Data Mahasiswa</h1>
        </div>
        <div class="col text-end">
            <a href="{{ url('mahasiswa') }}" class="btn btn-sm btn-secondary mt-3">Kembali</a>
        </div>
    </div>
@stop


@section('content')
    <form method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label class="fw-bold">NIM</label>
                    <input type="text" name="nim" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Nama</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                        <option value="PEREMPUAN">PEREMPUAN</option>
                    </select>
                </div>
                
                <div class="form-group mb-3 text-end">
                    <button type="submit" class="btn btn-primary col-2">Simpan</button>
                </div>
            </div>
        </div>
    </form>
@stop