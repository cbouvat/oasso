<?php

namespace App\Exports;

use App\Subscription;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SubscriptionsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Subscription::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Montant',
            'Stop relance',
            'Début',
            'Fin',
            'Source',
            'Identifiant membre',
            'Type',
            'Date de création',
            'Date de mise à jour',
        ];
    }

    public function map($sub): array
    {
        $subs = $sub->toArray();
        foreach ($subs as $key => $value) {
            if (is_integer($value) && $key == 'subscription_source') {
                if ($value === 0) {
                    $subs[$key] = "Agence";
                } else {
                    $subs[$key] = "Application Web";
                }
            } elseif (is_integer($value) && $key == 'subscription_type_id') {
                if ($value === 1) {
                    $subs[$key] = 'Chomeur';
                } elseif ($value === 2) {
                    $subs[$key] = 'Famille';
                } elseif ($value === 3) {
                    $subs[$key] = 'Individuel';
                } elseif ($value === 4) {
                    $subs[$key] = 'Etudiant';
                }
            }
        }

        return $subs;
    }
}
