<?php

namespace App\Exports;

use App\Pelanggan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PelangganExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pelanggan::all();
    }
}
