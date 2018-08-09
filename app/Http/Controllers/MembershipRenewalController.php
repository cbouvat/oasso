<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\SubscriptionType;

class membershipRenewalController extends Controller
{
    public function display()
    {
        // $ActualSubscription = Subscription::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
        $actualSubscription = Subscription::where('user_id', '9')->orderBy('created_at', 'desc')->first();
        $actualSubscriptionName = SubscriptionType::where('id', $actualSubscription->subscription_type_id)->first();
        $subscriptionTypes = SubscriptionType::all();

        return view('membershipRenewal', ['actualSubscriptionName' => $actualSubscriptionName], ['subscriptionTypes' => $subscriptionTypes]);
    }

    public function create()
    {
        // $ActualSubscription = Subscription::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();


        return view('home');
    }

}
