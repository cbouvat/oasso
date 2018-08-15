<?php

namespace App\Http\Controllers\User;

use Auth;
use App\User;
use App\Payment;
use Carbon\Carbon;
use App\Subscription;
use App\PaymentMethod;
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

        $lastSubscription = Subscription::where('user_id', $user->id)
            ->orderBy('date_end', 'desc')
            ->first();

        // This part is looking if the user already have subscriptions created.
        // If yes, it catches the one with the greatest "end date, and then if its end date is greater than today.
        // If yes, the system will use the found "end date" as the starting date of the new subscription.
        // If no, the starting date will be today.
        if (! empty($lastSubscription->date_end)) {
            $actualEndDate = $lastSubscription->date_end;
        }

        $newStartDate = Carbon::now();

        if (isset($actualEndDate)) {
            if ($actualEndDate > Carbon::now()) {
                $newStartDate = Carbon::parse($actualEndDate)->addDay();
            }
        }

        $newEndDate = Carbon::parse($newStartDate)->addYear();

        // This part is looking if the user already have subscriptions created.
        // If yes, it catches the one with the greatest "end date, and catch the subscription type.
        // This subscription type will use to set the default selection. If none found, the default value will be "individual".

        $actualSubscriptionTypeId = 3;

        if (! empty($lastSubscription->subscription_type_id)) {
            $actualSubscriptionTypeId = $lastSubscription->subscription_type_id;
        }

        $temp = SubscriptionType::where('id', $actualSubscriptionTypeId)->first();

        $actualSubscriptionTypeName = $temp->name;

        $subscriptionTypes = SubscriptionType::all();

        return view('user.subscription.create', [
            'user' => $user,
            'subscriptionTypes' => $subscriptionTypes,
            'startDate' => $newStartDate,
            'endDate' => $newEndDate,
            'actualSubscriptionTypeName' => $actualSubscriptionTypeName,
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

        $type = $request->input('type');

        $subscriptionType = SubscriptionType::findOrFail($type);

        $lastSubscription = Subscription::where('user_id', $user->id)
            ->orderBy('date_end', 'desc')
            ->first();

        if (! empty($lastSubscription->date_end)) {
            $actualEndDate = $lastSubscription->date_end;
        }
        $newStartDate = Carbon::now();

        if (isset($actualEndDate)) {
            if ($actualEndDate > Carbon::now()) {
                $newStartDate = Carbon::parse($actualEndDate)->addDay();
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

        $subType = SubscriptionType::where('id', $type)->first();

        return view('user.user.index', ['user' => Auth::user()])->with('message', 'Adhésion Confirmé !');
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
