<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.statistics.general');
    }

    public function subscription()
    {
        return view('admin.statistics.subscriptions');
    }

    public function city()
    {
        return view('admin.statistics.cities');
    }

    public function receipt()
    {
        return view('admin.statistics.receipts');
    }
}
