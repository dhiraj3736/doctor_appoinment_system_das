<?php

namespace App\Http\Controllers;

use App\Models\model_admin;
use App\Models\model_book;
use App\Models\model_doctor;
use App\Models\model_service;
use App\Models\model_signup;
use App\Notifications\paymentNotification;
use Illuminate\Http\Request;
use Symfony\Component\Uid\Uuid;

use Illuminate\Support\Facades\Notification;




class payment_controller extends Controller
{
    public function run_payment()
    {
        return view('payment');
    }

    public function payment($b_id) {
        $book = model_book::find($b_id);
        $doctor_name = $book->doctor;
        $doctor_price = model_doctor::where('name', $doctor_name)->first();
        if($doctor_price) {
            // Generate UUID in the required format

            $uuid = Uuid::v4();
            // Convert the UUID to a string

    $uuidString = (string) $uuid;






            $data = compact('book', 'doctor_price','uuidString');

            return view('payment', $data);
        } else {
            return redirect()->back()->with('error', 'Service not found.');
        }
    }
    public function processPayment(Request $request)
{
    // Extract data from the request
    $purchase_order_id = $request->purchase_order_id;
    $amount = $request->amount;
    $return_url = $request->return_url;
    $book_id = $request->book_id;
    $name = session('fullname');
    $email = session('email');

    // Ensure the amount is within Khalti's acceptable range
    if ($amount < 10 || $amount > 1000) {
        return redirect()->back()->with('error', 'Amount must be between Rs 10.0 and Rs 1000.0.');
    }

    // Khalti API endpoint
    $khaltiEndpoint = 'https://a.khalti.com/api/v2/epayment/initiate/';
    $website_url = route('upCommingSchedule');

    // JSON payload for the request
    $payload = json_encode([
        "return_url" => $return_url,
        "website_url" => $website_url,
        "amount" => $amount * 100, // Khalti expects the amount in paisa
        "purchase_order_id" => $purchase_order_id,
        "purchase_order_name" => $book_id,
        "customer_info" => [
            "name" => $name,
            "email" => $email,
            "phone" => "9800000001"
        ]
    ]);

    // cURL setup
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $khaltiEndpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => [
            'Authorization: key d1e9283d6ea14170a39108dcc297b963',
            'Content-Type: application/json',
        ],
    ]);

    // Execute cURL request
    $response = curl_exec($curl);

    // Check for errors
    if (curl_errno($curl)) {
        $error = curl_error($curl);
        // Handle or log the error
        return redirect()->back()->with('error', 'Payment initiation failed.');
    }

    curl_close($curl);

    $responseData = json_decode($response, true);

    if (isset($responseData['payment_url'])) {
        // Redirect the user to the payment URL
        return redirect($responseData['payment_url']);
    } else {
        return redirect()->back()->with('error', 'Unable to retrieve payment URL.');
    }
}

    //http://127.0.0.1:8000/successpayment?pidx=kjL4Pgm6fDGgqABuZnHLQd&transaction_id=STiRmrhkEj5KTyaSo82Xi2&tidx=STiRmrhkEj5KTyaSo82Xi2&amount=1000&total_amount=1000&mobile=98XXXXX004&status=Completed&purchase_order_id=43f6f7f9-052c-48d7-8f49-f521666ad132&purchase_order_name=42
    public function successpayment(Request $request){
        $pidx = $request->query('pidx');
        $status = $request->query('status');
        $amount=$request->query('amount');
        $book_id=$request->query('purchase_order_name');

        $payment=model_book::find($book_id);
        $payment->payment=$amount/100;
        $payment->status=2;
        $payment->save();

        $name=$payment->name;
        $doctor=$payment->doctor;

        $admin=model_admin::all();

        Notification::send($admin, new paymentNotification($doctor,$name));

        // Mail::to($input->email)->send(new RegisterMail($input));


        // Now you have $pidx and $status available for further processing

        return view('successpayment', compact('pidx', 'status','amount'));
    }


    }
