<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::get();

        return view('produk/index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('produk/create');
    }

    public function store(Request $request)
    {
        $data = [
            'nama_produk'   => $request->nama_produk,
            'kategori'      => $request->kategori,
            'harga'         => $request->harga,
            'stok'          => $request->stok,
            'deskripsi'     => $request->deskripsi
        ];

        $result = Produk::insert($data);

        if ($result) {
            $msg = ['alert' => 'success', 'msg' => 'Berhasil Tambah Data'];
        } else {
            $msg = ['alert' => 'danger', 'msg' => 'Gagal Tambah Data'];
        }

        return redirect()->to('produk')->with('msg', $msg);
    }
}