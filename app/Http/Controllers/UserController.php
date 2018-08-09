<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\Payment;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('lastname', 'asc')->paginate(10);
        return view('admin.users.list', ['users' => $users]);
    }


    public function beforeAdhesion($id)
    {
        $user = User::findorfail($id);

        return view('admin.users.addadhesion', ['user' => $user]);
    }

    public function validatorAdhesion(Request $request, $userid)
    {
        $validator = Validator::make($request->all(), [
            'subscription_type' => 'required',
            'amount' => 'required',
            'payment_methods' => 'required',
            'subscription_date' => 'required',
            'opt_out_mail' => 'required'
        ]);

        if ($validator->fails()) {
            return view('addadhesion')
                ->withErrors($validator);
        }

        $user = User::where('id', $userid)
            ->get();

        return view('admin.users.addadhesion', ['user' => $user]);

    }

    public function createSubscription(Request $request, $userid)
    {
        $sub = Subscription::create([
            'amount' => $request['amount'],
            'opt_out_mail' => '0',
            'subscription_date' => $request['subscription_date'],
            'user_id' => $userid,
            'subscription_type' => $request['subscription_type']
        ]);

        return view('admin.users.addadhesion', ['sub' => $sub]);
    }

    public function createPayment(Request $request, $userid, $sub)
    {
        Payment::create([
            'payment_type' => 'subscription',
            'payment_id' => $sub->id,
            'amount' => $request['amount'],
            'user_id' => $userid,
            'payment_methods' => $request['payment_methods']
        ]);
    }

    public function addadhesion($validator, $user)
    {

        Subscription::create($validator, ['user_id' => $user->id]);

        return view('admin.users.addadhesion', ['user' => $user]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Admin\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Admin\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function beforeDelete($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.beforedelete', ['user' => $user]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function softDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.list');
    }
}
