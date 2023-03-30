<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{

    public function index()
    {
        if (Auth::id()) {
            // wow, end all account, wether admin, student etc with /home
            //so that you can easily return home -same page if uer is logged in and attempt to change the url to index. with this you keep them where you want them to be--dashboard
            return redirect('home');
        }else{
               //compact is a second arguement in in the view method, toreturn an array of all doctors
            $doctors= Doctor::all();
            return view('user.home', compact('doctors'));
        }
     
    }

 
    public function redirect(){       
        if(Auth::id()){
            if(Auth()->user()->usertype==0){
                $doctors= Doctor::all();
                return view('user.home', compact('doctors'));
            }else{
                return view('admin.home');
            }
        }else{
            return redirect()->back();
        }
    }
    public function appointment(Request $request){
        $data= new appointment;
        //name email phone doctor date message status user_id
        

        $request -> validate([
            'name' =>'required|min:3|max:50',
            'email' =>'required|min:4|max:60',
            'phone' =>'required|min:11',
            'doctor' =>'required',
            'date' =>'required|',
            'message' =>'required|min:4|max:200' 
        ]);

        if (!Auth::id()) {
            return redirect()->back();
        }
        
        $data->name = $request->name ;
        $data->email = $request->email ;
        $data->phone = $request->phone ;
        $data->doctor = $request->doctor ;
        $data->date = $request->date ;
        $data->message = $request->message ;
        $data->status = 'In progress';
        $data->user_id = Auth::user()->id;
        $data->save();
        return redirect()->back()->with('message', 'Appointments was received. We will revert soon.');
   

    }

    public function myappointment(){
        if (Auth::id()) {
            $userid= Auth::user()->id;
            $appoints= appointment::where('user_id',$userid)->get();
            return view('user.my_appointment',compact('appoints'));
        }else{
            return redirect()->back();
        }
        
    }

    public function cancel_appoint($id){
       $oneappoint= appointment::find($id);
       $oneappoint->delete();
        return redirect()->back();
    }
    
    

    



    public function logout(){    
        $doctors= Doctor::all();   
        Auth::logout();
            return view('user.home', compact('doctors'));
        
    }
    
}
