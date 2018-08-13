<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsletterController extends Controller
{
    /**
     * NewsletterController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $newsletters = Newsletter::latest()->paginate(20);

        return view('admin.newsletter.index', ['newsletters' => $newsletters]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.newsletter.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $validateRequest = $request->validate([
            'title' => 'string|max:150|required',
            'html_content' => 'required',
            'text_content' => 'required'
        ]);

        $validateRequest['user_id'] = Auth::user()->id;

        Newsletter::Create($validateRequest);

        return redirect(route('admin.newsletter.index'));
    }


    /**
     * @param Newsletter $newsletter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Newsletter $newsletter)
    {
        return view('admin.newsletter.update', ['newsletter' => $newsletter]);
    }

    /**
     * @param Request $request
     * @param Newsletter $newsletter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        $validateRequest = $request->validate([
            'title' => 'string|max:150|required',
            'html_content' => 'required',
            'text_content' => 'required'
        ]);

        $validateRequest['user_id'] = Auth::user()->id;

        $newsletter->update($validateRequest);

        return redirect(route('admin.newsletter.index'));
    }

    /**
     * @param Newsletter $newsletter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function duplicate(Newsletter $newsletter)
    {
        return view('admin.newsletter.duplicate', ['newsletter' => $newsletter]);
    }

    /**
     * @param Newsletter $newsletter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function beforeDelete(Newsletter $newsletter)
    {
        return view('admin.newsletter.beforedelete', ['id' => $newsletter->id]);
    }

    /**
     * @param Newsletter $newsletter
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function delete(Newsletter $newsletter)
    {
        $newsletter->delete();

        return redirect('admin/newsletter/index');
    }
}
