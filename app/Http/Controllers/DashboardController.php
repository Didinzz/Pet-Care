<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(){
        return view('pages.admin.dashboard.dashboard');
    }
}
