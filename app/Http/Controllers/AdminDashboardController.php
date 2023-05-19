<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Visitor;
use App\Models\VisitorCredential;
use App\Mail\ApproveEmail;
use App\Mail\RejectEmail;
use Illuminate\Support\Facades\Hash;

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
        //genrate a password
        $password = Str::uuid();

        //update vistor credential table
        $data['visitor_id'] = $visitor->id;
        $data['email'] = $visitor->email;
        $data['password'] = Hash::make($password);

        VisitorCredential::create($data);

        //sending approval mail to user
        Mail::to($visitor->email)->send(new ApproveEmail($data,$visitor->fname,$password));


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

        //sending approval mail to user
        Mail::to($visitor->email)->send(new RejectEmail($visitor->fname));

        $visitor->request_status = "rejected";
        $visitor->save();

        return back()->with('success', 'visitor rejected successfully.');
    }
}
