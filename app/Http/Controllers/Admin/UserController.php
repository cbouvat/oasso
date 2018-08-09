<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    /*    public function __construct()
        {
            $this->middleware('auth');
        }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'gender' => 'required|integer',
            'lastname' => array(
                'required',
                'string',
                'max:45',
                'regex:/^([a-zA-Z]{2,30}\s*)+/'),
            'firstname' => array(
                'required',
                'string',
                'max:45',
                'regex:/^([a-zA-Z]{2,30}\s*)+/'),
            'birthdate' => 'required|date|before:today-13years|after:today-120years',
            'password' => 'string|min:6|max:191',
            'address_line1' => 'required|string|max:32',
            'address_line2' => 'string|max:32|nullable',
            'zipcode' => array(
                'required',
                'string',
                'max:20',
                'regex:/^\d{5}(?:[-\s]\d{4})?$/'),
            'city' => array(
                'required',
                'string',
                'max:45',
                'regex:/^([a-zA-Z]{2,})/'),
            'email' => 'email|unique:users|nullable',
            'gender_joint' => 'nullable|integer',
            'lastname_joint' => array(
                'string',
                'max:45',
                'regex:/^([a-zA-Z]{2,30}\s*)+/',
                'nullable'),
            'firstname_joint' => array(
                'string',
                'max:45',
                'regex:/^([a-zA-Z]{2,30}\s*)+/',
                'nullable'),
            'birthdate_joint'=> 'date|before:today-13years|after:today-120years|nullable',
            'email_joint' => 'email|max:45|nullable',
            'phone_number_1' => 'string|max:20|nullable',
            'phone_number_2' => 'string|max:20|nullable',
            'volonteer' => 'integer|nullable',
            'details_volonteer' => 'string|max:600|nullable',
            'delivery' => 'integer|nullable',
            'newspaper' => 'integer|nullable',
            'newsletter' => 'integer|nullable',
            'mailing' => 'integer|nullable',
            'comment' => 'string|nullable',
            'alert' => 'integer|nullable',
        ]);

        $password = str_random(40);
        $request['password'] = $password;

        User::create([
            'gender' => $request['gender'],
            'lastname' => $request['lastname'],
            'firstname' => $request['firstname'],
            'birthdate' => $request['birthdate'],
            'password' => $request['password'],
            'address_line1' => $request['address_line1'],
            'address_line2' => $request['address_line2'],
            'zipcode' => $request['zipcode'],
            'city' => $request['city'],
            'email' => $request['email'],
            'gender_joint' => $request['gender_joint'],
            'lastname_joint' => $request['lastname_joint'],
            'firstname_joint' => $request['firstname_joint'],
            'birthdate_joint' => $request['birthdate_joint'],
            'email_joint' => $request['email_joint'],
            'phone_number_1' => $request['phone_number_1'],
            'phone_number_2' => $request['phone_number_2'],
            'volonteer' => $request['volonteer'],
            'details_volonteer' => $request['details_volonteer'],
            'delivery' => $request['delivery'],
            'newspaper' => $request['newspaper'],
            'newsletter' => $request['newsletter'],
            'mailing' => $request['mailing'],
            'comment' => $request['comment'],
            'alert' => $request['alert'],
        ]);

        return redirect()->route('admin.users.list');
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
