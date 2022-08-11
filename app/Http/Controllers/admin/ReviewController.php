<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Review;

class ReviewController extends Controller// reviewcontroller using properties of controller class
{
    /*checking the value of set using isset function if session
 is start or not
 */
    public function reviews(){
        if(!isset($_SESSION)) 
            { 
                session_start(); //function used for starting session
            } 
        $reviews= DB::table('reviews')
            ->leftjoin('products', 'products.id','=','reviews.productid')
            ->leftjoin('users', 'users.id','=','reviews.userid')
            ->select('reviews.*', 'users.name as username', 'products.cover_image as cover_image', 'products.id as productid', 'products.url as url', 'products.id as productid', 'products.product_name as product_name')
            ->orderBy('reviews.id','DESC')->paginate(10);
           
        return view('admin.reviews',compact('reviews'));
            /*compact function is used to convert a variable to an array,
             with the variable's name as the array's key and the variable's value as the array's value.
*/
    }
}
