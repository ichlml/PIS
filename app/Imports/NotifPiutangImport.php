<?php

namespace App\Imports;

use App\Models\NotifPiutang;
use Maatwebsite\Excel\Concerns\ToModel;

class NotifPiutangImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new NotifPiutang([
            //
            'nama_pelanggan' => $row[1],
            'nohp' => $row[2],
            'saldo_akhir' => $row[3],
            'status' => $row[4],
        ]);
    }
}
