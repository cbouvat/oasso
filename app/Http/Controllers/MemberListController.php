<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberShipRequest;
use App\Http\Requests\UpdateMemberShipRequest;
use App\Models\MemberShip;
use Illuminate\View\View ;

class MemberListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('members');
    }
}
