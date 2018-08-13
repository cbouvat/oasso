<?php

namespace App\Http\Controllers;


use App\User;
use Validator;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {

    }

    public function search(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'q' => 'min:2'
        ]);

        $members = User::where('lastname', 'LIKE', '%' . $request->q . '%')
            ->orwhere('firstname', 'LIKE', '%' . $request->q . '%')
            ->paginate();
        // dd($members);
        if ($validator->fails()) {
            return view('search')
                ->withErrors($validator);
        }

        return view('admin.user.index', ['users' => $members]);
    }
}
