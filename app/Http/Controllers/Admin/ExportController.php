<?php

namespace App\Http\Controllers\Admin;

use App\Exports\GiftsExport;
use App\Exports\PaymentsExport;
use App\Exports\SubscriptionsExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;



class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.export.index');
    }


    public function export(Request $request)
    {
        $validate = $request->validate([
            'export_file' => 'required',
            'export_format' => 'required',
        ]);

        $extension = $validate['export_file'].'.'.$validate['export_format'];

        switch ($validate['export_file']) {
            case 'users':
                return Excel::download(new UsersExport,$extension);
            case 'gifts':
                return Excel::download(new GiftsExport,$extension);
            case 'payments':
                return Excel::download(new PaymentsExport,$extension);
            case 'subscriptions':
                return Excel::download(new SubscriptionsExport,$extension);
        }
    }
}
