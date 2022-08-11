<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Notification;
use Mail;

class UserController extends Controller// usercontroller using properties of controller class
{
    function __construct() {
        $this->validate_session();
    }
    
 
    public function users()// calls user function to select users from user databse table
    {
    	    $users= DB::table('users')
            ->select('users.*')
            ->orderBy('users.id','DESC')->get();
            // User::where('role','user')->orderBy('id','DESC')->get();
           
        return view('admin.users',compact('users'));
    }
    public function adduser()//use to add user
    {
        return view('admin.adduser');
    }
    public function updateuser(Request $request,$id)//use to update user
    {
        //return $request;
        $data= User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->city = $request->city;

        $data->updated_at =date("Y-m-d h:i:s");
        if($request->hasfile('user_photo'))
             {
                $name = $request->name;
                $file = $request->file('user_photo');
                $extension = $file->getClientOriginalExtension(); // getting logo extension
                $filename =$name.'.'.time().'.'.$extension;
                $filename =  preg_replace('/[^A-Za-z0-9. ]/', '', $filename);
                $path=$file->move('webapp-assets/images/user-images/', $filename);
                $data->user_photo = $filename;
             }
             
        $data->save();
        
        return back()->with('message', ' Information Updated successfully!');
    }
    public function edituser($id)//use to edit user
    {
        $userdata = User::find($id);
        return view('admin.edituser',compact('userdata'));
        /* compact function is used to convert a variable to an array,
         with the variable's name as the array's key and the variable's value as the array's value.
         */
    }
    public function deleteuser($id){// this function is used to delete user using id and display message
        $data= User::find($id);
        $data->delete();
        return back()->with('message', ' User Deleted successfully!');
    }

    public function changepassword(Request $request)/// this function is used for changing password
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

    public function saveuser(Request $request)//use to save user creating new instance of user and storing it to $data
    {

           $data= new User();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->city = $request->city;
      
            $data->status = $request->status;
            
            $data->password = md5($request->password);//md5() used for hasing password
            $data->role = 'user';
            $data->otp_verified= 'yes';
            $data->status = '1';
            if($request->hasfile('user_photo'))
             {
                $name = $request->name;
                $file = $request->file('user_photo');
                $extension = $file->getClientOriginalExtension(); // getting logo extension
                $filename =$name.'.'.time().'.'.$extension;
                $filename =  preg_replace('/[^A-Za-z0-9. ]/', '', $filename);
                $path=$file->move('webapp-assets/images/user-images/', $filename);
                $data->user_photo = $filename;
             }
            
            $data->save();
           
            return back()->with('message', ' User registered successfully.');
        
    }
    /**
     * calling activestatus function for making user active
     */
    public function activestatus($id)
        {
            $data = User::find($id);
            $data->status = '1';
            $data->save();

            $msg="You have successfully Verified. Please Login to Continue!";
              
                        $notification=new Notification();
                        $notification->to_id=$data->id;
                        $notification->notification=$msg;
                        $url='/login';
                        $notification->url=$url;
                        $notification->save();

                        $data = array('msg'=>"msg",'url'=>"$url");

                        Mail::send('webapp.notification-mail',$data, function($message) use($data){
                            $message->to($data->email)->subject
                                ('Verification Mail');
                            $message->from('durgeshsingh156.ds@gmail.com');
                        });

            return back()->with('message', ' user Activated successfully!');
        }
        /**
     * calling inactivestatus function for making user inactive
     */
        public function inactivestatus($id)
        {
            $data = User::find($id);
            $data->status = '0';
            $data->save();
            return back()->with('message', ' user deactivated successfully!');
        }

}
