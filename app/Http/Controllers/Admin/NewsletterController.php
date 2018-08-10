<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class NewsletterController
 * @package App\Http\Controllers\Admin
 */
class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $newsletters = Newsletter::orderBy('created_at', 'desc')->paginate(12);

        return view('admin.newsletters.index', ['newsletters' => $newsletters]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.newsletters.create');
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

        return redirect(route('admin.newsletters.index'));
    }



    public function edit(Newsletter $newsletter)
    {

        return view('admin.newsletters.update', ['newsletter' => $newsletter]);
    }

    /**
     * @param $id
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

        return redirect(route('admin.newsletters.index'));
    }

    public function duplicate($id)
    {
        $newsletter = Newsletter::findOrFail($id);

        return view('admin.newsletters.duplicate', ['newsletter' => $newsletter]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function beforeDelete($id)
    {
        $newsletterId = Newsletter::findOrFail($id);

        return view('admin.newsletters.beforedelete', ['id' => $newsletterId->id]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function delete($id)
    {

        $newsletter = Newsletter::findOrfail($id);
        $newsletter->delete();

        return redirect('admin/newsletters/index');
    }
}
