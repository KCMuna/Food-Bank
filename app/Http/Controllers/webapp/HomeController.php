<?php

namespace App\Http\Controllers\webapp;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\food;
use App\Review;
use App\Notification;
use Mail;

class HomeController extends Controller// homecontroller using properties of controller class
{
    
    public function index(Request $request)    //redirect to index function

    {
        if(!isset($_SESSION))//check session
        {
            session_start();
        }
        if(isset($_SESSION['userid'])){//check userid and session, if it is set , data of user id displayed
            $data= User::find($_SESSION['userid']);
            $usercity=$data->district;
           
        }else{
            $usercity='';
            
        }
        $foods=DB::table('food')
            ->select('food.*')
            ->where('status','1')->orderBy('id','DESC')->get();
        
        
        return view('webapp.index',compact('foods','usercity'));
    }
    public function register()//register function calling to register new user
    {
        return view('webapp.register');
    }

    public function login()//this is the login function
    {
        return view('webapp.login');
    }
    
    public function changepassword()//this function is used to changepassword
    {
        if(!isset($_SESSION))
      {
         session_start();
      }
        $data=User::find($_SESSION['userid']);
        return view('webapp.change-password',compact('data'));
    }
    
     function resendotp()//this function is used to resend otp using $_GET()
    {
            $email= $_GET['n']; //email ID
            $rndno=rand(100000, 999999); // Generate random OTP
            $_SESSION['userotp']=$rndno; //Store in session

            $data = array('otp'=>"$rndno"); // pass variable in mail file

          Mail::send('webapp.otp-mail',$data, function($message) use($email){
             $message->to($email)->subject
                ('OTP');
             $message->from('durgeshsingh156.ds@gmail.com');
          });
            
            return back()->with('message', 'OTP Sent to your Email!');
        // return back()->with('message', 'OTP Resent to your Phone!');
     
    }
    
   
    function checkotp(Request $request,$id)//this function is used to check otp from user table
    {
            $data= User::find($id);
            if($request->otp==$data->otp){
                if(!isset($_SESSION)) 
                { 
                    session_start(); 
                } 
                $_SESSION['userid'] = $data->id; 
                $_SESSION['username'] = $data->name;
                $_SESSION['userrole'] = $data->role;
                $_SESSION['userphone'] = $data->phone;
                $_SESSION['useremail'] = $data->email;
                $_SESSION['userphoto'] = $data->user_photo;
                $_SESSION['userstatus'] = $data->status;
               
                $data->otp_verified= 'yes';
                $data->save();
                $_SESSION['userotpstatus'] = $data->otp_verified;
                return redirect('/my-location/'.$data->id);
            }else{
                return back()->with('error', 'You have entered Invalid OTP!');
            }

    }
   
    function checklogin(Request $request)//used to checklogin user
    {
        $phone= $request->phone;
        $password= md5($request->password);

        $userdata =  DB::table('users')->where([['phone', $phone],['password', $password],['status', '1']])->get();
       
     if(count($userdata)>0)//if users data is greater than 0 or if it have data this function is called
     {
         if(!isset($_SESSION))
         {
        session_start();
         }
                $_SESSION['userid'] = $userdata[0]->id; 
                $_SESSION['username'] = $userdata[0]->name;
                $_SESSION['userrole'] = $userdata[0]->role;
                $_SESSION['userphone'] = $userdata[0]->phone;
                $_SESSION['useremail'] = $userdata[0]->email;
                $_SESSION['userphoto'] = $userdata[0]->user_photo;
                $_SESSION['userstatus'] = $userdata[0]->status;
                $_SESSION['userotpstatus'] = $userdata[0]->otp_verified;
      
        if(isset($request->remember) && $request->remember == 1)
        {
            setcookie("cemail", $email, time()+(60*60*24));
            setcookie("cpassword", $password, time()+(60*60*24));
        }
        else
        {
        setcookie("Details", "PHP");
        }   
            if($userdata[0]->otp_verified=='yes'){
                return redirect('/'); 
            }else{
               // return redirect('/');
               return redirect('/fill-details/'.$userdata[0]->id);  
            }
      
     }else
     {
      return back()->with('loginerror', 'Invalid Login Credentials!');
     }
    }

   
    public function changeuserpassword(Request $request)//this function is used to change password
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
    
   
    public function allfoods()
    {
        if(isset($_GET['food']) && !empty($_GET['food']) && isset($_GET['location']) && !empty($_GET['location'])){
            $foods=DB::table('food')//food table is called from database
                    ->select('food.*')
                    ->where('category', 'like', '%'.$_GET['food'].'%')->where('location', 'like', '%'.$_GET['location'].'%')->where('status','1')->orderBy('id','DESC')->get();
        }elseif(isset($_GET['food']) && !empty($_GET['food']) && isset($_GET['location']) && empty($_GET['location'])){
            $foods=DB::table('food')
                    ->select('food.*')
                    ->where('category', 'like', '%'.$_GET['food'].'%')->where('status','1')->orderBy('id','DESC')->get();
        }elseif(isset($_GET['food']) && empty($_GET['food']) && isset($_GET['location']) && !empty($_GET['location'])){
            $foods=DB::table('food')
                    ->select('food.*')
                    ->where('location', 'like', '%'.$_GET['location'].'%')->where('status','1')->orderBy('id','DESC')->get();
        }else{
            $foods=DB::table('food')
                    ->select('food.*')//all food is selected and display in descending order
                    ->where('status','1')->orderBy('id','DESC')->get();
        }
        if(!isset($_SESSION))//check session value
        {
            session_start();
        }
        if(isset($_SESSION['userid'])){// checks userid in session
            $data= User::find($_SESSION['userid']);
            $usercity=$data->district;
        }else{
            $usercity='';
        }
        $current_date=date('Y-m-d');
        $alllistings= Food::where('expiry_date',$current_date)->get();
        if(count($alllistings)>0){
            foreach($alllistings as $alllistingsnew){
                $data=Food::find($alllistingsnew->id);
                $data->status='0';
                $data->save();
            }
        }


       
        return view('webapp.all-foods',compact('foods','usercity'));
    }
    public function food($id)//this function is used to call food by id and join users and food data 
    {
        $food=DB::table('food')
        ->leftjoin('users', 'users.id','=','food.created_by')
        ->select('food.*', 'users.id as userid', 'users.name as username', 'users.user_photo as userphoto', 'users.email as useremail')
        ->where('food.id',$id)->first();
        $otherfoods=food::where('id','!=',$id)->orderBy('id','DESC')->get();

        if(!isset($_SESSION))
        {
            session_start();
        }
        if(isset($_SESSION['userid'])){
            $data= User::find($_SESSION['userid']);
            $usercity=$data->district;
        }else{
            $usercity='';
        }
        $allreviews= Review::leftjoin('users', 'users.id', '=', 'reviews.userid')
        ->leftjoin('food', 'food.id', '=', 'reviews.foodid')
        ->select('reviews.*', 'users.name as username')
        ->where('reviews.foodid',$id)->orderBy('reviews.id','DESC')->get();
        $sumofratings=$allreviews->sum('rating');
        // return $sumofratings;
        if (count($allreviews) == 0) {
            $averagerating = 0;
        }else{
            $averagerating = round($sumofratings/count($allreviews),2);
        }

        $onestarreviews = Review::where([
            ['foodid',$id],
            ['rating',1]])->get();
            $onestarreviewscount = count($onestarreviews);
            if ($onestarreviewscount == 0) {
                $onestarreviewspercent = 0;
            }else{
                $onestarreviewspercent = ($onestarreviewscount/count($allreviews))*100;
            }

            $twostarreviews = Review::where([
            ['foodid',$id],
            ['rating',2]])->get();
            $twostarreviewscount = count($twostarreviews);
            if ($twostarreviewscount == 0) {
                $twostarreviewspercent = 0;
            }else{
                $twostarreviewspercent = ($twostarreviewscount/count($allreviews))*100;
            }

            $threestarreviews = Review::where([
            ['foodid',$id],
            ['rating',3]])->get();
            $threestarreviewscount = count($threestarreviews);
            if ($threestarreviewscount == 0) {
                $threestarreviewspercent = 0;
            }else{
                $threestarreviewspercent = ($threestarreviewscount/count($allreviews))*100;
            }

            $fourstarreviews = Review::where([
            ['foodid',$id],
            ['rating',4]])->get();
            $fourstarreviewscount = count($fourstarreviews);
            if ($fourstarreviewscount == 0) {
                $fourstarreviewspercent = 0;
            }else{
                $fourstarreviewspercent = ($fourstarreviewscount/count($allreviews))*100;
            }

            $fivestarreviews = Review::where([
            ['foodid',$id],
            ['rating',5]])->get();
            $fivestarreviewscount = count($fivestarreviews);
            if ($fivestarreviewscount == 0) {
                $fivestarreviewspercent = 0;
            }else{
                $fivestarreviewspercent = ($fivestarreviewscount/count($allreviews))*100;
            }
            if(isset($_SESSION['userid'])){
            $checkpurchase=  DB::table('orders')
            ->select('orders.*')
            ->where('food_id',$id)->where('user_id',$_SESSION['userid'])->get();
                // return $checkpurchase;
                $checkpurchasecount=count($checkpurchase);
            $checkreview= Review::where('userid',$_SESSION['userid'])->where('foodid',$id)
            ->get();
            $checkreviewcount=count($checkreview);
            }else{
                $checkpurchasecount=0;
                $checkreviewcount=0; 
            }
            if($checkpurchasecount>0){
                $purchased="yes";
            }else{
                $purchased="no";
            }
            if($checkreviewcount>0){
                $reviewd="yes";
            }else{
                $reviewd="no";
            }

        return view('webapp.food',compact('food','usercity','otherfoods','allreviews','averagerating','onestarreviewspercent','twostarreviewspercent','threestarreviewspercent','fourstarreviewspercent','fivestarreviewspercent','onestarreviewscount','twostarreviewscount','threestarreviewscount','fourstarreviewscount','fivestarreviewscount','reviewd','purchased'));
    }
    
    function logout()//used to destroy session if exists
    {
        if(!isset($_SESSION)) 
            { 
                session_start(); 
        } 
        session_destroy();
        
        unset($_SESSION['userid']);
        unset($_SESSION['username']);
        unset($_SESSION['userrole']);
        unset($_SESSION['userphone']);
        unset($_SESSION['useremail']);
        unset($_SESSION['usestatus']);
        unset($_SESSION['userphoto']);
        unset($_SESSION['userotpstatus']);
        
     return redirect('/');//redirect to index page
    }

    
    public function sendotp(Request $request)
    {
        
            $rndno=rand(100000, 999999);
            $_SESSION['userotp']=$rndno;
            $email= $request->email;
            $data = array('otp'=>"$rndno");

          Mail::send('webapp.otp-mail',$data, function($message) use($email){
             $message->to($email)->subject
                ('OTP');
             $message->from('durgeshsingh156.ds@gmail.com');
          });
        return redirect('/verify-email?n='.$email)->with('message','OTP is sent to your Email ID!');
    }
    public function verifyemail()
    {
        return view('webapp.verify-email');
    }
    public function verifyuserotp(Request $request)
    {
        
        if($request->otp==$request->uotp){
            $userdata =  DB::table('users')->Where('email','=',$request->email)->get(); 
            if(count($userdata)>0){

                if($userdata[0]->status=='1' && $userdata[0]->otp_verified=='yes'){
                    $_SESSION['userid'] = $userdata[0]->id; 
                $_SESSION['username'] = $userdata[0]->name;
                $_SESSION['userrole'] = $userdata[0]->role;
                $_SESSION['userphone'] = $userdata[0]->phone;
                $_SESSION['useremail'] = $userdata[0]->email;
                $_SESSION['userphoto'] = $userdata[0]->user_photo;
                $_SESSION['userstatus'] = $userdata[0]->status;
                $_SESSION['userotpstatus'] = $userdata[0]->otp_verified;
                    return redirect('/');
                }else{
                    return redirect('/fill-details/'.$userdata[0]->id);
                }
            }else{
                $data= new User();
                $data->email = $request->email;
                $data->role = 'user';
                $data->otp_verified = 'yes';
                $data->save();
                
                return redirect('/fill-details/'.$data->id);
            }
            
        }else{
            return back()->with('error', 'Invalid OTP!');
        }
    }
    public function filluserdetails($id)
    {
        $user=User::find($id);
        return view('webapp.fill-details',compact('user'));
    }
    public function registerform(Request $request)//this function is used to registerform with users data like name, email, phone
    {
            $id=$request->user_id;
                $data= User::find($id);
                $data->name = $request->name;
                $data->email = $request->email;
                $data->phone = $request->phone;
                $data->status = '0';
                //$data->password = md5($request->password);
                $data->role = 'user';
                $data->city = $request->city;
               
                $data->save();

                $_SESSION['userid'] = $data->id; 
                $_SESSION['username'] = $data->name;
                $_SESSION['userrole'] = $data->role;
                $_SESSION['userphone'] = $data->phone;
                $_SESSION['useremail'] = $data->email;
                $_SESSION['userphoto'] = $data->user_photo;
                $_SESSION['userstatus'] = $data->status;
                $_SESSION['userotpstatus'] = $data->otp_verified;

                $msg="New User Registered!";
                $admin= User::where('id','1')->where('role','admin')->first();
               
                    
                        $notification= new Notification();
                        $notification->to_id=$admin->id;
                        $notification->notification=$msg;
                        $url='/admin/users';
                        $notification->url=$url;
                        $notification->save();

                        $data = array('msg'=>"msg",'url'=>"$url");

                        Mail::send('webapp.notification-mail',$data, function($message) use($admin){
                            $message->to($admin->email)->subject
                                ('New User Registration');
                            $message->from('durgeshsingh156.ds@gmail.com');
                        });
                   
            return redirect('/dashboard');
        
    }
    public function about(Request $request){//this is used to redirect to about page
        return view('webapp.about');

    }
    public function contact(Request $request){//this is used to redirect to contact page
        return view('webapp.contact');

    }
   

}
