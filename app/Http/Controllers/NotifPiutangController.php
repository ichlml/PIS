<?php

namespace App\Http\Controllers;

use App\Imports\NotifPiutangImport;
use App\Models\NotifPiutang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class NotifPiutangController extends Controller
{
    public function index()
    {
        $data = NotifPiutang::all();
        return view('notif.piutang', compact('data'));
    }

    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = $file->hashName();
        $path = $file->storeAs('public/notifpiutang/', $nama_file);
        $import = Excel::import(new NotifPiutangImport(), storage_path('app/public/notifpiutang/' . $nama_file));

        if ($import) {
            Storage::delete($path);
            return redirect('notifPiutang/index')->with(['message' => 'Data Piutang Berhasil Ditambahkan!!', 'alert-type' => 'success']);
        } else {
            return redirect('notifPiutang/index')->with(['message' => 'Data Piutang Gagal Ditambahkan!!', 'alert-type' => 'error']);
        }
    }

    public function sendMessage($id)
    {
        $data = DB::table('notif_piutangs')->where('id', $id)->first();
        // dd($data);
        $tanggal = date('d F Y', strtotime($data->jatuh_tempo));
        $nama = $data->nama_pelanggan;
        $saldo = number_format($data->saldo_akhir, 2);
        $nohp = $data->nohp;

        // dd($nohp);
        $response = Http::post('192.168.10.3:8000/send-message', [
            'number' => "$nohp",
            'message' => "Selemat Pagi, \nPelanggan setia kami $nama \nKami dari Administrasi CV PAKIS JAYA ABADI menginformasikan kepada Bapak/Ibu perihal \nPIUTANG JATUH TEMPO \n Per Tanggal $tanggal \n Sebesar Rp. $saldo \nJika ingin mengetahui lebih rinci Piutang tersebut \nMaka kami persilahkan untuk menghubungi : \n1. Administrasi sales (Roqib) No HP : \n2. Sales Rosadi No HP :",
        ]);

        $code = $response->getStatusCode();
        $response = $response->getBody();
        $responseData = json_decode($response, true);

        // dd($responseData);
        if ($code == 200) {

            return redirect('notifPiutang/index')->with(['message' => 'Notifikasi Berhasil Dikirim!!', 'alert-type' => 'success']);
        } else {
            return redirect('notifPiutang/index')->with(['message' => 'Notifikasi Gagal Dikirim!!', 'alert-type' => 'error']);
        }
    }
}
