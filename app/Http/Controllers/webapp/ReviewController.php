<?php

namespace App\Http\Controllers\webapp;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    function adduserreview(Request $request)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        //  return $request->cart_id[0];
        $data= new Review();
        $data->rating= $request->rating;
        $data->review= $request->review;
        $data->userid= $_SESSION['userid'];
        $data->foodid= $request->foodid;
        $data->save();
        return 1;
    }
    
}
