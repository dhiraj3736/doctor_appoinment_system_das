<?php

namespace App\Http\Controllers;

use App\Models\model_admin;
use App\Models\model_doctor;
use Illuminate\Http\Request;

class doctor_controller extends Controller
{
    public function run_doctor(){
        return view('admin/add_doctor');
    }

    public function insert_doctor_info(Request $request){
        // Validate the request to ensure that 'image' file is present and valid
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming maximum file size is 2048 KB (2 MB)
        ]);
    
        // Create a new instance of the model_doctor
        $input = new model_doctor();
    
        // Handle file upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Generate a unique filename
            $filename = time() . "-doctor." . $request->file('image')->getClientOriginalExtension();
    
            // Store the file in the 'uploads' directory
            $request->file('image')->storeAs('public/uploads', $filename);
    
            // Save other form data along with the filename
            $input->name = $request->input('name');
            $input->nmc_no = $request->input('nmc');
            $input->specialist = $request->input('spec');

            $input->qualification = $request->input('qual');
            $input->experiance = $request->input('expe');
            $input->fromtime=$request->input('fromtime');
            $input->totime=$request->input('totime');

            $input->image = $filename;
            $input->save();
    
            // Redirect back with success message
            return redirect()->back()->with('success', 'Doctor information saved successfully.');
        } else {
            // Redirect back with error message if file upload fails
            return redirect()->back()->with('error', 'Failed to upload image.');
        }
    }
    

         public function retrive_doctor_info(){
            $notification=session('a_id');

            $noti = model_admin::find($notification); 

            $doctors=model_doctor::orderBy('d_id','desc')->paginate(6);
            $data=compact('doctors','noti');
            return view('admin/add_doctor')->with($data);
         }

         public function retrive_doctor_info_for_doctor_dashboard(){
            $doctors=model_doctor::all();
            $data=compact('doctors');
            return view('register')->with($data);
         }

         public function edit_doctor($d_id){
            $doctors=model_doctor::all();
            $edit=model_doctor::find($d_id);
            $noti = model_admin::find(1); 
            $data=compact('doctors','edit','noti');
            return view('admin/add_doctor')->with($data);
         }

         public function update_doctor(Request $request, $d_id){
            // Find the doctor record by ID
            $doctor = model_doctor::find($d_id);
        
            // Validate the incoming request data
         
            // Update doctor information
            $doctor->name = $request['name'];
            $doctor->nmc_no = $request['nmc'];
            $doctor->specialist = $request['spec'];
            $doctor->qualification = $request['qual'];
            $doctor->experiance = $request['expe'];
            $doctor->fromtime=$request['fromtime'];
            $doctor->totime=$request['totime'];
            
            $doctor->save();
        
            return redirect('add_doctor')->with('success', 'Doctor information updated successfully.');
        }
        
        

         public function delete_doctor($d_id){
            $doc=model_doctor::find($d_id)->delete();
            return redirect()->back();

         }


         public function getDoctorTime(Request $request, $doctorname)
         {
             // Find the doctor by name
             $doctor = model_doctor::where('name', $doctorname)->first();
     
             if (!$doctor) {
                 return response()->json(['error' => 'Doctor not found'], 404);
             }
     
             // Return the doctor's available time as JSON response
             return response()->json([
                 'fromtime' => $doctor->fromtime,
                 'totime' => $doctor->totime,
             ]);
         }
}
