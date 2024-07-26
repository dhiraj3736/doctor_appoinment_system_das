<?php

namespace App\Http\Controllers\mobile_app;

use App\Http\Controllers\Controller;
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
}
