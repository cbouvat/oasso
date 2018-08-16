<?php

namespace App\Http\Controllers\Admin\Export;

use App\User;
use Illuminate\Http\Request;

class ExportController extends UserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = User::pluck('city', 'zipcode')->all();

        return view('admin.export.index', ['cities' => $cities]);
    }

    public function export(Request $request)
    {
        switch ($request['exportFile']) {
            case 'users':
                return app('App\Http\Controllers\Admin\Export\UserController')->export($request);
            case 'gifts':
                return app('App\Http\Controllers\Admin\Export\GiftController')->export($request);
            case 'payments':
                return app('App\Http\Controllers\Admin\Export\PaymentController')->export($request);
            case 'subscriptions':
                return app('App\Http\Controllers\Admin\Export\SubscriptionController')->export($request);
        }
    }
}
