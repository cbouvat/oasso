<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->input('type');
        $dateStart = $request->input('date_start');
        $dateEnd = $request->input('date_end');
        $range = $request->input('range');

        switch ($type) {
            case 'general':
                $chartTitle = "Nombre d'adhésions";
                $chartType = "line";

                $dataRange=[];
                switch ($range) {
                    case 'days':
                        $datas = DB::table('subscriptions')->select(DB::raw('count(*) as subscription_count'),
                            DB::raw('CONCAT(YEAR(subscription_date), \'-\', MONTH(subscription_date), \'-\', DAY(subscription_date)) as date'))
                            ->whereBetween('subscription_date', [$dateStart, $dateEnd])
                            ->orderBy('subscription_date')
                            ->groupBy('date')
                            ->get();

                        $tableDate = [];
                        $dateStartCarb = Carbon::parse($dateStart);
                        $dateEndCarb = Carbon::parse($dateEnd);

                        for ($dateStartCarb; $dateStartCarb <= $dateEndCarb; $dateStartCarb->addDay()) {
                            $tableDate[$dateStartCarb->format('Y-n-j')] = 0;
                            array_push($dataRange, $dateStartCarb->toDateString());
                        }
                        break;

                    case 'months':
                        $datas = DB::table('subscriptions')->select(DB::raw('count(*) as subscription_count'),
                            DB::raw('CONCAT(YEAR(subscription_date), \'-\', MONTH(subscription_date), \'-1\') as date'))
                            ->whereBetween('subscription_date', [$dateStart, $dateEnd])
                            ->orderBy('subscription_date')
                            ->groupBy('date')
                            ->get();

                        $tableDate = [];
                        $dateStartCarb = Carbon::parse($dateStart);
                        $dateEndCarb = Carbon::parse($dateEnd);

                        for ($dateStartCarb; $dateStartCarb <= $dateEndCarb; $dateStartCarb->addMonth()) {
                            $tableDate[$dateStartCarb->format('Y-n-1')] = 0;
                            array_push($dataRange, $dateStartCarb->format('F-y'));
                        }
                        break;

                    case 'years':
                        $datas = DB::table('subscriptions')->select(DB::raw('count(*) as subscription_count'),
                            DB::raw('CONCAT(YEAR(subscription_date), \'-1-1\') as date'))
                            ->whereBetween('subscription_date', [$dateStart, $dateEnd])
                            ->orderBy('subscription_date')
                            ->groupBy('date')
                            ->get();

                        $tableDate = [];
                        $dateStartCarb = Carbon::parse($dateStart);
                        $dateEndCarb = Carbon::parse($dateEnd);

                        for ($dateStartCarb; $dateStartCarb <= $dateEndCarb; $dateStartCarb->addYear()) {
                            $tableDate[$dateStartCarb->format('Y-1-1')] = 0;
                            array_push($dataRange, $dateStartCarb->format('Y'));
                        }
                        break;
                    default:
                        return response()->json(['message' => 'Not Found !'], 404);
                }

                foreach ($datas as $data) {
                    $tableDate[$data->date] = $data->subscription_count;
                };

                $dataFinals = array_values($tableDate);


                $chartData = [
                    "labels" => $dataRange,
                    "datasets" => [
                        [
                            "label" => [$chartTitle],
                            "data" => $dataFinals,
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
                $chartTitle = "Adhésions par type";

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
                $chartType = "line";
                $chartTitle = ["Adhésions", "Dons"];

                /*$datasSubs = DB::table('payments')
                    ->where('payment_type', '=', 'App\Subscription')
                    ->join('subscriptions', 'payment_id', '=', 'subscriptions.id')
                    ->select(DB::raw('sum(payments.amount) as amountSum'), DB::raw('MONTH(subscription_date) as month'))
                    ->whereBetween('subscriptions.subscription_date', [$dateStart, $dateEnd])
                    ->groupBy('month')
                    ->get();

                $datasGifts = DB::table('payments')
                    ->where('payment_type', '=', 'App\Gift')
                    ->join('gifts', 'payment_id', '=', 'gifts.id')
                    ->select(DB::raw('sum(payments.amount) as amountSum'), DB::raw('MONTH(gifts.created_at) as month'))
                    ->whereBetween('gifts.created_at', [$dateStart, $dateEnd])
                    ->groupBy('month')
                    ->get();

                $dataArray1 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                foreach ($datasSubs as $data) {
                    $dataArray1[$data->month - 1] = (int)$data->amountSum;
                };

                $dataArray2 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                foreach ($datasGifts as $data) {
                    $dataArray2[$data->month - 1] = (int)$data->amountSum;
                };*/
                $dataRange=[];
                switch ($range) {
                    case 'days':
                        $datas = DB::table('subscriptions')->select(DB::raw('count(*) as subscription_count'),
                            DB::raw('CONCAT(YEAR(subscription_date), \'-\', MONTH(subscription_date), \'-\', DAY(subscription_date)) as date'))
                            ->whereBetween('subscription_date', [$dateStart, $dateEnd])
                            ->orderBy('subscription_date')
                            ->groupBy('date')
                            ->get();

                        $tableDate = [];
                        $dateStartCarb = Carbon::parse($dateStart);
                        $dateEndCarb = Carbon::parse($dateEnd);

                        for ($dateStartCarb; $dateStartCarb <= $dateEndCarb; $dateStartCarb->addDay()) {
                            $tableDate[$dateStartCarb->format('Y-n-j')] = 0;
                            array_push($dataRange, $dateStartCarb->toDateString());
                        }
                        break;

                    case 'months':
                        $datas = DB::table('subscriptions')->select(DB::raw('count(*) as subscription_count'),
                            DB::raw('CONCAT(YEAR(subscription_date), \'-\', MONTH(subscription_date), \'-1\') as date'))
                            ->whereBetween('subscription_date', [$dateStart, $dateEnd])
                            ->orderBy('subscription_date')
                            ->groupBy('date')
                            ->get();

                        $tableDate = [];
                        $dateStartCarb = Carbon::parse($dateStart);
                        $dateEndCarb = Carbon::parse($dateEnd);

                        for ($dateStartCarb; $dateStartCarb <= $dateEndCarb; $dateStartCarb->addMonth()) {
                            $tableDate[$dateStartCarb->format('Y-n-1')] = 0;
                            array_push($dataRange, $dateStartCarb->format('F-y'));
                        }
                        break;

                    case 'years':
                        $datas = DB::table('subscriptions')->select(DB::raw('count(*) as subscription_count'),
                            DB::raw('CONCAT(YEAR(subscription_date), \'-1-1\') as date'))
                            ->whereBetween('subscription_date', [$dateStart, $dateEnd])
                            ->orderBy('subscription_date')
                            ->groupBy('date')
                            ->get();

                        $tableDate = [];
                        $dateStartCarb = Carbon::parse($dateStart);
                        $dateEndCarb = Carbon::parse($dateEnd);

                        for ($dateStartCarb; $dateStartCarb <= $dateEndCarb; $dateStartCarb->addYear()) {
                            $tableDate[$dateStartCarb->format('Y-1-1')] = 0;
                            array_push($dataRange, $dateStartCarb->format('Y'));
                        }
                        break;
                    default:
                        return response()->json(['message' => 'Not Found !'], 404);
                }

                foreach ($datas as $data) {
                    $tableDate[$data->date] = $data->subscription_count;
                };

                $dataFinals = array_values($tableDate);


                /*$chartData = [
                    "labels" => $dataRange,
                    "datasets" => [
                        [
                            "label" => [$chartTitle],
                            "data" => $dataFinals,
                            "borderColor" => [
                                "rgba(250,0,0,1)"
                            ],
                            "backgroundColor" => [
                                "rgba(0,0,0,0)"
                            ],
                            "borderWidth" => 2

                        ]
                    ]
                ];*/

                $chartData = [
                    "labels" => $dataRange,
                    "datasets" => [
                        [
                            "label" => [$chartTitle[0]],
                            "data" => $dataFinals1,
                            "borderColor" => [
                                "rgba(250,0,0,1)"
                            ],
                            "backgroundColor" => [
                                "rgba(0,0,0,0)"
                            ],
                            "borderWidth" => 2

                        ],
                        [
                            "label" => [$chartTitle[1]],
                            "data" => $dataFinals2,
                            "borderColor" => [
                                "rgba(0,250,0,1)"
                            ],
                            "backgroundColor" => [
                                "rgba(0,0,0,0)"
                            ],
                            "borderWidth" => 2

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
