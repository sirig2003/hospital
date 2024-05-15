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
                'image'=>'image|mimes:png,jpg,jpeg|max:2048'
        ]);
    
        $doctor= new doctor;
        $image= $request->image;

        if ($image) {
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $image->move('doctorimage', $imagename);
                 $doctor->image = $imagename;
        }
        
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
                        return redirect()->back();
                }
        }else{
                return redirect('login');
        }
        
        if(request('search')){
                $appoints= appointment::where('name', 'like', '%'.request('search').'%')
                ->orwhere('date', 'like', '%'.request('search').'%') 
                ->orwhere('status', 'like', '%'.request('search').'%')
                ->get();
        }else{
              //$appoints= appointment::all();
                $appoints= appointment::paginate(20);   
        }
       
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


        if(request('search')){
                $viewdoc= doctor::where('name', 'like', '%'.request('search').'%')
                ->orwhere('room', 'like', '%'.request('search').'%') 
                -> get();
        }else{
                $viewdoc= doctor::paginate(20); 
                //$viewdoc= doctor::all()->simplePaginate(3);
        }
        
       
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
                'room' =>'required',
                'image'=>'image|mimes:png,jpg,jpeg|max:2048'

        ]);

        $doc= doctor::find($id);
        
        $doc->name  = $request-> name ;
        $doc->phone  = $request->phone ;
        $doc->specialty  = $request->specialty ;
        $doc->room  = $request->room ;
        
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
                        return redirect()->back();
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
     
//    start
//      public function practice(){
//         $sample= user::where(['name'=>'GAbriel'])->orWhere(['email'=>'gagga'])->update(['name'=>'Ameachi']);
//         user::table('users')->avg();
//         if($request->hasFile('file')){
//                 $file= Storage->putFile($request('file'));
//                 Request::ip();
//         };
//         cookie::put('key','value');
//         cookie::get('key');
//         cookie::forget('key');
//         cashe::has('key')
//          composer create-project laravel/laravel project

//         doctor::whereBetween('regat', [fir,second])->get()
//         config::get(constant NAMES)
//         Model::connection()->enaibleQueryLog()
//         $qlog= model::getQueryLog()
//         Route::get('list', 'anything@list')
//         php artisan make:provider ServicePr....
//         doctor::whereBetween('field', ['date1', 'date2'])

//         App\Http\Middleware\VerifyCsrfToken.php
//         public $except=[
//                 'rouee'
//         ]

//         }

//         php artisan make:middleware UserMiddleware

//         session()->put('key, 'value)
//         session()->get('key')
//         session()->forget('key')

//         use SoftDeletes 
//         protected $dates=[
//                 'delete_at'
//         ]
//         $del = db::where(['dete'=>'value'])
//         $del->delete() of softDeletes

//         Cookies::put('key', 'value')
//         Cookies::get('key')
//         Cookies::forget('key')
//         Cache::has('key')

//         request()->route()->getActionMethod()

//         request()->ip()

//         if(request->hasFile('name')){
//             $file= Storage::putFile('path', $ßrequest->'imgfield')    
//         }



//         doctor::insertOrUpdate([''=>''],[])
//         SChema::hasTable('')
//         Scheme::hasColumn('','')
//         request()->route()->getName()
//         protected $table= 'admin'
//         if($request->ajax())
//         if($request->has('email'))

        

// end
     
}
