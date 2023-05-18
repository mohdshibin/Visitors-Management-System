<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorDashboardController extends Controller
{
    function getVisitorDashboard(){
        return view('visitordashboard');
    }
}
