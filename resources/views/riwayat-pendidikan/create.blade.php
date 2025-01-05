@extends('layouts.master')

@section('title', 'Data Riwayat Pendidikan')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1>{{ isset($data) ? 'Ubah' : 'Tambah' }} Data Riwayat Pendidikan</h1>
        </div>
        <div class="col text-end">
            <a href="{{ url('riwayat-pendidikan') }}" class="mt-3 btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
@stop


@section('content')
    <form method="POST" action="{{ url('riwayat-pendidikan/'. $mhs_id) }}">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('jenjang') ?: 'is-invalid' }}">Jenjang</label>
                    <select name="jenjang" class="form-control {{ !$errors->has('jenjang') ?: 'is-invalid' }}">
                        @foreach ($dataJenjang as $jenjang)
                            <option {{ !old('jenjang') ?: 'selected' }} value="{{ $jenjang->nama }}">{{ $jenjang->nama }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('jenjang'))
                        <div class="invalid-feedback">
                            {{ $errors->first('jenjang') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('nama_sekolah') ?: 'is-invalid' }}">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control {{ !$errors->has('nama_sekolah') ?: 'is-invalid' }}" value="{{ old('nama_sekolah') }}">
                    @if ($errors->has('nama_sekolah'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama_sekolah') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('alamat') ?: 'is-invalid' }}">alamat</label>
                    <input type="text" name="alamat" class="form-control {{ !$errors->has('alamat') ?: 'is-invalid' }}" value="{{ old('alamat') }}">
                    @if ($errors->has('alamat'))
                        <div class="invalid-feedback">
                            {{ $errors->first('alamat') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('tahun_masuk') ?: 'is-invalid' }}">Tahun Masuk</label>
                    <input type="year" name="tahun_masuk" class="form-control {{ !$errors->has('tahun_masuk') ?: 'is-invalid' }}" value="{{ old('tahun_masuk') }}">
                    @if ($errors->has('tahun_masuk'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tahun_masuk') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('tahun_lulus') ?: 'is-invalid' }}">Tahun Lulus</label>
                    <input type="year" name="tahun_lulus" class="form-control {{ !$errors->has('tahun_lulus') ?: 'is-invalid' }}" value="{{ old('tahun_lulus') }}">
                    @if ($errors->has('tahun_lulus'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tahun_lulus') }}
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
