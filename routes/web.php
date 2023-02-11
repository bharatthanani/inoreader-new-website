<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\AdminController;

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

Route::get('getAuthToken', [FrontController::class, 'getAuthToken'])->name('getAuthToken');

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('stream-detail/{id}', [FrontController::class, 'streamDetail'])->name('stream-detail');
Route::get('getToken',[FrontController::class,'getToken'])->name('getToken');
Route::get('myfeed/{original_url}', [FrontController::class, 'myfeed'])->where('original_url', '.*')->name('myfeed');
Route::get('myfeed-by-category', [FrontController::class, 'myfeedByCategory'])->where('original_url', '.*')->name('myfeed-by-category');
Route::get('clickbyvideo',[FrontController::class, 'clickbyvideo'])->name('clickbyvideo');
Route::get('search-feed',[FrontController::class, 'searchFeed'])->name('search-feed');
Route::get('searchCategory',[FrontController::class, 'searchCategory'])->name('searchCategory');
Route::get('myfeed-by-category-database',[FrontController::class,'myfeedByCategoryDatabase'])->name('myfeed-by-category-database');
Route::post('subscribe',[FrontController::class,'subscribe'])->name('subscribe');
Route::get('addView',[FrontController::class,'addView'])->name('addView');
Route::post('subscribe1', [FrontController::class,'subscribe1'])->name('subscribe1');

Route::get('show-title-desc', [FrontController::class,'showTitleDesc'])->name('show-title-desc');
Route::get('do-comments', [FrontController::class,'doComments'])->name('do-comments');
Route::get('do-like', [FrontController::class,'doLikes'])->name('do-like');
Route::get('user-login', [FrontController::class,'userLogin'])->name('user-login')->middleware('guest');
Route::get('user-logout', [FrontController::class,'userLogout'])->name('user-logout');
Route::post('authenticate',[FrontController::class,'authenticate'])->name('authenticate');
Route::get('user-register', [FrontController::class,'register'])->name('user-register');
Route::post('register-process', [FrontController::class,'registerProcess'])->name('register-process');

Route::get('privacy-policy', [FrontController::class,'privacyPolicy'])->name('policy');
Route::get('cookie-policy', [FrontController::class,'cookiePolicy'])->name('cookie');
Route::get('terms-conditions', [FrontController::class,'termsConditions'])->name('terms-conditions');
Route::get('about', [FrontController::class,'About'])->name('about');
Route::get('contact-us', [FrontController::class,'contactUs'])->name('contact-us');
Route::post('add-contact-us', [FrontController::class,'AddContactUs'])->name('add-contact-us');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('logouts', function () {
    Auth::logout();
    return redirect('admin/');
})->name('logouts');


Route::controller(LoginController::class)
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'login')->name('login');
        // Route::get('user-register', 'userRegister')->name('user-register');
        Route::post('loginAdminProcess', 'loginAdminProcess')->name('loginAdminProcess');
        Route::post('user-register-process', 'userRegisterProcess')->name('user-register-process');
        
});

Route::group(['middleware' => ['auth']], function () { 
Route::controller(AdminController::class)
    ->prefix('admin')
    ->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('view-videos', 'viewVideos')->name('view-videos');
        Route::post('addVideo', 'addVideo')->name('addVideo');
        Route::get('getVideoUpadate', 'getVideoUpadate')->name('getVideoUpadate');
        Route::get('deleteVideo', 'deleteVideo')->name('deleteVideo');
        Route::get('settings', 'settings')->name('settings');
        Route::post('addSettings', 'addSettings')->name('addSettings');
        Route::get('view_user','view_user')->name('view_user');
        Route::get('get-users', 'getUser')->name('get-users');
        Route::get('view-category', 'viewCategory')->name('view-category');
        Route::get('sub-category/{id}', 'subCategory')->name('sub-category');
        Route::get('all-news', 'allNews')->name('all-news');
        Route::get('privacy-policy', 'privacyPolicy')->name('privacy-policy');
        Route::get('cookie-policy', 'cookiePolicy')->name('cookie-policy');
        Route::get('terms', 'termsCondition')->name('terms');
        Route::post('addPolicy', 'addPolicy')->name('addPolicy');
        Route::get('about-us', 'AboutUs')->name('about-us');
        Route::post('AddAboutUs', 'AddAboutUs')->name('AddAboutUs');
        
        
 });
});
