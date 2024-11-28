<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::get();

        return view('mahasiswa/index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('mahasiswa/create');
    }

    public function store(Request $request)
    {
        $data = [
            'nim'               => $request->nim,
            'nama'              => $request->nama,
            'jenis_kelamin'     => $request->jenis_kelamin,
        ];

        $result = Mahasiswa::insert($data);

        if ($result) {
            $msg = ['alert' => 'success', 'msg' => 'Berhasil Tambah Data'];
        } else {
            $msg = ['alert' => 'danger', 'msg' => 'Gagal Tambah Data'];
        }

        return redirect()->to('mahasiswa')->with('msg', $msg);
    }
}
