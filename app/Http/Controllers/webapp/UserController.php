<?php

namespace App\Http\Controllers\webapp;
use Illuminate\Http\Request;
use DB;//use databas
use App\User;
use App\Food;
use App\Message;
use App\Notification;
use App\order;
use Mail;

class UserController extends Controller// usercontroller using properties of controller class
{
 
    function __construct() {
        $this->validate_session();//used to validate session 
    }
    public function dashboard()//dashboard function is called to dispaly details of user, foods
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        $data=User::find($_SESSION['userid']);
        $foods=DB::table('food')
            ->select('food.*')
            ->where('food.created_by',$_SESSION['userid'])->where('food.status','1')->orderBy('food.id','DESC')->get();
        $messages=DB::table('messages')
            ->select('messages.*')
            ->where('messages.to_id',$_SESSION['userid'])->get();
        $orders=DB::table('orders')
            ->select('orders.*')
            ->where('orders.user_id',$_SESSION['userid'])->get();
            $rewardpoints=DB::table('orders')
            ->leftjoin('food', 'food.id','=','orders.food_id')
            ->select('food.reward_points')
            ->where('orders.status','1')->where('orders.user_id',$_SESSION['userid'])->groupBy('food.id')->sum('food.reward_points');
        return view('webapp.dashboard',compact('data','foods','messages','orders','rewardpoints'));
    }
    public function myprofile($id)//used to find profile of user using id 
    {
        $data=User::find($id);
       
        return view('webapp.my-profile',compact('data'));
    }
    public function updateprofile(Request $request,$id)//used to update profile of users
    {
        //return $request;
        $data= User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->city = $request->city;
        $data->updated_at =date("Y-m-d h:i:s");
            if($request->hasfile('user_photo'))//if the user has image existing it will replace this image with new one if updated
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
        
        return back()->with('message', ' Profile Updated successfully!');
    }
    public function createfood()//used to create food uploaded by users
    {
      if(!isset($_SESSION))
      {
         session_start();
      }
        $data=User::find($_SESSION['userid']);
       
        return view('webapp.create-food',compact('data'));
    }

    public function savefood(Request $request)//used to save food
    {
        $data= new Food();//used to create instance of the foood
        $data->category= $request->category;
        $data->description= $request->description;
        $data->quantity= $request->quantity;
        $data->age_limit= $request->age_limit;
        $data->type= $request->type;
        $data->calories= $request->calories;
        $data->expiry_date= $request->expiry_date;
        $data->contact_info= $request->contact_info;
        $data->location= $request->location;
        $data->related_food= $request->related_food;
        $data->reward_points= $request->reward_points;
        $data->created_by= $request->created_by;

            if($request->hasfile('food_image'))
             {
                $name = $request->type.$request->category.$data->quantity;
                $file = $request->file('food_image');
                $extension = $file->getClientOriginalExtension(); // getting logo extension
                $filename =$name.'.'.time().'.'.$extension;
                $filename =  preg_replace('/[^A-Za-z0-9. ]/', '', $filename);
                $path=$file->move('images/food_images/', $filename);
                $data->food_image = $filename;
             }
            $data->save();
   

            $msg="New food Added by User!";
                $admin= User::where('id','1')->where('role','admin')->first();
               
                    
                        $notification= new Notification();
                        $notification->to_id=$admin->id;
                        $notification->notification=$msg;
                        $url='/admin/foods';
                        $notification->url=$url;
                        $notification->save();

                        $data = array('msg'=>"msg",'url'=>"$url");

                        Mail::send('webapp.notification-mail',$data, function($message) use($admin){
                            $message->to($admin->email)->subject
                                ('New food');
                            $message->from('durgeshsingh156.ds@gmail.com');
                        });
            
            return back()->with('message', 'food Added Successfully!');
        
    }

    public function myfoods()// used to create myfood
    {
      if(!isset($_SESSION))
      {
         session_start();// used to start session
      }
        $foods=DB::table('food')//select food table and joins with users table
            ->leftjoin('users', 'users.id','=','food.user_id')
            ->select('food.*', 'users.name as username')
            ->where('food.user_id', $_SESSION['userid'])->groupBy('food.id')->orderBy('food.id','DESC')->get();
        $data=User::find($_SESSION['userid']);
        return view('webapp.my-foods',compact('foods','data'));
    }
    public function deletefood($id){//delete functions is used to delete foods with reference to id
      $data= food::find($id);
      $data->delete();
      return back()->with('message', ' food Deleted successfully!');
  }
  /**
   * checks food active and inactive status of food
   */
  public function foodactivestatus($id)
        {
            $data = food::find($id);
            $data->status = '1';
            $data->save();
            return back()->with('message', ' food Opened successfully!');
        }
   public function foodinactivestatus($id)
        {
            $data = food::find($id);
            $data->status = '0';
            $data->save();
            return back()->with('message', ' food Closed successfully!');
        }


        public function editfood($id)//used to editfood
        {
            if(!isset($_SESSION))
            {
                session_start();
            }
            $food=DB::table('food')//select data of food from food table
            ->select('food.*')
            ->where('id',$id)->first();
            
            $data=User::find($_SESSION['userid']);
            return view('webapp.edit-food',compact('food','data'));
        }
        public function updatefood(Request $request,$id)//used to update food using id of food
        {
            $data= food::find($id);
            $data->category= $request->category;
        $data->description= $request->description;
        $data->quantity= $request->quantity;
        $data->age_limit= $request->age_limit;
        $data->type= $request->type;
        $data->calories= $request->calories;
        $data->expiry_date= $request->expiry_date;
        $data->contact_info= $request->contact_info;
        $data->location= $request->location;
        $data->related_food= $request->related_food;
        $data->reward_points= $request->reward_points;
        $data->created_by= $request->created_by;

            if($request->hasfile('food_image'))
             {
                $name = $request->type.$request->category.$data->quantity;
                $file = $request->file('food_image');
                $extension = $file->getClientOriginalExtension(); // getting logo extension
                $filename =$name.'.'.time().'.'.$extension;
                $filename =  preg_replace('/[^A-Za-z0-9. ]/', '', $filename);
                $path=$file->move('images/food_images/', $filename);
                $data->food_image = $filename;
             }
            $data->save();

                return back()->with('message', 'food Updated Successfully!');
            
        }

    public function mymessages()
    {
      if(!isset($_SESSION))
      {
         session_start();
      }
      $userid=$_SESSION['userid'];
      $messages=  DB::table('messages')
            ->leftjoin('food', 'food.id','=','messages.food_id')
            ->select('messages.*', 'food.category as category', 'food.food_image as food_image')
            ->where('messages.from_id', $userid)->orWhere('messages.to_id', $userid)->groupBy('messages.food_id')->orderBy('messages.id','DESC')->get();

        $data=User::find($userid);
        return view('webapp.my-messages',compact('messages','data'));
    }
    public function viewmessages($foodid, $from, $to)//used to view data with foodid, sender and receiver
    {
      if(!isset($_SESSION))
      {
         session_start();
      }
      $messages= Message::where([['food_id', '=', $foodid],['from_id', '=', $from]])->orWhere([['food_id', '=', $foodid],['to_id', '=', $from]])->orderBy('id','Desc')->get();
        $data=User::find($_SESSION['userid']);
        $food= Food::find($foodid);
        $touser=User::find($to);

        return view('webapp.view-messages',compact('messages','data','food','touser'));
    }

    public function sendmessage(Request $request)// this is used to send message 
    {
        //return $request;
        $user= User::first();
        //return $user;
        $data= new Message();//create instance of message
        $data->from_id = $request->from_id;
        $data->from_name = $request->from_name;
        $data->to_id = $request->to_id;
        $data->to_name = $request->to_name;
         $data->food_id = $request->food_id;
        $data->message = $request->message;
        $data->today_date = date("d-m-Y"); 
        $data->save();

        $msg="You have new message from ".$request->from_name.".";
        $notification=new Notification();//create instance of notifications and storing it to variable
        $notification->to_id=$request->to_id;
        $notification->notification=$msg;
        $url='/view-messages/'.$request->food_id.'/'.$request->to_id.'/'.$request->from_id;
        $notification->url=$url;
        $notification->save();

                        $data = array('msg'=>"msg",'url'=>"$url");
                        $user= User::find($request->to_id);
                        Mail::send('webapp.notification-mail',$data, function($message) use($user){
                            $message->to($user->email)->subject
                                ('New Message');
                            $message->from('durgeshsingh156.ds@gmail.com');
                        });

        return back()->with('message', ' Message Sent successfully!');//
    }

    public function sellfood($foodid, $sellto){
        
        $data= Food::find($foodid);
        $data->sold_to=$sellto;
        $data->status='0';
        $data->save();
        return back()->with('message', ' Food Sold successfully!');
    }
    public function notifications()
    {
      if(!isset($_SESSION))
      {
         session_start();
      }
        $notifications=DB::table('notifications')
            ->select('notifications.*')
            ->where('to_id',$_SESSION['userid'])->orderBy('id','DESC')->get();
        $data=User::find($_SESSION['userid']);
        return view('webapp.notifications',compact('notifications','data'));
    }


    public function orders()
    {
      if(!isset($_SESSION))
      {
         session_start();
      }
        $orders=DB::table('orders')
            ->leftjoin('users', 'users.id','=','orders.user_id')
            ->leftjoin('food', 'food.id','=','orders.food_id')
            ->select('orders.*', 'food.category as category', 'food.food_image as food_image', 'food.quantity as quantity', 'food.location as location', 'food.id as food_id', 'food.created_by as created_by')
            ->where('orders.user_id', $_SESSION['userid'])->orWhere('food.created_by', $_SESSION['userid'])->groupBy('food.id')->orderBy('food.id','DESC')->get();
        $data=User::find($_SESSION['userid']);
        return view('webapp.orders',compact('orders','data'));
    }

    public function foodremove($id){//used to remove food
        $data= Order::find($id);//find order from order  table using id 
        $data->delete();
        return back()->with('message', ' food Removed from order successfully!');
    }

    public function orderconfirmstatus($id)
        {
            $data = Food::find($id);
            $data->status = '1';
            $data->save();
            return back()->with('message', ' Food Order Accepted successfully!');
        }
   public function ordercancelstatus($id)//use to cancel orderstatus
        {
            $data = Food::find($id);//find food data from food table using id
            $data->status = '0';
            $data->save();
            return back()->with('message', ' Food Order Cancelled successfully!');
        }

    public function addtoorder($foodid, $userid){//used to accept order
        $data= new Order();//create instance of order
        $data->user_id=$userid;
        $data->food_id=$foodid;
        $data->save();//used to save data 
        return back()->with('message', ' food Added to order successfully!');
    }

    public function acceptorder(Request $request){//use for acepting order
        if(!isset($_SESSION))
      {
         session_start();
      }
        $data= new Order();
        $data->user_id=$_SESSION['userid'];
        $data->food_id=$request->food_id;
        $data->status='Accepted';
        $data->save();
        return back()->with('message', ' Food order accepted successfully!');
    }

}
