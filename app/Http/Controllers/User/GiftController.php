<?php

namespace App\Http\Controllers\User;

use App\Gift;
use App\Http\Controllers\Controller;
use App\Payment;
use App\PaymentMethod;
use Auth;
use Illuminate\Http\Request;


class GiftController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user->load('gifts.payment.paymentMethod');

        $payments_methods = PaymentMethod::all();

        return view('users.gift', ['user' => $user, 'payments_methods' => $payments_methods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $inputs = $request->validate([
            'amount' => 'required|numeric',
            'payment_methods' => 'required'
        ]);

        $inputs['user_id'] = Auth::user()->id;

        $gift = Gift::create($inputs);

        $inputs['payment_id'] = $gift->id;
        $inputs['payment_type'] = "App\gift";
        $inputs['payment_method_id'] = $request->payment_methods;

        Payment::create($inputs);

        return back()->with('message', 'Le don a bien été ajouté pour ce membre !');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }
}
