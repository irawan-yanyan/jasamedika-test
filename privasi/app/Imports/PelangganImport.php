<?php

namespace App\Imports;

use App\Pelanggan;
use Maatwebsite\Excel\Concerns\ToModel;

class PelangganImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pelanggan([
            // $row[0] ,  1,2,3...
            'id_pelanggan' => $row[1],
            'nm_pelanggan' => $row[2],
            'alamat' => $row[3],
            'telepon' => $row[4],
            'email' => $row[5]
        ]);
    }
}
