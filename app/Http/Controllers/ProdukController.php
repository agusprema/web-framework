<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    private $message = [
        'required'      => 'Input :attribute harus diisi.',
        'unique'        => 'Data :attribute sudah digunakan.',
    ];

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

        $request->validate([
            'nama_produk'               => ['required', 'unique:produks'],
            'kategori'                  => ['required'],
            'harga'                     => ['required', 'integer'],
            'stok'                      => ['required', 'integer'],
            'deskripsi'                 => ['required']
        ], $this->message);

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

    public function edit($id)
    {
        $data = Produk::where('id', $id)->first();

        return view('produk.edit')->with(['data' => $data]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama_produk'               => ['required'],
            'kategori'                  => ['required'],
            'harga'                     => ['required', 'integer'],
            'stok'                      => ['required', 'integer'],
            'deskripsi'                 => ['required']
        ], $this->message);

        $data = [
            'nama_produk'   => $request->nama_produk,
            'kategori'      => $request->kategori,
            'harga'         => $request->harga,
            'stok'          => $request->stok,
            'deskripsi'     => $request->deskripsi
        ];

        $result = Produk::where('id', $id)->update($data);

        if ($result) {
            $msg = ['alert' => 'success', 'msg' => 'Berhasil Edit Data'];
        } else {
            $msg = ['alert' => 'danger', 'msg' => 'Gagal Edit Data'];
        }

        return redirect()->to('produk')->with('msg', $msg);
    }

    public function destroy($id)
    {
        $result = Produk::where('id', $id)->delete();

        if ($result) {
            $msg = ['alert' => 'success', 'msg' => 'Berhasil Delete Data'];
        } else {
            $msg = ['alert' => 'danger', 'msg' => 'Gagal Delete Data'];
        }

        return redirect()->to('produk')->with('msg', $msg);
    }
}
