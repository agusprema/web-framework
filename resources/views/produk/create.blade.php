@extends('layouts.master')

@section('title', 'Data Mahasiswa')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1>{{ isset($data) ? 'Ubah' : 'Tambah' }} Data Mahasiswa</h1>
        </div>
        <div class="col text-end">
            <a href="{{ url('mahasiswa') }}" class="mt-3 btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
@stop


@section('content')
    <form method="POST" action="{{ url('/produk') }}">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3 form-group">
                    <label class="fw-bold">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control">
                </div>

                <div class="mb-3 form-group">
                    <label class="fw-bold">Kategori</label>
                    <select name="kategori" class="form-control">
                        <option selected value="elektronik">Elektronik</option>
                        <option value="pakaian">Pakaian</option>
                        <option value="alat olahraga">Alat Olahraga</option>
                        <option value="alat rumah tangga">Alat Rumah Tangga</option>
                    </select>
                </div>

                <div class="mb-3 form-group">
                    <label class="fw-bold">Harga</label>
                    <input type="number" name="harga" class="form-control">
                </div>

                <div class="mb-3 form-group">
                    <label class="fw-bold">Stok</label>
                    <input type="number" name="stok" class="form-control">
                </div>

                <div class="mb-3 form-group">
                    <label class="fw-bold">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control">
                </div>

                <div class="mb-3 form-group text-end">
                    <button type="submit" class="btn btn-primary col-2">Simpan</button>
                </div>
            </div>
        </div>
    </form>
@stop
