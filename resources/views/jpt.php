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























































package com.example.doctor_appointment

import android.content.Intent
import android.os.Bundle
import android.util.Log
import android.view.View
import android.widget.Button
import android.widget.ImageView
import android.widget.TextView
import android.widget.Toast
import androidx.activity.result.ActivityResult
import androidx.activity.result.ActivityResultLauncher
import androidx.activity.result.contract.ActivityResultContracts
import androidx.appcompat.app.AppCompatActivity
import com.android.volley.*
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import com.bumptech.glide.Glide
import com.f1soft.esewapaymentsdk.EsewaConfiguration
import com.f1soft.esewapaymentsdk.EsewaPayment
import com.f1soft.esewapaymentsdk.ui.screens.EsewaPaymentActivity
import org.json.JSONException
import org.json.JSONObject
import java.text.ParseException
import java.text.SimpleDateFormat
import java.util.*

class EsewaPayment : AppCompatActivity() {

    private lateinit var requestQueue: RequestQueue

    private var doctorID: String? = null
    private var selectedDate: String? = null
    private var selectedTimeSlot: String? = null
    private var reason: String? = null
    private var b_id: String? = null
    private var status: String? = null
    private var fee: String? = null

    private lateinit var date: TextView
    private lateinit var time: TextView
    private lateinit var reasons: TextView
    private lateinit var doctorImage: ImageView
    private lateinit var doctorName: TextView
    private lateinit var doctorSpecialty: TextView
    private lateinit var nmcNo: TextView
    private lateinit var stat: TextView
    private lateinit var paymentDetail: TextView
    private lateinit var esewa: Button

    private val eSewaConfiguration = EsewaConfiguration(
            clientId = "JB0BBQ4aD0UqIThFJwAKBgAXEUkEGQUBBAwdOgABHD4DChwUAB0R",
            secretKey = "BhwIWQQADhIYSxILExMcAgFXFhcOBwAKBgAXEQ==",
            environment = EsewaConfiguration.ENVIRONMENT_TEST
    )

    private lateinit var registerActivity: ActivityResultLauncher<Intent>

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_payment) // Replace with your actual layout

        requestQueue = Volley.newRequestQueue(this)

        // Retrieve data from the Intent
        b_id = intent.getStringExtra("b_id")
        b_id?.let { loadCompletedAppointment(it) }
        b_id?.let { Log.d("booking_id", it) }

        // Initialize views
        doctorImage = findViewById(R.id.doctor_image)
        doctorName = findViewById(R.id.doctor_name)
        doctorSpecialty = findViewById(R.id.doctor_specialty)
        nmcNo = findViewById(R.id.doctor_nmc)
        date = findViewById(R.id.appointment_date)
        time = findViewById(R.id.appointment_time)
        reasons = findViewById(R.id.appointment_reason)
        stat = findViewById(R.id.status)
        paymentDetail = findViewById(R.id.paymentdetail)
        esewa = findViewById(R.id.esewabtn)

        // Set initial text values
        date.text = selectedDate
        time.text = "|| $selectedTimeSlot"
        reasons.text = reason

        // Handle visibility and text based on status and date
        updateUIBasedOnStatus()

        // Initialize Activity Result Launcher
        registerActivity = registerForActivityResult(
                ActivityResultContracts.StartActivityForResult(),
                ::onResultCallback
        )

        // Initialize EsewaPayment with fee and b_id
        esewa.setOnClickListener {
            Log.d("eSewaPayment", "eSewa button clicked")

            // Ensure b_id and fee are not null before using them
            if (b_id != null && fee != null) {
                val eSewaPayment = EsewaPayment(
                        fee!!, // Amount
                        "Product Description", // Replace with actual product description
                        b_id!! // Product ID
                )
                Log.d("fee", fee!!)

                registerActivity.launch(
                        Intent(this, EsewaPaymentActivity::class.java).apply {
                            putExtra(EsewaConfiguration.ESEWA_CONFIGURATION, eSewaConfiguration)
                            putExtra(EsewaPayment.ESEWA_PAYMENT, eSewaPayment)
                        }
                )
            } else {
                Toast.makeText(this, "Payment details are not available", Toast.LENGTH_SHORT).show()
            }
        }

        // Fetch doctor info
        doctorID?.let { getDoctorInfo(it) }
    }

    private fun updateUIBasedOnStatus() {
        // Check if selectedDate is null before parsing
        if (selectedDate != null) {
            val appointmentDate = parseDate(selectedDate)
            when {
                status == "1" && appointmentDate != null && appointmentDate.before(getCurrentDate()) -> {
                    stat.text = "Accepted"
                    esewa.visibility = View.GONE
                }
                status == "1" && appointmentDate != null && appointmentDate.after(getCurrentDate()) -> {
                    stat.text = "Accepted"
                    esewa.visibility = View.VISIBLE
                }
                status == "2" -> {
                    stat.text = "Accepted"
                    paymentDetail.text = "Payment complete"
                    esewa.visibility = View.GONE
                }
                status == "0" -> {
                    stat.text = "Not accepted"
                    esewa.visibility = View.GONE
                }
            }
        } else {
            Log.e("Update UI", "Selected date is null")
        }
    }

    private fun getCurrentDate(): Date {
        return Date()
    }

    private fun parseDate(dateString: String?): Date? {
        return if (dateString != null) {
            val dateFormat = SimpleDateFormat("yyyy-MM-dd", Locale.getDefault())
            try {
                dateFormat.parse(dateString)
            } catch (e: ParseException) {
                e.printStackTrace()
                null
            }
        } else {
            null
        }
    }

    private fun getDoctorInfo(doctorId: String) {
        val url = Endpoints.select_doctor_info

        val stringRequest = object : StringRequest(Request.Method.POST, url,
                Response.Listener<String> { response ->
                    try {
                        val jsonObject = JSONObject(response)
                        val result = jsonObject.getString("result")
                        if (result == "success") {
                            val name = jsonObject.getString("name")
                            val specialist = jsonObject.getString("specialist")
                            val nmc = jsonObject.getString("nmc_no")
                            val imageUrl = jsonObject.getString("image")

                            Glide.with(this).load(imageUrl).circleCrop().into(doctorImage)
                            doctorName.text = name
                            doctorSpecialty.text = specialist
                            nmcNo.text = nmc
                        } else {
                            Log.e("Error", "Doctor ID is null or empty")
                        }
                    } catch (e: JSONException) {
                        e.printStackTrace()
                    }
                },
                Response.ErrorListener { error ->
                    Log.e("Volley Error", error.toString())
                }) {
            override fun getParams(): MutableMap<String, String> {
                val data = HashMap<String, String>()
                data["d_id"] = doctorId
                return data
            }
        }

        requestQueue.add(stringRequest)
    }

    private fun onResultCallback(result: ActivityResult) {
        Log.d("TAGz", "result ${result.resultCode}")
        result.let {
            when (it.resultCode) {
                AppCompatActivity.RESULT_OK -> {
                    it.data?.getStringExtra(EsewaPayment.EXTRA_RESULT_MESSAGE)?.let { s ->
                        Log.i("Proof of Payment", s)
                    }

                    // Insert fee information
                    if (b_id != null && fee != null) {
                        insertFee(b_id!!, fee!!)
                    }

                    Toast.makeText(this, "SUCCESSFUL PAYMENT", Toast.LENGTH_SHORT).show()
                }
                AppCompatActivity.RESULT_CANCELED -> {
                    Toast.makeText(this, "Canceled By User", Toast.LENGTH_SHORT).show()
                }
                EsewaPayment.RESULT_EXTRAS_INVALID -> {
                    it.data?.getStringExtra(EsewaPayment.EXTRA_RESULT_MESSAGE)?.let { s ->
                        Toast.makeText(this, s, Toast.LENGTH_SHORT).show()
                    }
                }
                else -> {}
            }
        }
    }

    private fun insertFee(b_id: String, fee: String) {
        val url = Endpoints.get_insert_paymenr // Corrected URL

        val stringRequest = object : StringRequest(Request.Method.POST, url,
                Response.Listener<String> { response ->
                    try {
                        val jsonObject = JSONObject(response)
                        val result = jsonObject.getString("result")
                        if (result != "success") {
                            Log.e("Error", "Failed to update fee")
                        }
                    } catch (e: JSONException) {
                        e.printStackTrace()
                    }
                },
                Response.ErrorListener { error ->
                    Log.e("Volley Error", error.toString())
                }) {
            override fun getParams(): MutableMap<String, String> {
                val data = HashMap<String, String>()
                data["b_id"] = b_id
                data["fee"] = fee
                return data
            }
        }

        requestQueue.add(stringRequest)
    }

    private fun loadCompletedAppointment(b_id: String) {
        val url = Endpoints.get_booking_info

        val stringRequest = object : StringRequest(Request.Method.POST, url,
                Response.Listener<String?> { response ->
                    try {
                        val jsonObject = JSONObject(response)
                        val result = jsonObject.getString("result")
                        if (result == "success") {
                            Log.d("API Response", "Data retrieved successfully: $response")

                            doctorID = jsonObject.getString("doctor_name")
                            selectedDate = jsonObject.getString("date")
                            selectedTimeSlot = jsonObject.getString("time")
                            reason = jsonObject.getString("reason")
                            status = jsonObject.getString("status")
                            fee = jsonObject.getString("price")

                            // Log retrieved values
                            Log.d("Data", "Doctor ID: $doctorID")
                            Log.d("Data", "Selected Date: $selectedDate")
                            Log.d("Data", "Selected Time Slot: $selectedTimeSlot")
                            Log.d("Data", "Reason: $reason")
                            Log.d("Data", "Status: $status")
                            Log.d("Data", "Fee: $fee")

                            // Update UI with the fetched data
                            doctorName.text = doctorID
                            date.text = selectedDate
                            time.text = selectedTimeSlot
                            reasons.text = reason
                            paymentDetail.text = status

                            updateUIBasedOnStatus()
                        } else {
                            Toast.makeText(this, "No booking found", Toast.LENGTH_SHORT).show()
                        }
                    } catch (e: JSONException) {
                        e.printStackTrace()
                        Toast.makeText(this, "JSON parsing error: " + e.message, Toast.LENGTH_SHORT).show()
                    }
                },
                Response.ErrorListener { error ->
                    if (error is NetworkError) {
                        Toast.makeText(this, "Network error. Check your internet connection.", Toast.LENGTH_SHORT).show()
                    }
                    Log.e("Volley Error", "Error: " + error.message)
                }) {

            @Throws(AuthFailureError::class)
            override fun getParams(): Map<String, String>? {
                val data: MutableMap<String, String> = HashMap()
                data["b_id"] = b_id
                return data
            }
        }
        requestQueue.add(stringRequest)
    }
}









































package com.example.doctor_appointment

import android.content.Intent
import android.os.Bundle
import android.util.Log
import android.view.View
import android.widget.Button
import android.widget.ImageView
import android.widget.TextView
import android.widget.Toast
import androidx.activity.result.ActivityResult
import androidx.activity.result.ActivityResultLauncher
import androidx.activity.result.contract.ActivityResultContracts
import androidx.appcompat.app.AppCompatActivity
import com.android.volley.*
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import com.bumptech.glide.Glide
import com.f1soft.esewapaymentsdk.EsewaConfiguration
import com.f1soft.esewapaymentsdk.EsewaPayment
import com.f1soft.esewapaymentsdk.ui.screens.EsewaPaymentActivity
import org.json.JSONException
import org.json.JSONObject
import java.text.ParseException
import java.text.SimpleDateFormat
import java.util.*

class EsewaPayment : AppCompatActivity() {

    private lateinit var requestQueue: RequestQueue

    private var doctorID: String? = null
    private var selectedDate: String? = null
    private var selectedTimeSlot: String? = null
    private var reason: String? = null
    private var b_id: String? = null
    private var status: String? = null
    private var fee: String? = null

    private lateinit var date: TextView
    private lateinit var time: TextView
    private lateinit var reasons: TextView
    private lateinit var doctorImage: ImageView
    private lateinit var doctorName: TextView
    private lateinit var doctorSpecialty: TextView
    private lateinit var nmcNo: TextView
    private lateinit var stat: TextView
    private lateinit var paymentDetail: TextView
    private lateinit var esewa: Button

    private val eSewaConfiguration = EsewaConfiguration(
            clientId = "JB0BBQ4aD0UqIThFJwAKBgAXEUkEGQUBBAwdOgABHD4DChwUAB0R",
            secretKey = "BhwIWQQADhIYSxILExMcAgFXFhcOBwAKBgAXEQ==",
            environment = EsewaConfiguration.ENVIRONMENT_TEST
    )

    private lateinit var registerActivity: ActivityResultLauncher<Intent>

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_payment) // Replace with your actual layout

        requestQueue = Volley.newRequestQueue(this)

        // Retrieve data from the Intent
        b_id = intent.getStringExtra("b_id")
        b_id?.let { loadCompletedAppointment(it) }
        b_id?.let { Log.d("booking_id", it) }

        // Initialize views
        doctorImage = findViewById(R.id.doctor_image)
        doctorName = findViewById(R.id.doctor_name)
        doctorSpecialty = findViewById(R.id.doctor_specialty)
        nmcNo = findViewById(R.id.doctor_nmc)
        date = findViewById(R.id.appointment_date)
        time = findViewById(R.id.appointment_time)
        reasons = findViewById(R.id.appointment_reason)
        stat = findViewById(R.id.status)
        paymentDetail = findViewById(R.id.paymentdetail)
        esewa = findViewById(R.id.esewabtn)

        // Set initial text values
        date.text = selectedDate
        time.text = "|| $selectedTimeSlot"
        reasons.text = reason

        // Handle visibility and text based on status and date
        updateUIBasedOnStatus()

        // Initialize Activity Result Launcher
        registerActivity = registerForActivityResult(
                ActivityResultContracts.StartActivityForResult(),
                ::onResultCallback
        )

        // Initialize EsewaPayment with fee and b_id
        esewa.setOnClickListener {
            Log.d("eSewaPayment", "eSewa button clicked")

            // Ensure b_id and fee are not null before using them
            if (b_id != null && fee != null) {
                val eSewaPayment = EsewaPayment(
                        fee!!, // Amount
                        "Product Description", // Replace with actual product description
                        b_id!! // Product ID
                )
                Log.d("fee", fee!!)

                registerActivity.launch(
                        Intent(this, EsewaPaymentActivity::class.java).apply {
                            putExtra(EsewaConfiguration.ESEWA_CONFIGURATION, eSewaConfiguration)
                            putExtra(EsewaPayment.ESEWA_PAYMENT, eSewaPayment)
                        }
                )
            } else {
                Toast.makeText(this, "Payment details are not available", Toast.LENGTH_SHORT).show()
            }
        }

        // Fetch doctor info
        doctorID?.let { getDoctorInfo(it) }
    }

    private fun updateUIBasedOnStatus() {
        // Check if selectedDate is null before parsing
        if (selectedDate != null) {
            val appointmentDate = parseDate(selectedDate)
            when {
                status == "1" && appointmentDate != null && appointmentDate.before(getCurrentDate()) -> {
                    stat.text = "Accepted"
                    esewa.visibility = View.GONE
                }
                status == "1" && appointmentDate != null && appointmentDate.after(getCurrentDate()) -> {
                    stat.text = "Accepted"
                    esewa.visibility = View.VISIBLE
                }
                status == "2" -> {
                    stat.text = "Accepted"
                    paymentDetail.text = "Payment complete"
                    esewa.visibility = View.GONE
                }
                status == "0" -> {
                    stat.text = "Not accepted"
                    esewa.visibility = View.GONE
                }
            }
        } else {
            Log.e("Update UI", "Selected date is null")
        }
    }

    private fun getCurrentDate(): Date {
        return Date()
    }

    private fun parseDate(dateString: String?): Date? {
        return if (dateString != null) {
            val dateFormat = SimpleDateFormat("yyyy-MM-dd", Locale.getDefault())
            try {
                dateFormat.parse(dateString)
            } catch (e: ParseException) {
                e.printStackTrace()
                null
            }
        } else {
            null
        }
    }

    private fun getDoctorInfo(doctorId: String) {
        val url = Endpoints.select_doctor_info

        val stringRequest = object : StringRequest(Request.Method.POST, url,
                Response.Listener<String> { response ->
                    try {
                        val jsonObject = JSONObject(response)
                        val result = jsonObject.getString("result")
                        if (result == "success") {
                            val name = jsonObject.getString("name")
                            val specialist = jsonObject.getString("specialist")
                            val nmc = jsonObject.getString("nmc_no")
                            val imageUrl = jsonObject.getString("image")

                            Glide.with(this).load(imageUrl).circleCrop().into(doctorImage)
                            doctorName.text = name
                            doctorSpecialty.text = specialist
                            nmcNo.text = nmc
                        } else {
                            Log.e("Error", "Doctor ID is null or empty")
                        }
                    } catch (e: JSONException) {
                        e.printStackTrace()
                    }
                },
                Response.ErrorListener { error ->
                    Log.e("Volley Error", error.toString())
                }) {
            override fun getParams(): MutableMap<String, String> {
                val data = HashMap<String, String>()
                data["d_id"] = doctorId
                return data
            }
        }

        requestQueue.add(stringRequest)
    }

    private fun onResultCallback(result: ActivityResult) {
        Log.d("TAGz", "result ${result.resultCode}")
        result.let {
            when (it.resultCode) {
                AppCompatActivity.RESULT_OK -> {
                    it.data?.getStringExtra(EsewaPayment.EXTRA_RESULT_MESSAGE)?.let { s ->
                        Log.i("Proof of Payment", s)
                    }

                    // Insert fee information
                    if (b_id != null && fee != null) {
                        insertFee(b_id!!, fee!!)
                    }

                    Toast.makeText(this, "SUCCESSFUL PAYMENT", Toast.LENGTH_SHORT).show()
                }
                AppCompatActivity.RESULT_CANCELED -> {
                    Toast.makeText(this, "Canceled By User", Toast.LENGTH_SHORT).show()
                }
                EsewaPayment.RESULT_EXTRAS_INVALID -> {
                    it.data?.getStringExtra(EsewaPayment.EXTRA_RESULT_MESSAGE)?.let { s ->
                        Toast.makeText(this, s, Toast.LENGTH_SHORT).show()
                    }
                }
                else -> {}
            }
        }
    }

    private fun insertFee(b_id: String, fee: String) {
        val url = Endpoints.get_insert_paymenr // Corrected URL

        val stringRequest = object : StringRequest(Request.Method.POST, url,
                Response.Listener<String> { response ->
                    try {
                        val jsonObject = JSONObject(response)
                        val result = jsonObject.getString("result")
                        if (result != "success") {
                            Log.e("Error", "Failed to update fee")
                        }
                    } catch (e: JSONException) {
                        e.printStackTrace()
                    }
                },
                Response.ErrorListener { error ->
                    Log.e("Volley Error", error.toString())
                }) {
            override fun getParams(): MutableMap<String, String> {
                val data = HashMap<String, String>()
                data["b_id"] = b_id
                data["fee"] = fee
                return data
            }
        }

        requestQueue.add(stringRequest)
    }

    private fun loadCompletedAppointment(b_id: String) {
        val url = Endpoints.get_booking_info

        val stringRequest = object : StringRequest(Request.Method.POST, url,
                Response.Listener<String?> { response ->
                    try {
                        val jsonObject = JSONObject(response)
                        val result = jsonObject.getString("result")
                        if (result == "success") {
                            Log.d("API Response", "Data retrieved successfully: $response")

                            doctorID = jsonObject.getString("doctor_name")
                            selectedDate = jsonObject.getString("date")
                            selectedTimeSlot = jsonObject.getString("time")
                            reason = jsonObject.getString("reason")
                            status = jsonObject.getString("status")
                            fee = jsonObject.getString("price")

                            // Log retrieved values
                            Log.d("Data", "Doctor ID: $doctorID")
                            Log.d("Data", "Selected Date: $selectedDate")
                            Log.d("Data", "Selected Time Slot: $selectedTimeSlot")
                            Log.d("Data", "Reason: $reason")
                            Log.d("Data", "Status: $status")
                            Log.d("Data", "Fee: $fee")

                            // Update UI with the fetched data
                            doctorName.text = doctorID
                            date.text = selectedDate
                            time.text = selectedTimeSlot
                            reasons.text = reason
                            paymentDetail.text = status

                            updateUIBasedOnStatus()
                        } else {
                            Toast.makeText(this, "No booking found", Toast.LENGTH_SHORT).show()
                        }
                    } catch (e: JSONException) {
                        e.printStackTrace()
                        Toast.makeText(this, "JSON parsing error: " + e.message, Toast.LENGTH_SHORT).show()
                    }
                },
                Response.ErrorListener { error ->
                    if (error is NetworkError) {
                        Toast.makeText(this, "Network error. Check your internet connection.", Toast.LENGTH_SHORT).show()
                    }
                    Log.e("Volley Error", "Error: " + error.message)
                }) {

            @Throws(AuthFailureError::class)
            override fun getParams(): Map<String, String>? {
                val data: MutableMap<String, String> = HashMap()
                data["b_id"] = b_id
                return data
            }
        }
        requestQueue.add(stringRequest)
    }
}





















































@extends('layouts.main')

@section('main-section')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg">
                <div class="card-header text-white bg-primary">
                    <h3 class="card-title text-center">Doctor Profile</h3>
                </div>
                <div class="card-body">
                    <!-- Display success or error messages -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <!-- Doctor Information -->
                    @if(isset($doctor))
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="{{ asset('storage/uploads/' . $doctor->image) }}" class="rounded-circle img-thumbnail mb-3" alt="Doctor Image" style="object-fit: cover; height: 200px; width: 200px;">
                            </div>
                            <div class="col-md-8">
                                <h4 class="card-title text-primary">Dr. {{ $doctor->name }}</h4>
                                <p class="card-text"><strong>NMC No.:</strong> {{ $doctor->nmc_no }}</p>
                                <p class="card-text"><strong>Specialist:</strong> {{ $doctor->specialist }}</p>
                                <p class="card-text"><strong>Qualification:</strong> {{ $doctor->qualification }}</p>
                                <p class="card-text"><strong>Experience:</strong> {{ $doctor->experience }} years</p>
                                <p class="card-text"><strong>Available Time:</strong> {{ $doctor->fromtime }} - {{ $doctor->totime }}</p>
                                <p class="card-text"><strong>Average Rating:</strong>
                                    <span class="badge badge-warning text-dark">{{ $averageRating ?? 'No ratings yet' }}</span>
                                </p>
                                <p class="card-text"><strong>Number of Reviews:</strong> {{ $numberOfReviews }}</p>
                                <a href="/book" class="btn btn-success btn-block mt-4">Book Appointment</a>
                            </div>
                        </div>

                        <!-- User Ratings Section -->
                        <hr>
                        <h5 class="text-primary mt-4">User Ratings</h5>
                        <div class="list-group">
                            @foreach($ratings as $rating)
                                <div class="list-group-item">
                                    <span class="badge badge-primary">{{ $rating }} / 5</span>
                                </div>
                            @endforeach
                        </div>

                        <!-- Rating Form Section -->
                        <hr>
                        <h5 class="text-primary mt-4">Rate This Doctor</h5>
                        <form method="POST" action="{{ route('rating.store', $doctor->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <div class="rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <input type="radio" id="rating-star{{ $i }}" name="rating" value="{{ $i }}" required>
                                        <label for="rating-star{{ $i }}" class="star">
                                            <i class="fas fa-star"></i>
                                        </label>
                                    @endfor
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Rating</button>
                        </form>
                    @else
                        <p class="text-danger">Doctor information not available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

































































@extends('layouts.main')

@section('main-section')
<div class="container">
    <div class="row justify-content-center">
        @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
        @endif
        <div class="col-md-6">
            <h1 class="display-4" style="color: white; font-size:30px;">{{$title}}</h1>
            <form action="{{$url}}" method="post" style="color:white;">
                @csrf
                <div class="container" style="background-image:url(./images/3.jpg); padding: 20px; border-radius: 10px;">
                    <div class="mb-3">
                        <label for="fname" class="form-label"><b>Name:</b></label>
                        <input type="text" class="form-control" id="fname" placeholder="Enter Full name of patient" value="{{isset($select_item) ? $select_item->name : old('fname')}}" name="fname">
                        <span class="text-danger">
                            @error('fname')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label"><b>Gender:</b></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ isset($select_item) ? ($select_item->gender == "female" ? "checked" : "") : (old('gender') == "female" ? "checked" : "") }}>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ isset($select_item) ? ($select_item->gender == "male" ? "checked" : "") : (old('gender') == "male" ? "checked" : "") }}>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="other" {{ isset($select_item) ? ($select_item->gender == "other" ? "checked" : "") : (old('gender') == "other" ? "checked" : "") }}>
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                        <span class="text-danger">
                            @error('gender')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <label><b>Email:</b></label><br>
                    <input type="email" class="form-control" placeholder="Enter Full name of patient" value="{{isset($select_item) ? $select_item->email : old('email')}}" name="email">
                    <span style="color:red;">
                        @error('email')
                        {{$message}}
                        @enderror
                    </span><br>

                    <label><b>Address:</b></label><br>
                    <input type="text" class="form-control" placeholder="address" value="{{isset($select_item) ? $select_item->address : old('address')}}" name="address">
                    <span style="color:red;">
                        @error('address')
                        {{$message}}
                        @enderror
                    </span><br>
                    <label><b>Date of Visit:</b></label><br>
                    <input type="date" class="form-control" name="dov" value="{{isset($select_item) ? $select_item->date : old('dov')}}" onChange="getDay(this.value);" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+7 day')); ?>">
                    <span style="color:red;">
                        @error('dov')
                        {{$message}}
                        @enderror
                    </span><br>

                    <label for="">Service:</label><br>
                    <select name="service" class="form-control" id="cars">
                        @foreach($service as $serviceItem)
                        <option value="{{ $serviceItem->service }}" {{ (isset($select_item) && $select_item->service == $serviceItem->service) || old('service') == $serviceItem->service ? 'selected' : '' }}>
                            {{ $serviceItem->service }}
                        </option>
                        @endforeach
                    </select>
                    <span style="color:red;">
                        @error('service')
                        {{$message}}
                        @enderror
                    </span><br>

                    <label for="">Doctor</label>
                    <select name="doctor" class="form-control" id="doctor">
                        <option value="">please choose doctor</option>
                        @foreach($doctor as $row)
                        <option value="{{ $row->name }}" {{ (isset($select_item) && $select_item->name == $row->name) || old('doctor') == $row->name ? 'selected' : '' }}>
                            {{ $row->name }}
                        </option>
                        @endforeach
                    </select>
                    <span style="color:red;">
                        @error('doctor')
                        {{$message}}
                        @enderror
                    </span><br>

                    <label id="doctorTimeLabel"><b>Doctor Available Time</b></label><br>
                    <span id="doctorTimeSpan"></span><br>

                    <label><b>Add time</b></label>
                    <input type="time" name="time" id="phone" class="form-control"  value="{{isset($select_item) ? $select_item->time : old('time')}}"><br>

                    <label><b>Contact Number</b></label><br>
                    <input type="text" name="number" id="phone" class="form-control" placeholder="Phone Number" value="{{isset($select_item) ? $select_item->number : old('number')}}">
                    <span style="color:red;">
                        @error('number')
                        {{$message}}
                        @enderror
                    </span><br>

                    <!-- Other form fields... -->
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Setup CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // AJAX request to fetch doctor's available time on doctor selection change
        $('#doctor').change(function(){
            var doctorname = $(this).val();
            var route = "{{ route('getdoctortime', ':doctorname') }}";
            route = route.replace(':doctorname', doctorname);

            $.ajax({
                url: route,
                type: 'GET',
                success: function(response) {
                    // Update the label and span with the doctor's available time
                    document.getElementById('doctorTimeLabel').innerText = 'Doctor Available Time (' + response.fromtime + ' to ' + response.totime + ')';
                    document.getElementById('doctorTimeSpan').innerText = ''; // Clear any previous error message
                },
                error: function(xhr, status, error) {
                    // Handle AJAX error
                    console.error(error);
                    document.getElementById('doctorTimeSpan').innerText = 'Error fetching doctor time';
                }
            });
        });
    });
</script>
@endsection














































package com.example.doctor_appointment;

import android.content.Intent;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

public class ProfileFragment extends Fragment {

Button logout;
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view=inflater.inflate(R.layout.fragment_profile, container, false);

        logout=view.findViewById(R.id.logout);

        SessionManagement sessionManagement=new SessionManagement(getContext());
        sessionManagement.removeSession();

        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(getContext(), login.class);
                intent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TASK|Intent.FLAG_ACTIVITY_CLEAR_TASK);


                startActivity(intent);

            }
        });


        return view;
    }
}

