<?php

namespace App\Http\Controllers\mobile_app;

use App\Http\Controllers\Controller;
use App\Models\model_book;
use Illuminate\Http\Request;

class esewa_controller extends Controller
{
    public function insert_payment(Request $request){
        $b_id= $request->input("b_id");
        $fee=$request->input("fee");

        $book=model_book::find($b_id);

        $book->status= 2;
        $book->payment= $fee;
        $book->save();


    }
}
