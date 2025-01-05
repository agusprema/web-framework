<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPendidikan;
use Illuminate\Http\Request;
use App\Models\jenjang;

class riwayatPendidikanController extends Controller
{
    private $message = [
        'required'      => 'Input :attribute harus diisi.',
        'unique'        => 'Data :attribute sudah digunakan.',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index($mhs_id)
    {
        $data = RiwayatPendidikan::where('mahasiswa_id', $mhs_id)->get();

        return view('riwayat-pendidikan/index', [
            'data' => $data,
            'mhs_id' => $mhs_id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($mhs_id)
    {
        $dataJenjang = jenjang::get();

        return view('riwayat-pendidikan/create', [
            'dataJenjang' => $dataJenjang,
            'mhs_id' => $mhs_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $mhs_id)
    {
        $request->validate([
            'jenjang'               => ['required'],
            'nama_sekolah'          => ['required'],
            'alamat'                => ['required'],
            'tahun_masuk'           => ['required'],
            'tahun_lulus'           => ['required']
        ], $this->message);

        $data = [
            'jenjang'       => $request->jenjang,
            'nama_sekolah'  => $request->nama_sekolah,
            'alamat'        => $request->alamat,
            'tahun_masuk'   => $request->tahun_masuk,
            'tahun_lulus'   => $request->tahun_lulus,
            'mahasiswa_id'     => $mhs_id
        ];

        $result = RiwayatPendidikan::insert($data);

        if ($result) {
            $msg = ['alert' => 'success', 'msg' => 'Berhasil Tambah Data'];
        } else {
            $msg = ['alert' => 'danger', 'msg' => 'Gagal Tambah Data'];
        }

        return redirect()->to('riwayat-pendidikan/'. $mhs_id)->with('msg', $msg);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RiwayatPendidikan $riwayatPendidikan, $mhs_id, $id)
    {
        $dataJenjang = jenjang::get();
        $data = $riwayatPendidikan::where('id', $id)->first();

        return view('riwayat-pendidikan/edit', [
            'dataJenjang' => $dataJenjang,
            'mhs_id' => $mhs_id,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $mhs_id, $id)
    {
        $request->validate([
            'jenjang'               => ['required'],
            'nama_sekolah'          => ['required'],
            'alamat'                => ['required'],
            'tahun_masuk'           => ['required'],
            'tahun_lulus'           => ['required']
        ], $this->message);

        $data = [
            'jenjang'       => $request->jenjang,
            'nama_sekolah'  => $request->nama_sekolah,
            'alamat'        => $request->alamat,
            'tahun_masuk'   => $request->tahun_masuk,
            'tahun_lulus'   => $request->tahun_lulus
        ];

        $result = RiwayatPendidikan::where('id', $id)->update($data);

        if ($result) {
            $msg = ['alert' => 'success', 'msg' => 'Berhasil Edit Data'];
        } else {
            $msg = ['alert' => 'danger', 'msg' => 'Gagal Edit Data'];
        }

        return redirect()->to('riwayat-pendidikan/'. $mhs_id)->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($mhs_id, $id)
    {
        $result = RiwayatPendidikan::where('id', $id)->delete();

        if ($result) {
            $msg = ['alert' => 'success', 'msg' => 'Berhasil Delete Data'];
        } else {
            $msg = ['alert' => 'danger', 'msg' => 'Gagal Delete Data'];
        }

        return redirect()->to('riwayat-pendidikan/'. $mhs_id)->with('msg', $msg);
    }
}
