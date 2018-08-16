<?php

namespace App\Http\Controllers\Admin;

use App\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    /**
     *
     */
    public function index(){
        $sessions = Session::orderBy('last_activity', 'desc')->paginate();

        return view('admin.session.index', ['sessions'=>$sessions]);
    }

    /**
     * @param $id
     */
    public function destroy($id){

    }
}
