<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Subscription;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
        $months = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"];

        $type = $request->input('type');
        $dateStart = $request->input('date_start');
        $dateEnd = $request->input('date_end');

        //$datas = Subscription::whereBetween('subscription_date', [$dateStart, $dateEnd])
        //    ->orderBy('subscription_date')
          //  ->get()
          //  ->groupBy(function($date){
         //       return Carbon::parse($date->subscription_date)->format('F');
           // });
        //SELECT *, COUNT(*) FROM `subscriptions` WHERE `subscription_date` BETWEEN '1977-01-01' AND '1977-12-31' GROUP BY MONTH(subscription_date)

        $datas = DB::table('subscriptions')->select(DB::raw('count(*) as subscription_count'),
            DB::raw('MONTH(subscription_date) month'))
            ->whereBetween('subscription_date', [$dateStart, $dateEnd])
            ->groupBy('month')
            ->get();


        $dataArray = [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach ($datas as $data){
            $dataArray[$data->month -1]=$data->subscription_count;
        };


        $json = [
            "type"=> "line",
            "data"=> [
                "labels"=> $months,
            "datasets"=> [
                    [
                    "label"=> ["Nombre adhésions par mois"],
                    "data"=> $dataArray,
                    "borderColor"=> [
                        "rgba(250,0,0,1)"
                        ],
                    "backgroundColor"=>[
                        "rgba(0,0,0,0)"
                    ],
                    "borderWidth"=> 2
                    ]
                ]
          ]];


        return $json;
    }
}
