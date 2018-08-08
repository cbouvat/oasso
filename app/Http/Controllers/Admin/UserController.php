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
            'gender' => 'int|max:1',
            'lastname' => 'string|max:45',
            'firstname' => 'string|max:45',
            'birthdate' => 'date|before:today-13years|after:today-120years',
            'password' => 'min:6|max:191',
            'address_line1' => 'string|max:32',
            'address_line2' => 'string|max:32',
            'zip_code' => 'string|max:5',
            'city' => 'string|max:45',
            'email' => 'email|max:255|unique:users',
            'lastname_joint' => 'string|max:45',
            'firstname_joint' => 'string|max:45',
            'birthdate_joint' => 'date|before:today-18years|after:today-120years',
            'email_joint' => 'string|email|max:45',
            'phone_number_1' => 'string|max:20',
            'phone_number_2' => 'string|max:20',
            'volonteer' => 'boolean|max:1',
            'details_volonteer' => 'string',
            'delivery' => 'integer',
            'newspaper' => 'integer',
            'newsletter' => 'integer',
            'mailing' => 'integer',
            'comment' => 'string',
            'alert' => 'integer',
        ]);

/*        User::create($request->all());*/

        $user = new User($request);
        $user->save;
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
