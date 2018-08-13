<?php

namespace App\Http\Controllers;

use App\Gift;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.users.index', ['users' => $users]);
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
     * @param User $user
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
    public function edit()
    {

        $user = Auth::user();

        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Admin\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $authUser = Auth::user();
        $validateData = $this->$request->validate([
            'gender' => 'integer|max:2|nullable',
            'firstname' => 'string|max:45|nullable',
            'lastname' => 'string|max:45|nullable',
            'email' => 'string|email|max:255|unique:users,email,' . $authUser->id,
            'birthdate' => 'date|nullable',
            'address_line1' => 'string|max:32|nullable',
            'address_line2' => 'string|max:32|nullable',
            'city' => 'string|max:45|nullable',
            'zipcode' => 'string|max:5|nullable',
            'phone_number_1' => 'string|max:10|nullable',
            'phone_number_2' => 'string|max:10|nullable',
            'newspaper' => '',
            'newsletter' => '',
            'gender_joint' => 'max:2|nullable',
            'firstname_joint' => 'max:45|nullable',
            'lastname_joint' => 'max:45|nullable',
            'birthdate_joint' => 'date|nullable',
            'email_joint' => 'email|max:255|nullable'
        ]);

        if ($request['newspaper'] == "on") {
            $validateData['newspaper'] = "1";

        } else {
            $validateData['newspaper'] = "0";
        }
        if ($request['newsletter'] == "on") {
            $validateData['newsletter'] = "1";

        } else {
            $validateData['newsletter'] = "0";
        }

        $authUser->update($validateData);
        $authUser->save();
//        return view('user.edit',['authUser' => $authUser, 'user' => $authUser]);
        return redirect()->route('user.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

    /**>
     * Insert into Database Gift from a member
     * @param User $user
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

        return view('admin.user.beforedelete', ['user' => $user]);
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

        return redirect()->route('admin.user.index');
    }

}
