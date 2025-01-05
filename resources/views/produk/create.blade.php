@extends('layouts.master')

@section('title', 'Data Produk')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1>{{ isset($data) ? 'Ubah' : 'Tambah' }} Data Produk</h1>
        </div>
        <div class="col text-end">
            <a href="{{ url('produk') }}" class="mt-3 btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
@stop


@section('content')
    <form method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('nama_produk') ?: 'is-invalid' }}">Nama Produk</label>
                    <input value="{{ old('nama_produk') }}" type="text" name="nama_produk" class="form-control {{ !$errors->has('nama_produk') ?: 'is-invalid' }}">
                    @if ($errors->has('nama_produk'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama_produk') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('kategori') ?: 'is-invalid' }}">Kategori</label>
                    <select name="kategori" class="form-control {{ !$errors->has('kategori') ?: 'is-invalid' }}">
                        <option {{ old('kategori') != 'elektronik' ?: 'selected' }} value="elektronik">Elektronik</option>
                        <option {{ old('kategori') != 'pakaian' ?: 'selected' }} value="pakaian">Pakaian</option>
                        <option {{ old('kategori') != 'alat olahraga' ?: 'selected' }} value="alat olahraga">Alat Olahraga</option>
                        <option {{ old('kategori') != 'alat rumah tangga' ?: 'selected' }} value="alat rumah tangga">Alat Rumah Tangga</option>
                    </select>
                    @if ($errors->has('kategori'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kategori') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('harga') ?: 'is-invalid' }}">Harga</label>
                    <input value="{{ old('harga') }}" type="number" name="harga" class="form-control {{ !$errors->has('harga') ?: 'is-invalid' }}">
                    @if ($errors->has('harga'))
                        <div class="invalid-feedback">
                            {{ $errors->first('harga') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('stok') ?: 'is-invalid' }}">Stok</label>
                    <input value="{{ old('stok') }}" type="number" name="stok" class="form-control {{ !$errors->has('stok') ?: 'is-invalid' }}">
                    @if ($errors->has('stok'))
                        <div class="invalid-feedback">
                            {{ $errors->first('stok') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('deskripsi') ?: 'is-invalid' }}">Deskripsi</label>
                    <input value="{{ old('deskripsi') }}" type="text" name="deskripsi" class="form-control {{ !$errors->has('deskripsi') ?: 'is-invalid' }}">
                    @if ($errors->has('deskripsi'))
                        <div class="invalid-feedback">
                            {{ $errors->first('deskripsi') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3 form-group text-end">
                    <button type="submit" class="btn btn-primary col-2">Simpan</button>
                </div>
            </div>
        </div>
    </form>
@stop
