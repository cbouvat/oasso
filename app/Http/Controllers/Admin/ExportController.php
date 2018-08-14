<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\SubscriptionType;
use App\Exports\GiftsExport;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Exports\PaymentsExport;
use App\Exports\SubscriptionsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subTypes = SubscriptionType::all();

        $cities = User::pluck('city', 'zipcode')->all();

        return view('admin.export.index', ['subTypes' => $subTypes, 'cities' => $cities]);
    }

    public function export(Request $request)
    {
        $validate = $request->validate([
            'exportFile' => 'required',
            'exportFormat' => 'required',
            'state' => 'string|nullable',
            'type' => 'integer|nullable',
            'startDate' => 'date|before:today-13years|after:today-120years|nullable',
            'endDate' => 'date|before:today-13years|after:today-120years|nullable',
            'volonteer' => 'integer|nullable',
            'delivery' => 'integer|nullable',
            'newspaper' => 'integer|nullable',
            'newsletter' => 'integer|nullable',
            'city' => 'string|nullable',
            'ageOperator' => 'string|nullable',
            'ageNumber' => 'integer|nullable',
            'phone' => 'string|nullable',
            'gift' => 'integer|nullable',
            'gender' => 'integer|nullable',
        ]);

        //Get extension for file
        $extension = $validate['exportFile'].'.'.$validate['exportFormat'];

        //Build $settings for Query Builder in UsersExport

        switch ($validate['exportFile']) {
            case 'users':
                return (new UsersExport($validate))->download($extension);
            case 'gifts':
                return Excel::download(new GiftsExport, $extension);
            case 'payments':
                return Excel::download(new PaymentsExport, $extension);
            case 'subscriptions':
                return Excel::download(new SubscriptionsExport, $extension);
        }
    }
}
