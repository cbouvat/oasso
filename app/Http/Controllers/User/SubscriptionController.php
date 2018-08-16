<?php

namespace App\Http\Controllers\User;

use PDF;
use Auth;
use App\User;
use App\Payment;
use App\Subscription;
use App\PaymentMethod;
use App\SubscriptionType;
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
        $subscriptionTypes = SubscriptionType::all();

        return view('user.subscription.create', [
            'user' => $user,
            'subscriptionTypes' => $subscriptionTypes,
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

        return view('user.user.index', ['user' => Auth::user()]);
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

    /**
     * @todo
     *
     * Use Hashids
     *
     **/
    public function optout($subId, $userId)
    {
        $subscription = Subscription::findOrFail($subId);
        $user = User::findOrFail($userId);

        if ($subscription->user_id === $user->id) {
            $subscription->opt_out_mail = 1;
            $subscription->save();

            return view('user.subscription.optout');
        } else {
            return abort(404);
        }
    }

    public function generatePdf()
    {
        $user = Auth::user();
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('/user/subscription/subscriptionPdf', compact('user'));
        $name = 'Adhésion_'.$user->firstname.'_'.$user->lastname.'.pdf';

        return $pdf->stream($name);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $subscriptionToDelete = Subscription::findOrFail($id);
        $subscriptionToDelete->delete();

        return redirect()->route('admin.subscription.index')->with('message', 'Adhésion supprimée');
    }
}
