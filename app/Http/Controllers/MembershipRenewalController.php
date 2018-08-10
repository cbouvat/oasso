<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\SubscriptionType;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class membershipRenewalController extends Controller
{
    public function display()
    {
        $actualSubscription = Subscription::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
        $actualSubscriptionName = SubscriptionType::where('id', $actualSubscription->subscription_type_id)->first();
        $subscriptionTypes = SubscriptionType::all();

        return view('membershipRenewal', ['actualSubscriptionName' => $actualSubscriptionName], ['subscriptionTypes' => $subscriptionTypes]);
    }

    public function create(Request $request)
    {
        $priceType = $request->input('subscriptionTypePrice');

        $price = explode("/", $priceType)[0];
        $type = explode("/", $priceType)[1];

        $sub = Subscription::create([
            'amount' => $price,
            'opt_out_mail' => 0,
            'subscription_date' => $request->input('subscriptionDate'),
            'subscription_source' => 1,
            'user_id' => Auth::id(),
            'subscription_type_id' => $type,
        ]);

        Payment::create([
            'payment_type' => "subscription",
            'payment_id' => $sub->id,
            'amount' => $price,
            'user_id' => Auth::id(),
            'payment_method_id' => 2,
        ]);

        $subType = SubscriptionType::where('id', $type)->first();

        return view('membershipRenewalConfirm', ['subType' => $subType], ['sub' => $sub]);
    }

}
