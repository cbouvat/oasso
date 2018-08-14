<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Genre',
            'Prenom',
            'Nom',
            'Date de naissance',
            'Adresse 1',
            'Adresse 2',
            'Code postal',
            'Ville',
            'Email',
            'Genre conjoint',
            'Prenom conjoint',
            'Nom conjoint',
            'Naissance conjoint',
            'Email conjoint',
            'Telephone 1',
            'Telephone 2',
            'Bénévole',
            'Détails bénévolat',
            'Distributeur',
            'Journal',
            'Newsletter',
            'Mailing',
            'Commentaire',
            'Alerte',
            'Date de création',
            'Date de mise à jour',
            'Date de suppression',
        ];
    }

    public function map($user): array
    {
        $users = $user->toArray();
        foreach($users as $key => $value) {
            if(is_integer($value) && ($key == 'gender' || $key == 'gender_joint')) {
                if($value === 1) {
                    $users[$key] = "Masculin";
                } elseif($value === 2) {
                    $users[$key] = "Feminin";
                }else{
                    $users[$key] = "Indéfini";
                }
            }
        }

        return $users;
    }
}
