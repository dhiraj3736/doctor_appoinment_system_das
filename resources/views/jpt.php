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

