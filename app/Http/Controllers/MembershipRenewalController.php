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
        $type = $request->input('type');

        $subscriptionType = SubscriptionType::findOrFail($type);


        $sub = Subscription::create([
            'amount' => $subscriptionType->amount,
            'opt_out_mail' => 0,
            'subscription_date' => date('Y').'-12-31',
            'subscription_source' => 1,
            'user_id' => Auth::id(),
            'subscription_type_id' => $subscriptionType->id,
        ]);

        Payment::create([
            'payment_type' => "App\Subscription",
            'payment_id' => $sub->id,
            'amount' => $sub->amount,
            'user_id' => Auth::id(),
            'payment_method_id' => 2,
        ]);

        $subType = SubscriptionType::where('id', $type)->first();

        return view('membershipRenewalConfirm', ['subType' => $subType], ['sub' => $sub]);
    }

}
