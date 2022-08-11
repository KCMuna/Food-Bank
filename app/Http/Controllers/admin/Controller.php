<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController// controller class using features of basecontroller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function __construct() {

    }
/*checking the value of set using isset function if session
 is set with id it redirects to admin page and if not it starts session with session_start()
 */
    function validate_session(){
        if(!isset($_SESSION)) 
            { 
                session_start(); 
        } 
        if(!isset($_SESSION['adminid'])){
            header('Location: /admin');
            exit;
        }
    }
}
