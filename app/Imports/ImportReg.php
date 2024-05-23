<?php

namespace App\Imports;

use App\Models\crud;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportReg implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            crud::create([
                'name' => $row[0],
                'phone_no' => $row[1],
                'email' => $row[2],
                'state' => $row[3],
                'address' => $row[4],
                'created_at' => $row[5],
            ]);
        }
    }
}
