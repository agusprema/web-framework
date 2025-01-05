<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\jurusan;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::with('jurusan')->get();

        return view('mahasiswa/index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        $dataJurusan = jurusan::get();
        return view('mahasiswa/create', [
            'dataJurusan' => $dataJurusan
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'nim'               => ['required', 'unique:mahasiswas,nim'],
            'nama'              => ['required'],
            'jenis_kelamin'     => ['required', Rule::in(['LAKI-LAKI', 'PEREMPUAN'])],
            'tanggal_lahir'     => ['required', 'date'],
            'alamat'            => ['required'],
            'jurusan'           => ['required'],
            'tahun_angkatan'    => ['required', 'integer', 'min:2000', 'max:3000'],
        ]);

        $data = [
            'nim'               => $request->nim,
            'nama'              => $request->nama,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'jurusan_id'        => $request->jurusan,
            'alamat'            => $request->alamat,
            'tahun_angkatan'    => $request->tahun_angkatan
        ];

        $result = Mahasiswa::insert($data);

        if ($result) {
            $msg = ['alert' => 'success', 'msg' => 'Berhasil Tambah Data'];
        } else {
            $msg = ['alert' => 'danger', 'msg' => 'Gagal Tambah Data'];
        }

        return redirect()->to('mahasiswa')->with('msg', $msg);
    }

    public function edit($id){
        $data = Mahasiswa::where('id', $id)->first();
        $dataJurusan = jurusan::get();

        return view('mahasiswa.update', [
            'data' => $data,
            'dataJurusan' => $dataJurusan
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nim'               => ['required', 'unique:mahasiswas,nim,'. $id],
            'nama'              => ['required'],
            'jenis_kelamin'     => ['required', Rule::in(['LAKI-LAKI', 'PEREMPUAN'])],
            'tanggal_lahir'     => ['required', 'date'],
            'alamat'            => ['required'],
            'jurusan'           => ['required'],
            'tahun_angkatan'    => ['required', 'integer', 'min:2000', 'max:3000'],
        ]);

        $data = [
            'nim'               => $request->nim,
            'nama'              => $request->nama,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'jurusan_id'        => $request->jurusan,
            'alamat'            => $request->alamat,
            'tahun_angkatan'    => $request->tahun_angkatan
        ];

        $result = Mahasiswa::where('id', $id)->update($data);

        if ($result) {
            $msg = ['alert' => 'success', 'msg' => 'Berhasil Edit Data'];
        } else {
            $msg = ['alert' => 'danger', 'msg' => 'Gagal Edit Data'];
        }

        return redirect()->to('mahasiswa')->with('msg', $msg);
    }

    public function destroy($id)
    {
        $result = Mahasiswa::where('id', $id)->delete();

        if ($result) {
            $msg = ['alert' => 'success', 'msg' => 'Berhasil Delete Data'];
        } else {
            $msg = ['alert' => 'danger', 'msg' => 'Gagal Delete Data'];
        }

        return redirect()->to('mahasiswa')->with('msg', $msg);
    }
}
