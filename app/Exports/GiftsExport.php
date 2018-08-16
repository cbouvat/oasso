<?php

namespace App\Exports;

use App\Gift;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class GiftsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Gift::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Montant',
            'Identifiant membre',
            'Date de création',
            'Date de mise à jour',
        ];
    }
}
