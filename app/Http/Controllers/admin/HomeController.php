<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Food;
use Mail;

class HomeController extends Controller// homecontroller using properties of controller class
{
    function __construct() {
        $this->validate_session();
    }
    /**redirect to dashboard function for fetching the data from the database in to the dashboard of admin panel*/
    public function dashboard()
    {
       $allusers=User::where('role','user')->get();
       $totalusers=count($allusers);
       $foods=DB::table('food')->get();
       $totalfoods=count($foods);
       $openfoods=DB::table('food')->where('status','1')->get();
       $opentotalfoods=count($openfoods);
       $closefoods=DB::table('food')->where('status','!=','1')->get();
       $closetotalfoods=count($closefoods);
    return view('admin.dashboard',compact('totalusers','totalfoods','opentotalfoods','closetotalfoods'));
    // compact function is used to convert a variable to an array, with the variable's name as the array's key and the variable's value as the array's value.
    }
   
}
