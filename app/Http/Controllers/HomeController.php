<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;


class HomeController extends Controller
{
    //
    public function redirect(){

        if(Auth::id()){

            if(Auth::user()->usertype =='0'){

                $doctor = doctor::all();

                return view('user.home', compact('doctor'));
            }
        else{
            return view('admin.home');
        }
    }
    else{

        return redirect()-> back();
    }
}
     public function index(){

    if(Auth::id()){
        return redirect('home');
    }
    else{
    $doctor = doctor::all();

    return view('user.home', compact('doctor'));
}
}

public function makeappointment(Request $request){

    $data = new appointment;

    $data->name = $request->name;
    $data->phone = $request->number;
    $data->email = $request->email;
    $data->date = $request->date;
    $data->message = $request->message;
    $data->status = "in Progress";
    $data->doctor = $request->doctor;
    if(Auth::id()){
        $data->user_id= Auth::user()->id;

    }
    $data->save();

    return redirect()->back()->with('message', 'Appointment request successfully, we will contact you soon.');
    
    
}

public function myApoitntment(){
    if(Auth::id()){
        $userid=Auth::user()->id;

        $appoint =appointment::where('user_id')->get();

        return view('user.my_aapointment', compact('appoint'));

    }

    else{
        return redirect->back();
    } 
}
public function cancelAppointment($id){
    $data = appointment::find($id);

    $data->delete();

    return redirect()->back();

}
}
