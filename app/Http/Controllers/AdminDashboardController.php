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

    public function approveRequest($id)
    {
        $visitor = Visitor::find($id);

        if (!$visitor) {
            return back()->with('error', 'visitor not found.');
        }

        $visitor->request_status = "approved";
        $visitor->save();

        return back()->with('success', 'visitor approved successfully.');
    }

    public function rejectRequest($id)
    {
        $visitor = Visitor::find($id);

        if (!$visitor) {
            return back()->with('error', 'visitor not found.');
        }

        $visitor->request_status = "rejected";
        $visitor->save();

        return back()->with('success', 'visitor rejected successfully.');
    }
}
