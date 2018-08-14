<?php

namespace App\Http\Controllers\User;

use Auth;
use App\Payment;
use App\Subscription;
use App\PaymentMethod;
use App\SubscriptionType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user->load('subscriptions');
        $user->load('gifts');

        return view('user.user.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $lastSubscription = Subscription::where('user_id', $user->id)->orderBy('date_end', 'desc')->orderBy('created_at', 'desc')->first();

        // This part is looking if the user already have subscriptions created.
        // If yes, it catches the one with the greatest "end date, and then if its end date is greater than today.
        // If yes, the system will use the found "end date" as the starting date of the new subscription.
        // If no, the starting date will be today.
        if (!empty($lastSubscription->date_end)) {
            $actualEndDate = $lastSubscription->date_end;
        }
        $newStartDate = Carbon::now();
        if (isset($actualEndDate)){
            if($actualEndDate>Carbon::now())
            $newStartDate = Carbon::parse($actualEndDate)->addDay();
        }
        $newEndDate = Carbon::parse($newStartDate)->addYear();

        // This part is looking if the user already have subscriptions created.
        // If yes, it catches the one with the greatest "end date, and catch the subscription type.
        // This subscription type will use to set the default selection. If none found, the default value will be "individual".
        $actualSubscriptionTypeId = 3;
        if (!empty($lastSubscription->subscription_type_id)) {
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

        $lastSubscription = Subscription::where('user_id', $user->id)->orderBy('date_end', 'desc')->orderBy('created_at', 'desc')->first();

        if (!empty($lastSubscription->date_end)) {
            $actualEndDate = $lastSubscription->date_end;
        }
        $newStartDate = Carbon::now();
        if (isset($actualEndDate)){
            if($actualEndDate>Carbon::now())
            $newStartDate = Carbon::parse($actualEndDate)->addDay();
        }
        $newEndDate = Carbon::parse($newStartDate)->addYear();

        $sub = Subscription::create([
            'amount' => $subscriptionType->amount,
            'opt_out_mail' => 0,
            'date_start' => $newStartDate,//->format('d-m-Y'),
            'date_end' => $newEndDate,//->format('d-m-Y'),
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

        return view('user.user.index', ['user' => Auth::user()])->with('message', 'Abonnement Confirmé !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payments_methods = PaymentMethod::all();
        $subscription_type = SubscriptionType::all();
        $subscription = Subscription::with('payment')->findOrFail($id);

        return view('admin.subscription.edit', ['subscription' => $subscription,
            'payments_methods' => $payments_methods,
            'subscription_type' => $subscription_type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'user_id' => 'required|numeric',
            'subscription_type_id' => 'required|integer',
            'amount' => 'required|numeric',
            'payment_methods' => 'required|numeric',
            'subscription_date' => 'required|date|after_or_equal:today',
        ]);

        $validator['opt_out_mail'] = 0;
        $validator['subscription_source'] = 0;

        $subscription = Subscription::findOrFail($id);

        $subscription->update($validator);

        $validator['payment_id'] = $subscription->id;
        $validator['payment_type'] = "App\Subscription";
        $validator['payment_method_id'] = $request->payment_methods;

        $payment = Payment::where([
            ['payment_id', $subscription->id],
            ['payment_type', 'App\Subscription'],
        ]);

        $payment->update($validator);

        return back()->with('message', 'Mise a jour effectuée');
    }

    public function beforeDelete(Subscription $subscription)
    {
        return view('admin.subscription.beforedelete', ['subscription' => $subscription]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriptionToDelete = Subscription::findOrFail($id);
        $subscriptionToDelete->delete();

        return redirect()->route('admin.subscription.index')->with('message', 'Adhésion supprimée');
    }
}
