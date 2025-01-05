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
    <form method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('nim') ?: 'is-invalid' }}">NIM</label>
                    <input value="{{ $data->nim }}" type="text" name="nim" class="form-control {{ !$errors->has('nim') ?: 'is-invalid' }}">
                    @if ($errors->has('nim'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nim') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('nama') ?: 'is-invalid' }}">Nama</label>
                    <input value="{{ $data->nama }}" type="text" name="nama" class="form-control {{ !$errors->has('nama') ?: 'is-invalid' }}">
                    @if ($errors->has('nama'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('tanggal_lahir') ?: 'is-invalid' }}">Tanggal Lahir</label>
                    <input value="{{ $data->tanggal_lahir }}" type="date" name="tanggal_lahir" class="form-control {{ !$errors->has('tanggal_lahir') ?: 'is-invalid' }}">
                    @if ($errors->has('tanggal_lahir'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tanggal_lahir') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('alamat') ?: 'is-invalid' }}">Alamat</label>
                    <textarea rows="4" type="text" name="alamat" class="form-control {{ !$errors->has('alamat') ?: 'is-invalid' }}">{{ $data->alamat }}</textarea>
                    @if ($errors->has('alamat'))
                        <div class="invalid-feedback">
                            {{ $errors->first('alamat') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('nama_sekolah') ?: 'is-invalid' }}">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control {{ !$errors->has('nama_sekolah') ?: 'is-invalid' }}">
                        <option {{ $data->jenis_kelamin != 'LAKI-LAKI' ?: 'selected' }} value="LAKI-LAKI">LAKI-LAKI</option>
                        <option {{ $data->jenis_kelamin != 'PEREMPUAN' ?: 'selected' }} value="PEREMPUAN">PEREMPUAN</option>
                    </select>
                    @if ($errors->has('nama_sekolah'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama_sekolah') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('nama_sekolah') ?: 'is-invalid' }}">Jurusan</label>
                    <select name="jurusan" class="form-control {{ !$errors->has('nama_sekolah') ?: 'is-invalid' }}">
                        @foreach ($dataJurusan as $jurusan)
                            <option {{ $data->jurusan_id != $jurusan->id ?: 'selected' }} value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('nama_sekolah'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama_sekolah') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3 form-group">
                    <label class="fw-bold {{ !$errors->has('tahun_angkatan') ?: 'is-invalid' }}">Tahun Angkatan</label>
                    <input value="{{ $data->tahun_angkatan }}" type="number" min="2000" max="3000" name="tahun_angkatan" class="form-control {{ !$errors->has('tahun_angkatan') ?: 'is-invalid' }}">
                    @if ($errors->has('tahun_angkatan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tahun_angkatan') }}
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
