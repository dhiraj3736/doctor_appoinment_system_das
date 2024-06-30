<?php

namespace App\Http\Controllers;

use App\Models\model_admin;
use App\Models\model_service;
use Illuminate\Http\Request;

class service_controller extends Controller
{
    public function run_add_service(){
        return view('admin/add_services');
      }

      public function insert_service(Request $request){


        $request->validate([
'service' => 'required|string|max:255', // Adjust as necessary
        'description' => 'required|string|max:1000', // Adjust as necessary
        'price' => 'required|numeric|min:0', // Adjust as necessary
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Assuming maximum file size is 2048 KB (2 MB)        ]);
        ]);
        $input=new model_service();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Generate a unique filename
            $filename = time() . "-service." . $request->file('image')->getClientOriginalExtension();

            // Store the file in the 'uploads' directory
            $request->file('image')->storeAs('public/uploads', $filename);



            $input->service=$request['service'];
            $input->discription=$request['description'];
            $input->price=$request['price'];
            $input->image=$filename;
            $input->save();

            return redirect()->back()->with('message', 'service information saved successfully.');
        } else {
            // Redirect back with error message if file upload fails
            return redirect()->back()->with('message', 'Failed to upload image.');
        }

    }
public function select_service(){
    $notification=session('a_id');

    $service = model_service::all();

    return view('admin/add_services', compact('service'));
}

public function edit_service($s_id){

    $service = model_service::all();
    $edit = model_service::find($s_id);
    return view('admin/add_services', compact('service', 'edit'));
}

public function update_service(Request $reque,$s_id){
    $input=model_service::find($s_id);

    $input->service=$reque['service'];
    $input->discription=$reque['description'];
    $input->price=$reque['price'];
    $input->save();
    return redirect('add_service');

}

public function delete_service($s_id){
    $dele=model_service::find($s_id)->delete();

    return back();
}

}
