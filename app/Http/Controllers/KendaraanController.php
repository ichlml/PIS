<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KendaraanController extends Controller
{
    public function index()
    {
        $data = Kendaraan::all();
        return view('kendaraan.index', compact('data'));
    }

    public function create()
    {
        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kendaraan' => 'required',
            'nopol' => 'required',
            'warna' => 'required',
            'merk' => 'required',
            'kelas' => 'required',
            'jenis' => 'required',
            'jenis_bbm' => 'required',
            'transmisi' => 'required',
        ]);

        $store = Kendaraan::create([
            'nama_kendaraan' => $request->nama_kendaraan,
            'nopol' => $request->nopol,
            'warna' => $request->warna,
            'merk' => $request->merk,
            'kelas' => $request->kelas,
            'jenis' => $request->jenis,
            'jenis_bbm' => $request->jenis_bbm,
            'transmisi' => $request->transmisi,
            'status' => 'Ok',
        ]);

        if ($store) {
            return redirect('kendaraan')->with(['message' => 'Data Kendaraan Berhasil Ditambahkan!!', 'alert-type' => 'success']);
        } else {
            return redirect('kendaraan')->with(['message' => 'Data Kendaraan Gagal Ditambahkan!!', 'alert-type' => 'error']);
        }
    }

    public function edit($id)
    {
        $data = DB::table('kendaraans')->where('id', $id)->first();

        return view('kendaraan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kendaraan' => 'required',
            'nopol' => 'required',
            'warna' => 'required',
            'merk' => 'required',
            'kelas' => 'required',
            'jenis' => 'required',
            'jenis_bbm' => 'required',
            'transmisi' => 'required',
        ]);

        $update = Kendaraan::where('id', $id)->update([
            'nama_kendaraan' => $request->nama_kendaraan,
            'nopol' => $request->nopol,
            'warna' => $request->warna,
            'merk' => $request->merk,
            'kelas' => $request->kelas,
            'jenis' => $request->jenis,
            'jenis_bbm' => $request->jenis_bbm,
            'transmisi' => $request->transmisi,
            'status' => $request->status
        ]);

        if ($update) {
            return redirect('kendaraan')->with(['message' => 'Data Kendaraan Berhasil Diubah!!', 'alert-type' => 'success']);
        } else {
            return redirect('kendaraan')->with(['message' => 'Data Kendaraan Gagal Diubah!!', 'alert-type' => 'error']);
        }
    }

    public function destroy(Request $request)
    {
        $del = Kendaraan::where('id', $request->id)->delete();
        if ($del) {
            return redirect('kendaraan')->with(['message' => 'Data Kendaraan Berhasil Dihapus!!', 'alert-type' => 'success']);
        } else {
            return redirect('pegawai')->with(['message' => 'Data Kendaraan Berhasil Dihapus!!', 'alert-type' => 'error']);
        }
    }
}
