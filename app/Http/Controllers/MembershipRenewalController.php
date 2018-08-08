<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\SubscriptionType;
use Illuminate\Http\Request;
use \Auth;

class membershipRenewalController extends Controller
{
    public function display()
    {
//        $ActualSubscription = Subscription::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
        $ActualSubscription = Subscription::where('user_id','9')->orderBy('created_at', 'desc')->first();
        $ActualSubscriptionName = SubscriptionType::where('id', $ActualSubscription->subscription_type_id)->first();

        return view('membershipRenewal', ['ActualSubscriptionName' => $ActualSubscriptionName]);
    }

}
