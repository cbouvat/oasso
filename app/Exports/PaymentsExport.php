<?php

namespace App\Exports;

use App\Payment;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PaymentsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Payment::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Type opération',
            'Identifiant opération',
            'Montant',
            'Identifiant membre',
            'Type paiement',
            'Date de création',
            'Date de mise à jour',
        ];
    }

    public function map($payment): array
    {
        $payments = $payment->toArray();
        foreach ($payments as $key => $value) {
            if (is_string($value) && $key == 'payment_type') {
                if ($value == 'App\Subscription') {
                    $payments[$key] = 'Adhesion';
                } else {
                    $payments[$key] = 'Donnation';
                }
            }
            if (is_int($value) && $key == 'payment_method_id') {
                if ($value === 1) {
                    $payments[$key] = 'Paypal';
                } elseif ($value === 2) {
                    $payments[$key] = 'Carte de credit';
                } elseif ($value === 3) {
                    $payments[$key] = 'Especes';
                } elseif ($value === 4) {
                    $payments[$key] = 'Cheque';
                } elseif ($value === 5) {
                    $payments[$key] = 'Virement';
                }
            }
        }

        return $payments;
    }
}
