<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
        $months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];

        $type = $request->input('type');
        $dateStart = $request->input('date_start');
        $dateEnd = $request->input('date_end');

        $dataArray = [];

        switch ($type) {
            case 'general':
                $chartTitle = "Nombre d'adhésions";
                $chartType = "line";

                $datas = DB::table('subscriptions')->select(DB::raw('count(*) as subscription_count'),
                    DB::raw('MONTH(subscription_date) as month'))
                    ->whereBetween('subscription_date', [$dateStart, $dateEnd])
                    ->groupBy('month')
                    ->get();

                $dataArray = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                foreach ($datas as $data) {
                    $dataArray[$data->month - 1] = $data->subscription_count;
                };

                $chartData = [
                    "labels" => $months,
                    "datasets" => [
                        [
                            "label" => [$chartTitle],
                            "data" => $dataArray,
                            "borderColor" => [
                                "rgba(250,0,0,1)"
                            ],
                            "backgroundColor" => [
                                "rgba(0,0,0,0)"
                            ],
                            "borderWidth" => 2
                        ]
                    ]
                ];
                break;
            case 'subscriptions':
                $chartType = "pie";
                $chartTitle = "Adhésion par type";

                $datas = DB::table('subscriptions')->select(DB::raw('count(*) as subscriptionType_count'))
                    ->whereBetween('subscription_date', [$dateStart, $dateEnd])
                    ->groupBy('subscription_type_id')
                    ->get();

                foreach ($datas as $key => $data) {
                    $dataArray[$key] = $data->subscriptionType_count;
                }

                $chartData = [
                    "labels" => [
                        'Sans emploi',
                        'Famille',
                        'Individuel',
                        'Etudiant'
                    ],
                    "datasets" => [
                        [
                            "label" => $chartTitle,
                            "data" => $dataArray,
                            "backgroundColor" => [
                                "#FF6384",
                                "#36A2EB",
                                "#FFCE56",
                                "#69D76B"
                            ],
                        ]
                    ]
                ];

                break;
            case 'cities':
                $chartType = "pie";
                $chartTitle = "Adhérents par villes";

                $cities = [];
                $datas = DB::table('subscriptions')
                    ->join('users', 'user_id', '=', 'users.id')
                    ->whereBetween('subscription_date', [$dateStart, $dateEnd])
                    ->select(DB::raw('count(*) as subscribersByCity_count'), DB::raw('users.city as city'))
                    ->groupBy('users.city')
                    ->get();

                foreach ($datas as $key => $data) {
                    $dataArray[$key] = $data->subscribersByCity_count;
                    $cities[$key] = $data->city;
                }

                $chartData = [
                    "labels" => $cities,
                    "datasets" => [
                        [
                            "data" => $dataArray,
                            "backgroundColor" => [
                                "#FF6384",
                                "#36A2EB",
                                "#FFCE56",
                                "#69D76B"
                            ],
                        ]
                    ]
                ];
                break;
            case 'receipts':
                $chartType = "doughnut";
                $chartTitle = "Répartition des recettes";

                /*$datas = DB::table('subscriptions')
                    ->whereBetween('subscription_date', [$dateStart, $dateEnd])
                    ->select(DB::raw('sum(amount) as amountSum'))
                    ->get();*/

                $datasSubs = DB::table('payments')
                    ->where('payment_type', '=', 'App\Subscription')
                    ->join('subscriptions', 'payment_id', '=', 'subscriptions.id')
                    ->select(DB::raw('sum(payments.amount) as amountSum'))
                    ->whereBetween('subscriptions.subscription_date', [$dateStart, $dateEnd])
                    ->get();

                $datasGifts = DB::table('payments')
                    ->where('payment_type', '=', 'App\Gift')
                    ->join('gifts', 'payment_id', '=', 'gifts.id')
                    ->select(DB::raw('sum(payments.amount) as amountSum'))
                    ->whereBetween('gifts.created_at', [$dateStart, $dateEnd])
                    ->get();


                $dataArray = [$datasSubs->get(0)->amountSum, $datasGifts->get(0)->amountSum];

                $chartData = [
                    "labels" => [
                        'Adhésions',
                        'Dons'
                    ],
                    "datasets" => [
                        [
                            "data" => $dataArray,
                            "backgroundColor" => [
                                "#FF6384",
                                "#36A2EB",
                                "#FFCE56",
                                "#69D76B"
                            ],
                        ]
                    ]
                ];
                break;
            default :
                return response()->json(['message' => 'Not Found !'], 404);
        }

        $json = [
            "type" => $chartType,
            "data" => $chartData
        ];


        return $json;
    }
}
