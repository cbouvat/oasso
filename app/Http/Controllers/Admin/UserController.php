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
        return view('admin.member.create');
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
            'lastname' => 'required|string|max:45',
            'firstname' => 'required|string|max:45',
            'birthdate' => 'required|date',
            'password' => 'string|min:6|max:191|confirmed|nullable',
            'address_line1' => 'required|string|max:100',
            'address_line2' => 'string|max:100|nullable',
            'zipcode' => 'required|string|max:20',
            'city' => 'required|string|max:45',
            'email' => 'email|unique:users|nullable',
            'gender_joint' => 'nullable|integer',
            'lastname_joint' => 'string|max:45|nullable',
            'firstname_joint' => 'string|max:45|nullable',
            'birthdate_joint' => 'date|nullable',
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
        User::create($request->all());

        return redirect()->route('admin.member.index');
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
