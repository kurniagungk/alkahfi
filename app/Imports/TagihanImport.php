<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TagihanImport implements WithHeadingRow, ToCollection
{
    /**
     * @param Collection $collection
     */

    public function headingRow(): int
    {
        return 1;
    }



    public function collection(Collection $collection)
    {
        //
    }
}
