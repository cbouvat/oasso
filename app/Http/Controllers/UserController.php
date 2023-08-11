<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'gender' => 'integer|max:2|nullable',
            'name' => 'required|alpha|string|max:255|min:2',
            'firstname' => 'required|alpha|string|max:45|min:2',
            'lastname' => 'required|alpha|string|max:45|min:2',
            'email' => 'string|required|email|max:255|unique:users,email,',
            'birthdate' => '|date|before:today-13years|after:today-120years',
            'address_line1' => '|string|max:32|',
            'address_line2' => '|string|max:32|nullable',
            'city' => 'required|string|max:45|',
            'zipcode' => 'digits:5|numeric',
            'phone_1' => 'numeric|nullable',
            'phone_2' => 'numeric|nullable',
            'newspaper' => 'boolean',
            'newsletter' => 'boolean',
        ]);

        return redirect()->route('index');
    }
}
