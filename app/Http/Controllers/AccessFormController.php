<?php

namespace App\Http\Controllers;
use App\Models\Visitor;
use Illuminate\Http\Request;

class AccessFormController extends Controller
{
    function requestAccess(Request $request){

        try{
            $request->validate([
                'fname' => 'required',
                'contactNo' => 'required|digits:10',
                'email' => 'required',
                'address' => 'required',
                'purpose' => 'required',
                'noOfPeople' => 'required|numeric',
                'parkingSlot' => 'required|boolean',
            ]);
        }
        catch(exception $e){
            return back()->with('error',$e);
        }

        $data['fname'] = $request->fname;
        $data['contactNo'] = $request->contactNo;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['purpose'] = $request->purpose;
        $data['noOfPeople'] = $request->noOfPeople;
        $data['parkingSlot'] = $request->parkingSlot;

        
        try {
            Visitor::create($data);
        }
        catch(Exception $e) {
            // return redirect()->back()->with('error', 'Some error Occured!');
            return back()->with('error', 'Some error Occured!');
        }
        return back()->with('success', 'Request sent.Please wait for conformation!');
    }
}

