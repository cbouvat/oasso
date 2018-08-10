<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Payment;
use App\PaymentMethod;
use App\Subscription;
use App\SubscriptionType;
use App\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::with('subscriptionType')
            ->with('user')
            ->with('payment.paymentMethod')
            ->orderBy('subscription_date', 'desc')
            ->paginate();


        return view('admin.subscription.index', ['subscriptions' => $subscriptions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $payments_methods = PaymentMethod::all();
        $subscription_type = SubscriptionType::all();

        return view('admin.subscription.create', [
            'payments_methods' => $payments_methods,
            'subscription_types' => $subscription_type
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

        $validator = $request->validate([
            'user_id' => 'required|numeric',
            'subscription_type_id' => 'required|integer',
            'amount' => 'required|numeric',
            'payment_methods' => 'required|numeric',
            'subscription_date' => 'required|date|after_or_equal:today'
        ]);


        $validator['opt_out_mail'] = 0;
        $validator['subscription_source'] = 0;

        $subscription = Subscription::create($validator);

        $validator['payment_id'] = $subscription->id;
        $validator['payment_type'] = "App\Subscription";
        $validator['payment_method_id'] = $request->payment_methods;

        Payment::create($validator);


        return redirect()->route('admin.subscription.index');

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
            'subscription_type' => $subscription_type
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
            'subscription_date' => 'required|date|after_or_equal:today'
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
            ['payment_type', 'App\Subscription']
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
