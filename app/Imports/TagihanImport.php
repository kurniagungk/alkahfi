<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class TagihanImport implements WithMappedCells, ToCollection
{
    /**
     * @param Collection $collection
     */

    public function mapping(): array
    {
        return [
            'name'  => 'B1',
            'email' => 'B2',
        ];
    }



    public function collection(Collection $collection)
    {
        //
    }
}
