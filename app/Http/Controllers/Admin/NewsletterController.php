<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NewsletterController extends Controller
{
    public function index()
    {
        return view('admin.newsletters.index');
    }

    public function create(Request $request)
    {
        Newsletter::create([
            'title' => $request->title,
            'html_content' => $request->html,
            'text_content' => $request->text,
            'user_id' => Auth::user()->id,
        ]);
    }
}
