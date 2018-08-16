<?php

namespace App\Http\Controllers\Admin\Export;

use App\User;
use App\Http\Controllers\Controller;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = User::pluck('city', 'zipcode')->all();

        return view('admin.export.index', ['cities' => $cities]);
    }
}
