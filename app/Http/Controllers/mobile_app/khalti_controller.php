<?php

namespace App\Http\Controllers\mobile_app;

use App\Http\Controllers\Controller;
use App\Models\model_book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class khalti_controller extends Controller
{
    private $khaltiSecretKey;

    public function __construct()
    {
        $this->khaltiSecretKey = env('KHALTI_SECRET_KEY');
    }

    public function paymentDetail(Request $request)
    {
        $pidx = $request->input('pidx');

        if (!$pidx) {
            return response()->json(['error' => 'pidx is required'], 400);
        }

        $response = Http::withHeaders([
            'Authorization' => 'Key ' . $this->khaltiSecretKey,
            'Content-Type' => 'application/json'
        ])->post('https://khalti.com/api/v2/epayment/detail/', [
            'pidx' => $pidx
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json([
                'error' => 'Failed to fetch payment details',
                'details' => $response->json()
            ], $response->status());
        }
    }


    public function get_booking_info(Request $request)
    {
        $b_id = $request->input('b_id');

        // Fetch the booking details
        $book = model_book::join('doctor', 'book.doctor', '=', 'doctor.name')
            ->select('book.*', 'doctor.specialist', 'doctor.image', 'doctor.d_id', 'doctor.price')
            ->where('book.b_id', '=', $b_id)
            ->first(); // Use first() to get a single result

        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'No booking found'
            ], 404);
        }

        // Return the response with booking details
        return response()->json([
            'result' => 'success',
            'doctor_name' => $book->doctor,
            'specialist' => $book->specialist,
            'date' => $book->date,
            'time' => $book->time,
            'reason' => $book->reason,
            'b_id' => $book->b_id,
            'd_id' => $book->d_id,
            'status' => $book->status,
            'price' => $book->price
        ]);
    }
}
