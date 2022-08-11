<?php

namespace App\Providers;
use App\Websitecontent;
use Illuminate\Support\ServiceProvider;
use App\Notification;
use App\Food;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!isset($_SESSION)) 
            { 
                session_start(); 
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

        $todaydate= date('Y-d-m');
        $foods=Food::where('expiry_date',$todaydate)->get();
        foreach($foods as $foodsnew){
            $foodsnew=Food::find($foods->id);
            $foodsnew->status='0';
            $foodsnew->save();

            $msg="Your Food is Expired!";
            
                    $notification= new Notification();
                    $notification->to_id=$foodsnew->created_by;
                    $notification->notification=$msg;
                    $url='/notifications';
                    $notification->url=$url;
                    $notification->save();
        }
        if(isset($_SESSION['userid'])){
            $notifications=Notification::where('to_id',$_SESSION['userid'])->orderBy('id','DESC')->get();
            $notificationscount=count($notifications);
            $headersdata = array(
           
                'notifications' => $notifications,
                'notificationscount' => $notificationscount
            );
            
            view()->share('headersdata', $headersdata);
        }
        if(isset($_SESSION['adminid'])){
            $admin_notifications=Notification::where('to_id',$_SESSION['adminid'])->orderBy('id','DESC')->get();
            $adminnotificationscount=count($admin_notifications);
            $adminheadersdata= array(
           
                'adminnotifications' => $admin_notifications,
                'adminnotificationscount' => $adminnotificationscount
            );
            view()->share('adminheadersdata', $adminheadersdata);
        }

    }
}
