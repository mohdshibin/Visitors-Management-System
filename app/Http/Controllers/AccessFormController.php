<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\VisitorInterface;

class AccessFormController extends Controller
{
    protected $visitorInterface;

    function __construct(VisitorInterface $interface)
    {
        $this->visitorInterface = $interface;
    }
    function requestAccess(Request $request)
    {

        try {
            $request->validate([
                'fname' => 'required',
                'contactNo' => 'required|digits:10',
                'email' => 'required',
                'address' => 'required',
                'purpose' => 'required',
                'noOfPeople' => 'required|numeric',
                'parkingSlot' => 'required|boolean',
            ]);
        } catch (exception $e) {
            return back()->with('error', $e);
        }

        $data['fname'] = $request->fname;
        $data['contactNo'] = $request->contactNo;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['purpose'] = $request->purpose;
        $data['noOfPeople'] = $request->noOfPeople;
        $data['parkingSlot'] = $request->parkingSlot;


        try {
            // $result = Visitor::create($data);
            $result = $this->visitorInterface->store($data);
        } catch (exception $e) {
            return back()->with('error', 'Some error Occured!');
        }
        return back()->with('success', 'Request sent.Please wait for conformation!');
    }
}
