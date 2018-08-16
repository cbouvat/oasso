<?php

namespace App\Http\Controllers\User;

use Auth;
use App\User;
use App\Payment;
use Carbon\Carbon;
use App\Subscription;
use App\SubscriptionType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $user->load('subscriptions');

        $newStartDate = Carbon::now();
        $actualSubscriptionTypeId = 0;

        $lastSubscription = $user->lastSubscription();

        if ($lastSubscription) {
            $actualSubscriptionTypeId = $lastSubscription->subscription_type_id;

            $lastSubscriptionDate = Carbon::parse($lastSubscription->date_end);

            if ($lastSubscriptionDate > Carbon::now()) {
                $newStartDate = $lastSubscriptionDate->addDay();
            }
        }

        $newEndDate = Carbon::parse($newStartDate)->addYear();

        $subscriptionTypes = SubscriptionType::all();

        return view('user.subscription.create', [
            'user' => $user,
            'subscriptionTypes' => $subscriptionTypes,
            'startDate' => $newStartDate,
            'endDate' => $newEndDate,
            'actualSubscriptionTypeId' => $actualSubscriptionTypeId,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $newStartDate = Carbon::now();
        $type = $request->input('type');

        $subscriptionType = SubscriptionType::findOrFail($type);

        $lastSubscription = $user->lastSubscription();

        if ($lastSubscription) {
            $lastSubscriptionDate = Carbon::parse($lastSubscription->date_end);

            if ($lastSubscriptionDate > Carbon::now()) {
                $newStartDate = $lastSubscriptionDate->addDay();
            }
        }

        $newEndDate = Carbon::parse($newStartDate)->addYear();

        $sub = Subscription::create([
            'amount' => $subscriptionType->amount,
            'opt_out_mail' => 0,
            'date_start' => $newStartDate, //->format('d-m-Y'),
            'date_end' => $newEndDate, //->format('d-m-Y'),
            'subscription_source' => 1,
            'user_id' => $user->id,
            'subscription_type_id' => $subscriptionType->id,
        ]);

        Payment::create([
            'payment_type' => 'App\Subscription',
            'payment_id' => $sub->id,
            'amount' => $sub->amount,
            'user_id' => $user->id,
            'payment_method_id' => 2,
        ]);

        return back()->with('message', 'Adhésion Confirmé !');
    }

    /**
     * @todo
     *
     * Use Hashids
     *
     * @param $subscriptionId
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function optOut($subscriptionId, $userId)
    {
        $subscription = Subscription::findOrFail($subscriptionId);
        $user = User::findOrFail($userId);

        if ($subscription->user_id === $user->id) {
            $subscription->opt_out_mail = 1;
            $subscription->save();

            return view('optOutMail');
        } else {
            return abort(403);
        }
    }
}
