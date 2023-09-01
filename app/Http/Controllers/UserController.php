<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Returns all existing users
     */
    public function showAll()
    {
        $users = User::all();

        return view('members', ['users' => $users]);
    }

    /**
     * Searches for a specific user
     */
    public function search(Request $request)
    {
        $query = $request->query('namesearch');
        $result = User::where('name', 'LIKE', '%'.$query.'%')->get();

        return view('results', ['users' => $result]);
    }
}
