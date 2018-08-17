<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Newsletter;
use App\Subscription;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user->load('role')
              ->load('subscriptions');
        $newletter = Newsletter::latest()->first();
        $subCount = Subscription::where('date_start', '>', Carbon::now()->subYear()
                    ->format('Y-m-d'))->get();
        $subCount = count($subCount);

        return view('home', ['user' => $user, 'newsletter' => $newletter, 'subCount' => $subCount]);
    }
}
