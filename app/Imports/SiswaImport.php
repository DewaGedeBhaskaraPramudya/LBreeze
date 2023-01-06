<?php

namespace App\Imports;

use App\Models\siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new siswa([
            'NIM' => $row[1],
            'Nama' => $row[2],
            'Prodi' => $row[3],
            'IPK' => $row[4]
        ]);
    }
}
