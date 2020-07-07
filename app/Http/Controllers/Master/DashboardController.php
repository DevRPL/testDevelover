<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct() 
    {
        //
    }

    public function index()
    {
       return view('admin.dashboard.index');
    }
}
