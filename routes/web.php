<?php

use Illuminate\Support\Facades\Route;

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
Route::group(
	['middleware' => ['locale'] ],
	function(){
		Route::get("/","UserController@login")->name("login");
	}
);
//change language
Route::post("langVN","UserController@langVN")->name("user.langVN");
Route::post("langEN","UserController@langEN")->name("user.langEN");

Route::get("checkEmail/{id}/{key}","UserController@checkEmail")->name('checkEmail');
Route::post("checkForgot","UserController@checkForgot")->name('checkForgot');
Route::post("senkey","UserController@senkey")->name('senkey');
Route::post("checkkey","UserController@checkkey")->name('checkkey');
// Route::get("login","UserController@viewlogin")->name("viewlogin");
Route::post("postLogin","UserController@postLogin")->name("postLogin");
Route::post("register","UserController@register")->name("register");

//Auth::routes();
Route::group(
	['middleware' => ['locale'] ],
	function(){
		Route::get('maps/showmap','MapDirectController@showmap')->name('showmap');
		Route::get('maps/processroute','MapDirectController@processroute')->name('processroute');
		Route::get('maps/updpath','MapDirectController@updpath')->name('updpath');
		Route::get('maps.gettimeline','MapDirectController@gettimeline')->name('gettimeline');
		Route::get('maps',function(){
		    return view('recommend_tour');
		})->name("user.maps");
	}
);


Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout','UserController@logout')->name('logout');
Route::group(
	['middleware' => ['userLogin','locale'] ],
	function(){
		//user
		Route::get("dashboard","UserController@dashboard")->name("user.dashboard");
		
		Route::post("feedback","UserController@feedback")->name("user.feedback");
		Route::get("saveTour","UserController@saveTour")->name("user.saveTour");
		Route::post("checkTour","UserController@checkTour")->name("user.checkTour");
		Route::post("checkUser","UserController@checkUser")->name("user.checkUser");
		Route::post("editInfo","UserController@editInfo")->name("user.editInfo");
		Route::get("editTourUser/{id}","AdminController@editTour")->name('user.editTour');
		Route::post("shareTour","UserController@shareTour")->name("user.shareTour");
		
	}
);
Route::group(
	['middleware' => ['userLogin','checkAdmin','locale'] ],
	function(){
		//admin
		Route::get("dashboardAdmin","AdminController@dashboard")->name("admin.dashboard");
		Route::get("showAllAccount","AdminController@showAllAccount")->name("admin.showAllAccount");
		Route::get("feedbackAdmin","AdminController@feedback")->name("admin.feedback");
		Route::get("showAllFeedback","AdminController@showAllFeedback")->name("admin.showAllFeedback");
		Route::post("detaiFeedback/{id}","AdminController@detaiFeedback")->name("admin.detaiFeedback");
		//place
		Route::get("addPlace","AdminController@addPlace")->name("admin.addPlace");
		Route::get("showDestination","AdminController@showDestination")->name("admin.showDestination");
		Route::get("showDestinationVN","AdminController@showDestinationVN")->name("admin.showDestinationVN");
		Route::post("postaddPlace","AdminController@postaddPlace")->name("admin.postaddPlace");
		Route::post("checkPlace","AdminController@checkPlace");
		//edit place
		Route::get("editPlace","AdminController@editPlace")->name("admin.editPlace");
		Route::get("showDestinationEditVN","AdminController@showDestinationEditVN")->name("admin.showDestinationEditVN");
		//remove place
		Route::get("removePlace","AdminController@removePlace")->name("admin.removePlace");
		Route::get("showDestinationRemove","AdminController@showDestinationRemove")->name("admin.showDestinationRemove");
		Route::get("showDestinationRemoveVN","AdminController@showDestinationRemoveVN")->name("admin.showDestinationRemoveVN");
		Route::get("showDetail/{remove}/{lang}","AdminController@showDetail")->name("admin.showDetail");
		Route::get("placeDelete/{remove}","AdminController@placeDelete")->name("admin.placeDelete");
		Route::get("showDestinationEdit","AdminController@showDestinationEdit")->name("admin.showDestinationEdit");
		Route::get("showDetailEdit/{remove}/{lang}","AdminController@showDetailEdit")->name("admin.showDetailEdit");
		Route::post("formEditPlace/{remove}/{lang}","AdminController@formEditPlace")->name("admin.formEditPlace");
		//dash board
		Route::get("generalInfor","AdminController@generalInfor")->name('admin.generalInfor');
		Route::post("getLatLng","AdminController@getLatLng")->name("admin.getLatLng");
		Route::get("updatePath","AdminController@updatePath")->name("admin.updatePath");
		//delete user
		Route::get("deleteAcc/{id}","AdminController@deleteAcc")->name("admin.deleteAcc");
		Route::post("checkUserAdmin","AdminController@checkUserAdmin")->name("admin.checkUserAdmin");
		Route::post("addaccount","AdminController@addaccount")->name("admin.addaccount");
		//language
		Route::post("changeLanguage","AdminController@changeLanguage")->name('admin.changeLanguage');
		Route::get("history","AdminController@history")->name("admin.history");
		Route::get("showAllRoute","AdminController@showAllRoute")->name("admin.showAllRoute");
		Route::get("showAllRouteRating","AdminController@showAllRouteRating")->name("admin.showAllRouteRating");
		
		Route::get("editTour/{id}","AdminController@editTour")->name('admin.editTour');
		Route::get("editRoute/{id}","AdminController@editRoute")->name("user.editRoute");
		Route::post("routeDetail","AdminController@routeDetail")->name("admin.routeDetail");
		Route::post("routeDetail2","AdminController@routeDetail2")->name("admin.routeDetail2");

		Route::post("getEmail","AdminController@getEmail")->name("admin.getEmail");
		Route::post("sendFeedback","AdminController@sendFeedback")->name("admin.sendFeedback");
		Route::get("sharetourDelete/{id}","AdminController@sharetourDelete")->name("admin.sharetourDelete");
	}
);

