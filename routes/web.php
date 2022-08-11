<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//displaying index page of user account calling index function of Homecontroller
Route::GET('/', 'webapp\HomeController@index');
Route::GET('/index', 'webapp\HomeController@index');

Route::GET('/register', 'webapp\HomeController@register');//displaying register page for user registration
Route::POST('/sendotp', 'webapp\HomeController@sendotp');// used for sending otp by calling sendotp function of homecontroller
Route::GET('/verify-email', 'webapp\HomeController@verifyemail');//verifying email via verifyemail function in the home controller
Route::POST('/verifyuserotp', 'webapp\HomeController@verifyuserotp');//verifying user otp code via this route
Route::GET('/resendotp', 'webapp\HomeController@resendotp');// resending otp to user email by calling resendotp function
Route::GET('/fill-details/{id}', 'webapp\HomeController@filluserdetails');//for filling user details by passing id
Route::POST('/registerform', 'webapp\HomeController@registerform');//display register form

/**
 * check otp with reference to id via checkotp function of home controller
 * Display location with reference to id calling mylocation function of homecontroller
 * display dashboard of a user
 * display profile of the user with reference to id
 * save the user data
 * save user location using saveuserlocation function
 */
Route::POST('/checkotp/{id}', 'webapp\HomeController@checkotp');
Route::GET('/my-location/{id}', 'webapp\HomeController@mylocation');
Route::GET('/dashboard', 'webapp\UserController@dashboard');
Route::GET('/my-profile/{id}', 'webapp\UserController@myprofile');
Route::POST('/update-profile/{id}', 'webapp\UserController@updateprofile');
Route::POST('/saveuser', 'webapp\HomeController@saveuser');
Route::POST('/saveuserlocation/{id}', 'webapp\HomeController@saveuserlocation');

Route::GET('/login', 'webapp\HomeController@login');//display login page of user
Route::POST('/checklogin', 'webapp\HomeController@checklogin');//check authentication and authorization of user 

Route::GET('/upload-food', 'webapp\FoodController@uploadfood');//calling foodcontroller method to upload food
Route::POST('/savefood', 'webapp\FoodController@savefood');///calling foodcontroller method to save food

Route::GET('/all-foods', 'webapp\HomeController@allfoods');//displaying all foods calling homecontroller allfoods method
Route::GET('/about', 'webapp\HomeController@about');//displaying about page
Route::GET('/contact', 'webapp\HomeController@contact');//displaying contact page


Route::GET('/food/{id}', 'webapp\HomeController@food');// use to display data of food using id

Route::GET('/my-foods', 'webapp\FoodController@myfoods');//displaying user uploaded food
Route::GET('/edit-food/{id}', 'webapp\FoodController@editfood');//displaying food information using id for update
Route::POST('/updatefood/{id}', 'webapp\FoodController@updatefood');//updating food via updatefood method of foodcontroller
Route::GET('/deletefood/{id}', 'webapp\FoodController@deletefood');//deleting food using id
Route::GET('/foodinactivestatus/{id}', 'webapp\FoodController@foodinactivestatus');//displaying inactive food
Route::GET('/foodactivestatus/{id}', 'webapp\FoodController@foodactivestatus');//displaying active food

/**
 * use to cancel and confirm order using id calling usercontroller's respective methods
 */
Route::GET('/ordercancelstatus/{id}', 'webapp\UserController@ordercancelstatus');
Route::GET('/orderconfirmstatus/{id}', 'webapp\UserController@orderconfirmstatus');

/**
 * displaying message,and sending message using usercontroller's method
 * use to remove food from admin
 * use to select food to order using food id and user id
 */
Route::GET('/my-messages', 'webapp\UserController@mymessages');
Route::GET('/view-messages/{foodid}/{from}/{to}', 'webapp\UserController@viewmessages');
Route::POST('/sendmessage', 'webapp\UserController@sendmessage');
Route::GET('/orders', 'webapp\UserController@orders');
Route::GET('/foodremove/{id}', 'webapp\UserController@foodremove');
Route::GET('/addtoorder/{foodid}/{userid}', 'webapp\UserController@addtoorder');

Route::POST('/acceptorder', 'webapp\UserController@acceptorder');//use for accepting order 

Route::GET('/sellfood/{foodid}/{sellto}', 'webapp\UserController@sellfood');////////////////////////////////////////////////////////////////////////////////////////////////////
Route::GET('/notifications', 'webapp\UserController@notifications');//use for displaying notification

Route::POST('/sendresetmail', 'webapp\HomeController@sendresetmail');//calling homecontroller method for resetting email

Route::GET('/change-password', 'webapp\HomeController@changepassword');//calling homecontroller method for changing password
Route::GET('/reset-password', 'webapp\HomeController@resetpassword');//calling homecontroller method for resetting password 
Route::POST('/changeuserpassword', 'webapp\HomeController@changeuserpassword');

Route::GET('/logout', 'webapp\HomeController@logout');//session destroy calling logout function of user homecontroller

//Reviews
Route::POST('/adduserreview', 'webapp\ReviewController@adduserreview');//adding review using user's reviewcontroller

//ADMIN
/**
 * displaying admin login page
 * check admin authorization
 * displaying admin dashboard
 * display notification for admin
 */
Route::GET('/admin', 'admin\LoginController@login');
Route::GET('/admin/login', 'admin\LoginController@login');
Route::POST('/admin/checklogin', 'admin\LoginController@checklogin');
Route::GET('/admin/dashboard', 'admin\HomeController@dashboard');
Route::GET('/admin/notifications', 'admin\AdminController@notifications');

//users
/**
 * display all user in admin panel
 * updating user's information by admin
 * deleting user calling admin ->usercontroller's deleteuser method
 * 
 */
Route::GET('/admin/users', 'admin\UserController@users');
Route::POST('/admin/saveuser', 'admin\UserController@saveuser');
Route::GET('/admin/edituser/{id}', 'admin\UserController@edituser');
Route::POST('/admin/updateuser/{id}', 'admin\UserController@updateuser');
Route::GET('/admin/deleteuser/{id}', 'admin\UserController@deleteuser');
Route::GET('/admin/logout', 'admin\AdminController@logout'); //session destroy calling logout function of user homecontroller
Route::GET('/admin/adduser', 'admin\UserController@adduser');//adding user from admin panel 

Route::POST('/changepassword', 'admin\UserController@changepassword');//use for changing password of admin

//calls user inactivestatus and activestatus function of admin->admincontroller using id
Route::GET('/admin/inactivestatus/{id}', 'admin\AdminController@inactivestatus');
Route::GET('/admin/activestatus/{id}', 'admin\AdminController@activestatus');

//foods
Route::GET('/admin/addfood', 'admin\FoodController@addfood');//calls addfodd method of admin->foodcontroller
Route::POST('/admin/savefood', 'admin\FoodController@savefood');//calls savefood method of admin-> foodcontroller
Route::GET('/admin/foods', 'admin\FoodController@foods');//calls foods method of admin->foodcontroller using id
Route::GET('/admin/food/{id}', 'admin\FoodController@food');//calls food method of  admin->foodcontroller using id
Route::GET('/admin/editfood/{id}', 'admin\FoodController@editfood');//calls editfodd method of foodcontroller using id
Route::POST('/admin/updatefood/{id}', 'admin\FoodController@updatefood');//used to update food calling updatefood method with id
Route::GET('/admin/deletefood/{id}', 'admin\FoodController@deletefood');// used to delete food calling deletefood method with id
 

//calls food inactivestatus and activestatus function of admin->admincontroller using id
Route::GET('/admin/foodinactivestatus/{id}', 'admin\FoodController@foodinactivestatus');
Route::GET('/admin/foodactivestatus/{id}', 'admin\FoodController@foodactivestatus');
