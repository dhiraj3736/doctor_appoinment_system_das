@extends('layouts.main')

@section('main-section')
<div class="container text-center mt-5">
    <h4 class="display-4" style="color: white; font-size: 30px;">Payment</h4>
</div>

<div class="container mt-5">
    <div class="table-responsive">

        <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
            <input type="text" id="amount" name="amount" value="{{$service->price}}" required>
            <input type="text" id="tax_amount" name="tax_amount" value="0" required>
            <input type="text" id="total_amount" name="total_amount" value="{{$service->price}}" required>
            <input type="text" id="transaction_uuid" name="transaction_uuid" value="{{$uuid}}" required>
            <input type="text" id="product_code" name="product_code" value="EPAYTEST" required>
            <input type="text" id="product_service_charge" name="product_service_charge" value="0" required>
            <input type="text" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
            <input type="text" id="success_url" name="success_url" value="https://esewa.com.np" required>
            <input type="text" id="failure_url" name="failure_url" value="https://google.com" required>
            <input type="text" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
            <input type="text" id="signature" name="signature" value="" required>
            <input value="Submit" type="submit">
        </form>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1
/crypto-js.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1
/hmac-sha256.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1
/enc-base64.min.js"></script><script>
    // Define JavaScript variables with PHP values
    var servicePrice = "<?php echo $service->price; ?>";
    var uuid = "<?php echo $uuid; ?>";
    var productCode = "EPAYTEST";

    // Construct the message string using JavaScript variables
    var message = "total_amount=" + servicePrice + ", transaction_uuid=" + uuid + ", product_code=" + productCode;

    // Define the secret key
    var secret = "8gBm/:&EnhH.1/q";

    // Calculate HMAC-SHA256 hash
    var hash = CryptoJS.HmacSHA256(message, secret);

    // Convert hash to Base64
    var hashInBase64 = CryptoJS.enc.Base64.stringify(hash);

    // Set the hashInBase64 value to the signature input field
    document.getElementById("signature").value = hashInBase64;
</script>

@endsection






















<?php

namespace App\Http\Controllers;

use App\Models\model_book;
use App\Models\model_service;
use Illuminate\Http\Request;

use Illuminate\Support\Str;



class payment_controller extends Controller
{
    public function run_payment(){
        return view('payment');
    }







    public function payment($b_id) {
        $book = model_book::find($b_id);
        $service_name = $book->service;
        $service = model_service::where('service', $service_name)->first();

        if($service) {
            // Generate UUID in the required format

            $uuid =Str::uuid();






            $data = compact('book', 'service','uuid');

            return view('payment', $data);
        } else {
            return redirect()->back()->with('error', 'Service not found.');
        }
    }




}



public function payment($b_id)
{
    $book = model_book::find($b_id);

    if (!$book) {
        return redirect()->back()->with('error', 'Book not found.');
    }

    $service_name = $book->service;
    $service = model_service::where('service', $service_name)->first();

    if (!$service) {
        return redirect()->back()->with('error', 'Service not found.');
    }



    // Generate a UUID
    $uuid = (string) Str::uuid();

    // Remove non-alphanumeric characters and hyphens

    // dd($uuid);

    $message = "total_amount={$service->price}, transaction_uuid={$uuid}, product_code=EPAYTEST";
    $secretKey = "8gBm/:&EnhH.1/q";
    $hash = hash_hmac('sha256', $message, $secretKey, true);
    $hashInBase64 = base64_encode($hash);

    $data = compact('book', 'service', 'message', 'uuid', 'hashInBase64');
    // dd($service->price,$uuid,$message,$secretKey,$hash,$hashInBase64);
    return view('payment', $data);
}



















