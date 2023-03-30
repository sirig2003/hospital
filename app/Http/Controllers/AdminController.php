<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Appointment;

use Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller

{
   public function addview(){
    return view('admin.add_doctor');
   }

   public function redirectforme(){
        if(Auth::id()){
                if(Auth::user()->usertype== 1){
                        $monkeygomarket= true;
                }else{
                        return redirect()->back()();
                }
        }else{
                return redirect('login');
        }
   }

   public function upload(Request $request){
 
        $request -> validate([
                'name' =>'required|min:3|max:50',
                'phone' =>'required',
                'specialty' =>'required',
                'room' =>'required',
                'image'=>'image|size:1024||dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);
    
        $doctor= new doctor;
        $image= $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $image->move('doctorimage', $imagename);

        $doctor->image = $imagename;
        $doctor-> name = $request->name;
        $doctor-> phone = $request->phone;
        $doctor-> specialty = $request->specialty;
        $doctor-> room = $request->room;

        $doctor-> save();
// with()  ... this will put the variable  in a session... with is appropriate, here for error reporting
        return redirect()->back()->with('message','Doctor added successfully');
      
   }

   public function showappointment(){
       // $this->redirectforme();
        if(Auth::id()){

                if(Auth::user()->usertype== 1){
                        $monkeygomarket= true;
                }else{
                        return redirect()->back()();
                }
        }else{
                return redirect('login');
        }
      
        $appoints= appointment::all();
        return view('admin.showappointment',compact('appoints'));
      
    }

    public function approve($id){
        $oneappoint= appointment::find($id);
        $oneappoint->status= 'Approved';
        $oneappoint-> save();
        
         return redirect()->back();
     }

     public function cancel($id){
        $oneappoint= appointment::find($id);
        $oneappoint->status= 'Canceled';
        $oneappoint-> save();
        
         return redirect()->back();
     }
     
     public function viewdoctors(){
        if(Auth::id()){

                if(Auth::user()->usertype== 1){
                        $monkeygomarket= true;
                }else{
                        return redirect()->back()();
                }
        }else{
                return redirect('login');
        }
        
        $viewdoc= doctor::all();
        return view('admin.viewdoctors',compact('viewdoc'));
     }

     

     public function deletedoctor($id){
        $doc= doctor::find($id);
        $doc->delete();
        return redirect()->back();
     }

     public function updatedoctor($id){
        $doc= doctor::find($id);
        return view('admin.update_doctor', compact('doc'));
     }

     public function editdoctor(Request $request, $id){

        $request -> validate([
                'name' =>'required|min:3|max:50',
                'phone' =>'required',
                'specialty' =>'required',
                'room' =>'required|',
                'image'=>'image|size:1024||dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $doc= doctor::find($id);
        
        $doc->name  = $request-> name  ;
        $doc->phone  = $request->phone   ;
        $doc->specialty  = $request->specialty   ;
        $doc->room  = $request->room   ;
        
        $image= $request->image;
        if ($image) {
               $imagename= time().".".$image->getClientOriginalExtension();
                $image->move('doctorimage', $imagename);  
                $doc->image= $imagename;
        }
       $doc->save();
        return redirect()->back()->with('message', 'Doctor updated successfully');
     }


     public function emailview($id){
        if(Auth::id()){

                if(Auth::user()->usertype== 1){
                        $monkeygomarket= true;
                }else{
                        return redirect()->back()();
                }
        }else{
                return redirect('login');
        }

        $data= appointment::find($id);
        return view('admin.email_view',compact('data'));
     }
     
     public function sendemail(Request $request, $id){

        $request -> validate([
                'greeting' =>'required',
                'body' =>'required',
                'actiontext' =>'required',
                'actionurl' =>'required',
                'endpart' =>'required|'
        ]);

        $data= appointment::find($id);

        $details=[
                'greeting'=> $request->greeting,
                'body'=> $request->body,
                'actiontext'=> $request->actiontext,
                'actionurl'=> $request-> actionurl,
                'endpart'=> $request-> endpart 
        ];
        
       notification::send($data, new SendEmailNotification($details));
       return redirect()->back()->with('message','Email sent successfully');

     }
     
     
}
