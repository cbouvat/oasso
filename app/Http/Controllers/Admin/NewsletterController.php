<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NewsletterController extends Controller
{
    // uncomment Middleware when login user works
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index(Request $request)
    {
        if($resquest->has('from')) {
            $newsletter = Newsletter::findOrFail($from);

        }

            $sentMessage = Newsletter::take(12)->orderBy('created_at', 'asc')->get();

        return view('admin.newsletters.index', ['sentMessage' => $sentMessage]);
    }

    public function create(Request $request)
    {
        Newsletter::create([
            'title' => $request->title,
            'html_content' => $request->html,
            'text_content' => $request->text,
            'user_id' => 1, //Auth::user()->id to write here
        ]);
    }
}
