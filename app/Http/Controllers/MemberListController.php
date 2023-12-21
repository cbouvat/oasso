<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\View\View ;

class MemberListController extends Controller
{
    /**
     * Display a list of all User
     */
    public function index(): View
    {
        $User = User::all();
        return view('members', ['users' => $User]);
    }
}
