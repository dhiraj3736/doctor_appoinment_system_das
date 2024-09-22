<?php

namespace App\Http\Controllers\mobile_app;

use App\Http\Controllers\Controller;
use App\Models\model_report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function selectReport(Request $request) {
        // Extract the user_id from the request
        $user_id = $request->input('user_id');

        // Retrieve reports for the user, joining with the book table
        $rep = model_report::from('doctor_report')
                    ->join('book', 'doctor_report.b_id', '=', 'book.b_id')
                    ->select('doctor_report.*', 'book.service', 'book.doctor')
                    ->where('doctor_report.u_id', $user_id)
                    ->get();

        // Format the date for each report
        foreach ($rep as $report) {
            $report->formatted_date = \Carbon\Carbon::parse($report->created_at)->format('d M Y');

        }

        // Return a JSON response including the report data
        return response()->json([
            'result' => 'success',
            'data' => $rep
        ]);
    }

}
