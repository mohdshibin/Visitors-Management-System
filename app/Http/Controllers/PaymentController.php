<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class PaymentController extends Controller
{

    function index(){
        $paymentAccessKey = Config::get('app.payment_access_key');
        $paymentSecretKey = Config::get('app.payment_secret_key');
        //require_once('vendor/autoload.php');

        $client = new \GuzzleHttp\Client();

        $visitor = Auth::guard('webvisitor')->user();
        $visitor_info = Visitor::find($visitor->visitor_id);
        $json_data =[
            'amount' => $visitor->due,
            'currency' => 'INR',
            'name'  => $visitor_info->fname,
            'email_id' => $visitor->email,
            'contact_number' => $visitor_info->contactNo,
            'mtx' => ''
        ];
        // dd($json_data);

        $response = $client->request('POST', 'https://sandbox-icp-api.bankopen.co/api/payment_token', [
            'headers' => [
                'Authorization' => 'Bearer ' . $paymentAccessKey .':'. $paymentSecretKey,
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
            'json' => $json_data,
        ]);

        $content = $response->getBody()->getContents();
        $data = json_decode($content, true);


        return view('layouts.payment_layer_checkout')->with('access_key',  $paymentAccessKey)->with('payment_token', $data['id']);
}

    function getPaymentPage(){
        return view('payment');
    }

    public function callback(Request $request)
    {
        //$status = $request->query('status');
        $paymentAccessKey = Config::get('app.payment_access_key');
        $paymentSecretKey = Config::get('app.payment_secret_key');
        $token = $request->query('token');

        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://sandbox-icp-api.bankopen.co/api/payment_token/' . $token . '/payment', [
        'headers' => [
            'Authorization' => 'Bearer ' . $paymentAccessKey .':'. $paymentSecretKey,
            'accept' => 'application/json',
        ],
        ]);

        $content = $response->getBody()->getContents();
        $data = json_decode($content, true);

        if($data['status']=="captured"){
            $visitor = Auth::guard('webvisitor')->user();
            $visitor->due = 0;
            $visitor->save();
        }

        return view('paymentresponse',['status' => $data['status']]);
    }
}
