<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    //
    public function addView(){

        if(Auth::id()){
            if(Auth::user()->usertype==1){
                return view('admin.add_doctor');

            }
            else{
                return redirect()->back();
            }

        }

        else{
            return redirect('login');
        }


        
    }
    public function uploadDoctor(Request $request){
       $doctor = new doctor;

       $image = $request->image;
       $imagename = time().'.'.$image ->getClientOriginalExtension();

       $request->image->move('doctorimage',$imagename);
       $doctor->image = $imagename;

       $doctor->name = $request->name;
       $doctor->phone_number = $request->phone_number;
       $doctor->room = $request->room;
       $doctor->speciality = $request->speciality;

       $doctor->save();

       return redirect()->back()->with('message','Doctor Added Successfully');


    }
    public function ShowAppointments(){

        if(Auth::id()){
            if(Auth::user()->usertype==1){
                
                $data = appointment::all();
                return view ('admin.showAppointments', compact('data'));
            }
            else{
                return redirect()->back();
            }
       
    }
    else{
        return redirect('login');
    }
  

}
    public function ApprovedAppointment($id){
         

        $data= appointment::find($id);

        $data->status ="approved";

        $data->save();

        return redirect()->back();
    }
    public function CanceledAppointment($id){
        $data= appointment::find($id);

        $data->status ="canceled";
        $data->save();

        return redirect()->back();

    }
    public function showDoctors(){
        $data = doctor::all();
        return view('admin.showDoctor', compact('data'));

    }

    public function deleteDoctor($id){
        $data = doctor::find($id);
        $data->delete();

        return redirect()->back();

    }
 
    public function updateDoctor($id){
        $data = doctor::find($id);

        return view('admin.updateDoctor', compact('data'));

    }

    public function editDoctor(Request $request, $id){

        $doctor = doctor::find($id);

        $doctor ->name = $request->name;
        $doctor ->phone_number = $request->phone;
        $doctor ->speciality = $request->speciality;
        $doctor ->room = $request->room;

        $image = $request->image;

        if($image){

            $imagename=time().'.'.$image ->getClientOriginalExtension();
 
            $request->image->move('doctorimage', $imagename);
            $doctor->image = $imagename;

    }

    $doctor -> save();
    
    return redirect()->back()->with('message', 'doctor deteils updated sucessfully');



    }

}
