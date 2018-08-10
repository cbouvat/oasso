<?php

namespace App\Http\Controllers;

use App\Gift;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

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

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param User $user
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

        $user = Auth::user();

        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $authUser = Auth::user();
        $validateData = $request->validate([
            'gender' => 'integer|max:2|nullable',
            'firstname' => 'required|alpha|string|max:45|min:2',
            'lastname' => 'required|alpha|string|max:45|min:2',
            'email' => 'string|required|email|max:255|unique:users,email,' . $authUser->id,
            'birthdate' => '|date|before:today-13years|after:today-120years',
            'address_line1' => 'string|max:32|',
            'address_line2' => 'string|max:32|nullable',
            'city' => 'required|alpha|string|max:45|',
            'zipcode' => '|string|max:20 |regex:/^\d{5}(?:[-\s]\d{4})?$/',
            'phone_number_1' => 'string|numeric|nullable',
            'phone_number_2' => 'string|numeric|nullable',
            'newspaper' => '',
            'newsletter' => '',
            'gender_joint' => 'max:2|nullable',
            'firstname_joint' => 'alpha|max:45|nullable',
            'lastname_joint' => 'alpha|max:45|nullable',
            'birthdate_joint' => 'date|before:today-13years|after:today-120years|nullable',
            'email_joint' => 'email|max:45|nullable',
        ]);


        if ($request['newspaper'] == "on") {
            $validateData['newspaper'] = 1;

        } else {
            $validateData['newspaper'] = 0;
        }
        if ($request['newsletter'] == "on") {
            $validateData['newsletter'] = 1;

        } else {
            $validateData['newsletter'] = 0;
        }

        $authUser->update($validateData);
        return redirect()->route('user.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy()
    {
        //
    }

    /**>
     * Insert into Database Gift from a member
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function give(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'amount' => 'required|numeric'
        ]);
        $inputs = $request->all();
        $inputs['user_id'] = $user->id;

        Gift::create($inputs);
        return back()->with('message', 'Votre don a bien été accepté, merci de votre générosité !');

    }

    public function gift()
    {
        $user = Auth::user();
        $user->load(['gifts' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);
        $user->load('role');

        return view('users.gift', ['user' => $user]);
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
     * @throws
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
