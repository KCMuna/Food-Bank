<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;//using database
use App\User;
use App\Notification;
use Mail;

class AdminController extends Controller// admincontroller using properties of controller class
{
    function __construct() {//creating constructor
        $this->validate_session();
    }
    /**Creating changepassword function for changing password with success and error message*/
    public function changepassword(Request $request)
    {
        //return $request;
        
        if($request->password!=$request->confirm_password){
            return back()->with('error', 'Password Do Not Match! '); 
            
        }else{
           $data= User::find($request->userid);
            $data->password = md5($request->password);
           
            $data->save();
           
            return back()->with('message', 'Password Changed Successfully! ');
        }
    }
    /*
    *destroying session 
    */
    function logout()
    {
        if(!isset($_SESSION)) 
            { 
                session_start(); 
        } 
        session_destroy();

        /*
        *unsetting credentials of admin after destroying session
        */
        unset($_SESSION['adminid']);
        unset($_SESSION['adminname']);
        unset($_SESSION['adminrole']);
        unset($_SESSION['adminphone']);
        unset($_SESSION['adminemail']);
        unset($_SESSION['adminstatus']);
        unset($_SESSION['adminphoto']);
        
        
     return redirect('/admin');//redirecting to admin login page
    }

    /**
     * use for notifications calling notification function with id and arranging them in decending order
     */
    public function notifications()
    {
        if(!isset($_SESSION)) 
            { 
                session_start(); 
        } 
        $admin_notifications=Notification::where('to_id',$_SESSION['adminid'])->orderBy('id','DESC')->get();
        $adminnotificationscount=count($admin_notifications);
    return view('admin.notifications',compact('admin_notifications','adminnotificationscount'));
    }
    /**
     * calling activestatus function for making user active
     */
    public function activestatus($id)
        {
            $data = User::find($id);//use user table from database with id
            $data->status = '1';
            $data->save();

            $msg="You have successfully Verified. Please Login to Continue!";
              
                        $notification=new Notification();
                        $notification->to_id=$data->id;
                        $notification->notification=$msg;
                        $url='/login';
                        $notification->url=$url;
                        $notification->save();

                      

            return back()->with('message', ' user Activated successfully!');
        }
         /**
     * calling inactivestatus function for making user inactive
     */
        public function inactivestatus($id)
        {
            $data = User::find($id);//use user table from database with id
            $data->status = '0';
            $data->save();
            return back()->with('message', ' user deactivated successfully!');
        }

}
    
  

