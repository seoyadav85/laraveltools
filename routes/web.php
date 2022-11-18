<?php

use Illuminate\Support\Facades\Route;
use App\Models\Tools;
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


Route::get('/', 'HomeController@index')->name('home');
// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/sort_text', function () {
    $data = Tools::where('slug','sort_text')->first();
    return view('sort_text',compact('data'));
})->name('sort_text');

Route::get('/convert_text', function () {
    $data = Tools::where('slug','convert_case')->first();
    return view('convert_case', compact('data'));
})->name('convert_case');

Route::get('/find_replace', function () {
    $data = Tools::where('slug','find_replace')->first();
    return view('find_replace', compact('data'));
})->name('find_replace');

Route::get('/reverse_list', function () {
    $data = Tools::where('slug','reverse_list')->first();
    return view('reverse_list', compact('data'));
})->name('reverse_list');

Route::get('/word_count', function () {
    $data = Tools::where('slug','word_count')->first();
    return view('word_count', compact('data'));
})->name('word_count');

Route::get('/prefix_surfix', function () {
    $data = Tools::where('slug','add_prefix_surfix')->first();
    return view('prefix_surfix', compact('data'));
})->name('add_prefix_surfix');

Route::get('/add_line_breaks', function () {
    $data = Tools::where('slug','add_line_break')->first();
    return view('add_line_breaks', compact('data'));
})->name('add_line_break');

Route::get('/reverse_words', function () {
    $data = Tools::where('slug','reverse_words')->first();
    return view('reverse_words', compact('data'));
})->name('reverse_words');

Route::get('/reverse_letters', function () {
    $data = Tools::where('slug','reverse_letters')->first();
    return view('reverse_letters', compact('data'));
})->name('reverse_letters');


Route::get('/remove_line_breaks', function () {
    $data = Tools::where('slug','remove_line_break')->first();
    return view('remove_line_breaks',compact('data'));
})->name('remove_line_break');


Auth::routes();


Route::get('/login', 'Admin\UserController@login')->name('admin.login');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function($router)
{
    Route::get('/', 'UserController@login')->name('admin.login');
    Route::get('/login', 'UserController@login')->name('admin.login');
    Route::post('/do-login', 'UserController@doLogin')->name('admin.dologin');
    Route::get('/logout', 'UserController@logout')->name('admin.logout');
});


 Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function($router)
{
    Route::get('/change-password', 'UserController@changePassword')->name('admin.user.changePassword');
    Route::post('/changepassword', 'UserController@doChangePassword')->name('admin.user.doChangePassword');
    Route::get('/dashboard', 'UserController@dashboard')->name('admin.dashboard');
    Route::get('/user-list', 'UserController@index')->name('admin.user.index');
    Route::get('/user-add', 'UserController@create')->name('admin.user.create');
    Route::get('/user-edit/{id}', 'UserController@edit')->name('admin.user.edit');
    Route::post('/user-store', 'UserController@store')->name('admin.user.store');
    Route::post('/user-update', 'UserController@update')->name('admin.user.update');
    Route::get('/user-delete/{id}', 'UserController@delete')->name('admin.user.delete');


    Route::get('/tools-list', 'ToolController@index')->name('admin.tools.index');
    Route::get('/tools-add', 'ToolController@create')->name('admin.tools.create');
    Route::get('/tools-edit/{id}', 'ToolController@edit')->name('admin.tools.edit');
    Route::post('/tools-store', 'ToolController@store')->name('admin.tools.store');
    Route::post('/tools-update', 'ToolController@update')->name('admin.tools.update');
    Route::get('/tools-delete/{id}', 'ToolController@delete')->name('admin.tools.delete');

    Route::get('/tools-delete1/{id}', 'ToolController@delete')->name('admin.tools.delete1');

Route::get('/tools-active/{id}', 'ToolController@activeRecord')->name('admin.tools.activeRecord');
Route::get('/tools-inactive/{id}', 'ToolController@deactiveRecord')->name('admin.tools.deactiveRecord');


    Route::get('/categories-list', 'CategoryController@index')->name('admin.category.index');
    Route::get('/categories-add', 'CategoryController@create')->name('admin.category.create');
    Route::get('/categories-edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
    Route::post('/categories-store', 'CategoryController@store')->name('admin.category.store');
    Route::post('/categories-update', 'CategoryController@update')->name('admin.category.update');
    Route::get('/categories-delete/{id}', 'CategoryController@delete')->name('admin.category.delete');
    Route::get('deactiveRecord/{id}', 'CategoryController@deactiveRecord')->name('admin.category.deactiveRecord');
    Route::get('activeRecord/{id}', 'CategoryController@activeRecord')->name('admin.category.activeRecord');

});
