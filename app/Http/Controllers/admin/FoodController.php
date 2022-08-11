<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;//using database
use App\Food;
use Mail;

class FoodController extends Controller// Foodcontroller using properties of controller class
{
 
    function __construct() {//creating constructor
        $this->validate_session();
    }
        /**Creating addfood function for adding food */
    public function addfood()
    {
      if(!isset($_SESSION))
      {
         session_start();
      }
       
        return view('admin.addfood');
    }
//calling savefood function for saving food
    public function savefood(Request $request)
    {
        $data= new Food();// creating instance of food and store data into $data variable
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

            return back()->with('message', 'Food Added Successfully!');
        
    }
/**calling foods function and joining food table with users table
 *  and group them by food id and arranging in descending order */
    public function foods()
    {
      if(!isset($_SESSION))
      {
         session_start();
      }
        $foods=DB::table('food')//using food database table
            ->leftjoin('users', 'users.id','=','food.created_by')
            ->select('food.*', 'users.name as username')
            ->groupBy('food.id')->orderBy('food.id','DESC')->get();
        
        return view('admin.foods',compact('foods'));
    }
    public function deletefood($id){//calling delete function for deleting food through id
      $data= Food::find($id);
      $data->delete();
      return back()->with('message', ' Food Deleted successfully!');
  }
  /**
     * calling foodactivestatus function for making food active
     */
  public function foodactivestatus($id)
        {
            $data = Food::find($id);
            $data->status = '1';//status true
            $data->save();
            return back()->with('message', ' Food Activated successfully!');
        }
        /**
     * calling foodinactivestatus function for making food inactive
     */
   public function foodinactivestatus($id)
        {
            $data = Food::find($id);
            $data->status = '0';//status false
            $data->save();
            return back()->with('message', ' Food Deactivated successfully!');
        }


        public function editfood($id)//use to edit food
        {
            if(!isset($_SESSION))
            {
                session_start();
            }
            $food=DB::table('food')
            ->select('food.*')
            ->where('id',$id)->first();
            
            return view('admin.edit-food',compact('food'));
        }
        /**calls updatefood funtion for updating foods */
        public function updatefood(Request $request,$id)
        {
            $data= Food::find($id);
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
                return back()->with('message', 'Food Updated Successfully!');
            
        }

  

}
