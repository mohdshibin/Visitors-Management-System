<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class AdminDashboardController extends Controller
{
    function getAdminDashboard(){
        $data = Visitor::all();
        return view('admindashboard',['visitors'=>$data]);
    }
}
