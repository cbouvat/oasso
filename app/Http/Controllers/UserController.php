<?php

namespace App\Http\Controllers;

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
        return view('admin.users.list', ['users' => $users]);
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
        if ($request->has(['email', 'gender', 'lastname', 'firstname', 'birthdate', 'address_line1', 'address_line2',
            'zipcode', 'city', 'phone_number_1', 'phone_number_2', 'gender_joint',
            'firstname_joint', 'lastname_joint', 'birthdate_joint', 'email_joint'])) {

            $validateData = $request->validate([
                'gender' => 'required|integer|max:2',
                'firstname' => 'required|string|max:45',
                'lastname' => 'required|string|max:45',
                'email' => 'required|string|email|max:255|unique:users',
                'birthdate' => 'required|date',
                'address_line1' => 'required|string|max:32',
                'address_line2' => 'string|max:32|nullable',
                'city' => 'required|string|max:45',
                'zipcode' => 'required|string|max:5',
                'phone_number_1' => 'string|max:10',
                'phone_number_2' => 'string|max:10|nullable',
//                'newspaper' => 'integer',
//                'newsletter' => 'integer',
                'gender_joint' => 'integer|max:2|nullable',
                'firstname_joint' => 'string|max:45|nullable',
                'lastname_joint' => 'string|max:45|nullable',
                'birthdate_joint' => 'date|nullable',
                'email_joint' => 'email|max:255|nullable'
            ]);

            Auth::user()->update($validateData);
        }
        return redirect()->route('front.user.update');
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
