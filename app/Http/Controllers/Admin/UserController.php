<?php

namespace App\Http\Controllers\Admin;

use App\Mail\PasswordSending;
use App\Mail\SendPwdByEmail;
use App\Mail\SendPwdByPhone;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $inputs = $request->validate([
            'gender' => 'required|integer',
            'lastname' => 'required|alpha|string|max:45|min:2',
            'firstname' => 'required|alpha|string|max:45|min:2',
            'birthdate' => 'required|date|before:today-13years|after:today-120years',
            'address_line1' => 'required|string|max:32',
            'address_line2' => 'string|max:32|nullable',
            'zipcode' => 'required|string|max:20 |regex:/^\d{5}(?:[-\s]\d{4})?$/',
            'city' => 'required|string|alpha|max:45 |min:2',
            'email' => 'email|max:255|unique:users|nullable',
            'gender_joint' => 'nullable|integer',
            'lastname_joint' => 'string |max:45|min:2|alpha|nullable',
            'firstname_joint' => 'string|max:45|min:2|alpha||nullable',
            'birthdate_joint' => 'date|before:today-13years|after:today-120years|nullable',
            'email_joint' => 'email|max:255|nullable',
            'phone_1' => 'string|digits:10|nullable',
            'phone_2' => 'string|digits:10|nullable',
            'volonteer' => 'integer|nullable',
            'details_volonteer' => 'string|max:600|nullable',
            'delivery' => 'integer|nullable',
            'newspaper' => 'integer|nullable',
            'newsletter' => 'integer|nullable',
            'mailing' => 'integer|nullable',
            'comment' => 'string|nullable',
            'alert' => 'integer|nullable',
        ]);

        $str_random = str_random(8);
        $inputs['password'] = Hash::make($str_random);

        $user = User::create($inputs);

        if ($inputs['email']) {
            if ($request['sendPwdByEmail']) {

                Mail::to($user)->send(new PasswordSending($user, $str_random));
            }
        }


        return redirect()->route('admin.user.index');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
