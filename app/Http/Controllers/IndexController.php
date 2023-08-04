<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function userpage(string $id): View
    {
        return view('user.page', [
            'user' => User::findOrFail($id)
        ]);
    }
}
