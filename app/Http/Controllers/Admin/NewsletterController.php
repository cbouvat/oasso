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
    public function index(Request $request)
    {
//        if($resquest->has('from')) {
//            $newsletter = Newsletter::findOrFail($from);    // for later.
//        }

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
        Newsletter::Create(
            [
                'title' => $request->newsletterTitle,
                'html_content' => $request->htmlContent,
                'text_content' => $request->textContent,
                'user_id' => Auth::user()->id,
            ]);

        return redirect(route('admin.newsletters.index'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeUpdate(Request $request, $id)
    {
        Newsletter::findOrFail($id)->update(
            [
                'title' => $request->newsletterTitle,
                'html_content' => $request->htmlContent,
                'text_content' => $request->textContent,
                'user_id' => Auth::user()->id,
            ]);

        return redirect(route('admin.newsletters.index'));
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id)
    {
        $newsletter = Newsletter::findOrFail($id);

        return view('admin.newsletters.update', ['newsletter' => $newsletter]);
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
