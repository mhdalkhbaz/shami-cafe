<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller\Backend\ChoclateController;
use App\Http\Controllers\Controller\Backend\UserslogController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

// Route::get('/', function () {
//     return view('welcome');
// });





 


  







Auth::routes();
// ->middleware('can:add product')
;

Route::get('/home', 'HomeController@index')->name('home');







    Route::group(['middleware' => ['role:labuser|admin|supervisor']], function () {
    Route::get('/choclateOrdersAll','Controller\Backend\ChoclateController@allOrders');
    Route::get('/ChoclateOrder_acc/{id}/{branch}','Controller\Backend\ChoclateController@show_acc');
    Route::put('/editChoclateid/{id}', 'Controller\Backend\ChoclateController@editChoclate2');
    Route::get('/editChoclateid/edit/{id}', 'Controller\Backend\ChoclateController@edit2');
    Route::put('/redyChoclateid/{id}/{branch}', 'Controller\Backend\ChoclateController@redyChoclateid');
    
    Route::get('/order/{id}','Controller\Backend\Orders@show');
    Route::post('/order/update/{id}','Controller\Backend\Orders@update')->name('order.update');

    Route::get('/order_acc/{id}','Controller\Backend\Orders@show_acc');

    Route::get('/order_acc','Controller\Backend\Orders@index_acc');
    Route::get('/show_acc','Controller\Backend\Orders@show_acc');
    Route::get('/order_com/{id}','Controller\Backend\Orders@show_com');
    Route::post('/order/update_acc/{id}','Controller\Backend\Orders@update_acc')->name('order.update_acc');
    Route::post('/orders','Controller\Backend\OrderController@store')->name('orders');

    Route::get('/order_update/{id}/{branch_address}','Controller\Backend\Orders@order_update');
    Route::post('/order_update/store','Controller\Backend\Orders@store')->name('req.update');




    });


     


    Route::group(['middleware' => ['role:alluser|admin|supervisor']], function () {
      Route::get('/','Controller\Backend\Reqs@create')->name('reqs');
      Route::get('/chocCreate','Controller\Backend\ChoclateController@create')->name('based');
      Route::get('/choclateOrders','Controller\Backend\ChoclateController@ordersAcc');
      Route::post('/insert', 'Controller\Backend\ChoclateController@insert')->name('insert');
      Route::post('/savs', 'Controller\Backend\Sales@savs')->name('savs');
      Route::put('/editChoclate/{id}', 'Controller\Backend\ChoclateController@editChoclate');
      Route::put('/removeChoclateid/{id}', 'Controller\Backend\ChoclateController@editChoclate');
      Route::get('/choclateOrdersid/{id}','Controller\Backend\ChoclateController@orders');
      Route::get('/editAddOrder/{id}','Controller\Backend\ChoclateController@editAddOrder');
      Route::post('/editAddOrderUpdate/{id}','Controller\Backend\ChoclateController@editAddOrderUpdate');
      Route::get('/choclateOrdersid/edit/{id}','Controller\Backend\ChoclateController@edit');
      Route::get('/req','Controller\Backend\Reqs@index');
      Route::post('/req/store','Controller\Backend\Reqs@store')->name('req.store');
      Route::get('/order','Controller\Backend\Orders@index')->name('orders');
      Route::get('/order/{id}','Controller\Backend\Orders@show');
      Route::post('/login/checklogin', 'Auth\LoginController@checklogin');
      Route::get('/logout', 'Controller\Backend\UserslogController@logout');
    
    });