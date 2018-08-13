<?php

namespace App\Http\Controllers\Admin;

use App\Gift;
use App\Http\Controllers\Controller;
use App\Payment;
use App\PaymentMethod;
use App\User;
use Auth;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    /**
     * GiftController constructor.
     */
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
        $gifts = Gift::with('user')->latest()->paginate();

        return view('admin.gift.index', ['gifts' => $gifts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $inputs = $request->validate([
            'amount' => 'required|numeric|min:0|max:999999',
            'from_user_id' => 'nullable|numeric',
            'from_me' => 'nullable|numeric',
            'payment_methods' => 'required'

        ]);

        if ($request->has('from_me')) {
            if ($request['from_me'] === Auth::user()->id) {
                $inputs['user_id'] = $request['from_me'];
            } else {
                $inputs['user_id'] = Auth::user()->id;
            }
        } elseif ($request['from_user_id'] != null) {
            if (User::find($request['from_user_id']) != null) {
                $inputs['user_id'] = $request['from_user_id'];
            } else {
                return back()->with('error_message', 'Erreur, identifiant incorrect !');
            }
        } else {
            return back()->with('error_message', 'Erreur, identifiant incorrect !');
        }

        $gift = Gift::create($inputs);

        $inputs['payment_id'] = $gift->id;
        $inputs['payment_type'] = 'App\Gift';
        $inputs['payment_method_id'] = $request->payment_methods;

        Payment::create($inputs);

        return back()->with('message', 'Le don a bien été ajouté pour ce membre !');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
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

    public function show()
    {
        $user = Auth::user();
        $user->load('gifts.payment.paymentMethod');

        $paymentsMethods = PaymentMethod::all();

        return view('admin.gift.show', ['user' => $user, 'paymentsMethods' => $paymentsMethods]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gift $gift
     * @return \Illuminate\Http\Response
     */
    public function edit(Gift $gift)
    {
        $gift->load('user');

        return view('admin.gift.edit', ['gift' => $gift]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Gift $gift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gift $gift)
    {
        $inputs = $request->validate([
            'amount' => 'required|numeric|min:0|max:999999',
        ]);

        $gift->update($inputs);

        return redirect()->route('admin.gift.index')->with('message', 'Modification confirmée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Gift $gift
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Gift $gift)
    {
        $gift->delete();

        return redirect()->route('admin.gift.index')->with('message', 'Don supprimé');
    }

    public function beforeDelete(Gift $gift)
    {
        return view('admin.giftBeforeDelete', ['gift' => $gift]);
    }
}
