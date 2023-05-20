<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VisitorDashboardController extends Controller
{
    function getVisitorDashboard(){
        return view('visitordashboard');
    }

    function checkin()
    {
        $visitor = Auth::guard('webvisitor')->user();
        $visitor->last_check_in = now();
        $visitor->save();
        return back();
    }

    function checkout()
    {
        $visitor = Auth::guard('webvisitor')->user();

        $lastCheckIn = $visitor?->last_check_in;

        $currentTime = now();
        $interval = $currentTime->diffInMinutes($lastCheckIn);

        if ($interval > 5) {
            $visitor->due = $interval-5;
            $visitor->save();
        }
        return back();
    }

}
