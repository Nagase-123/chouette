<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;

//use App\Http\Controllers\7_1Controller;
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

/*Route::get('/', function () {
return view('welcome');
});*/
/*
Route::get('/', function () {
return '<html><body><h1>こんにちは</h1></body></html>';
});

*/

use App\Http\Controllers\TestController;
use App\Http\Controllers\MailSendController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;

use Illuminate\Http\Request;

/*メール*/
Route::get('/emails/mailsend',[MailSendController::class,'index']);
Route::get('/emails/contact_mailsend',[TestController::class,'complete']);


/*美容師*/
Route::get('/stylist/stylist_home',[TestController::class,'stylist_home']);
Route::get('/stylist/reservation_history',[TestController::class,'stylist_reservation_history']);
Route::get('/stylist/schedule_add',[TestController::class,'schedule_add']);
Route::get('/stylist/profile_edit',[TestController::class,'profile_edit']);
Route::post('/stylist/schedule_comp',[TestController::class,'schedule_comp']);
Route::get('/stylist/schedule_comp',[TestController::class,'schedule_comp']);
Route::post('/stylist/user_memo',[TestController::class,'user_memo']);
Route::post('/stylist/user_memo_comp',[TestController::class,'user_memo_comp']);
Route::post('/stylist/reservation_cancel',[TestController::class,'reservation_cancel']);
Route::post('/stylist/reservation_cancel_comp',[TestController::class,'stylist_reservation_cancel_comp']);
Route::get('/stylist/schedule_list',[TestController::class,'schedule_list']);
Route::post('/stylist/schedule_delete_comp',[TestController::class,'schedule_delete_comp']);
Route::post('/stylist/profile_edit_comp',[TestController::class,'profile_edit_comp']);


/*ユーザー*/
Route::get('/user_function/user_home',[TestController::class,'user_home']);
Route::post('/user_function/reservation_confirm',[TestController::class,'reservation_confirm']);
Route::post('/user_function/reservation_comp',[TestController::class,'reservation_comp']);
Route::get('/user_function/reservation_history',[TestController::class,'reservation_history']);
Route::post('/user_function/comment_change',[TestController::class,'comment_change']);
Route::post('/user_function/comment_change_comp',[TestController::class,'comment_change_comp']);
Route::post('/user_function/reservation_cancel_comp',[TestController::class,'reservation_cancel_comp']);
Route::post('/user_function/reservation',[TestController::class,'reservation']);
Route::get('/user_function/reservation',[TestController::class,'reservation']);
Route::get('/user_function/user_profile_edit',[TestController::class,'user_profile_edit']);
Route::post('/user_function/user_profile_edit_comp',[TestController::class,'user_profile_edit_comp']);


/*管理者*/
Route::get('/admin/admin_home',[TestController::class,'admin_home']);
Route::post('/admin/admin_home',[TestController::class,'admin_home']);
Route::post('/admin/reservation_detail',[TestController::class,'reservation_detail']);
Route::post('/admin/reservation_cancel_comp_admin',[TestController::class,'reservation_cancel_comp_admin']);
Route::get('/admin/stylist_list',[TestController::class,'stylist_list']);
Route::post('/admin/schedule_list_admin',[TestController::class,'schedule_list_admin']);
Route::post('/admin/schedule_delete_comp_admin',[TestController::class,'schedule_delete_comp_admin']);
Route::post('/admin/reservation_history_stylist',[TestController::class,'reservation_history_stylist']);
Route::get('/admin/member_list',[TestController::class,'member_list']);
Route::post('/admin/stylist_profile_edit',[TestController::class,'stylist_profile_edit']);
Route::get('/admin/stylist_profile_edit',[TestController::class,'stylist_profile_edit']);
Route::post('/admin/stylist_profile_edit_comp',[TestController::class,'stylist_profile_edit_comp']);
Route::post('/admin/stylist_delete_comp',[TestController::class,'stylist_delete_comp']);
Route::post('/admin/reservation_history_admin',[TestController::class,'reservation_history_admin']);
Route::get('/admin/user_profile_edit_admin',[TestController::class,'user_profile_edit_admin']);
Route::post('/admin/user_profile_edit_comp_admin',[TestController::class,'user_profile_edit_comp_admin']);
Route::post('/admin/member_delete_comp',[TestController::class,'member_delete_comp']);
Route::get('/admin/contact_list',[TestController::class,'contact_list']);
Route::post('/admin/contact_detail',[TestController::class,'contact_detail']);
Route::post('/admin/reply_confirm',[TestController::class,'reply_confirm']);
Route::post('/admin/reply_comp',[TestController::class,'reply_comp']);


/*トップ*/
Route::get('/top',[TestController::class,'index1']);
Route::get('/top/signup',[TestController::class,'signup']);
Route::post('/top/signup_confirm',[TestController::class,'signup_confirm']);
Route::post('/top/signup_comp',[TestController::class,'signup_comp']);
Route::get('/top/faq',[TestController::class,'faq']);
Route::get('/top/stylist_signup',[TestController::class,'stylist_signup']);
Route::post('/top/stylist_signup_confirm',[TestController::class,'stylist_signup_confirm']);
Route::post('/top/stylist_signup_comp',[TestController::class,'stylist_signup_comp']);
Route::get('/top/footer',[TestController::class,'footer']);


/*ログイン・ログアウト*/
Route::get('/rogin_rogout/rogin',[TestController::class,'rogin'])->name('login');
Route::post('/rogin_rogout/rogin',[TestController::class,'rogin_confirm']);
Route::get('/rogin_rogout/rogout_comp',[TestController::class,'rogout_comp']);
Route::get('/rogin_rogout/stylist_rogin',[TestController::class,'stylist_rogin']);
Route::post('/rogin_rogout/stylist_rogin',[TestController::class,'stylist_rogin_confirm']);
Route::get('/rogin_rogout/reset_request',[TestController::class,'reset_request']);
Route::post('/rogin_rogout/pass_reset_comp',[TestController::class,'pass_reset_comp']);
Route::post('/rogin_rogout/pass_mailsend_comp',[MailSendController::class,'index']);
Route::get('/rogin_rogout/pass_reset_confirm',[TestController::class,'pass_reset_confirm']);


/*contact*/
Route::get('/contact',[TestController::class,'contact']);
Route::post('/contact/confirm',[TestController::class,'confirm']);
Route::post('/contact/complete',[TestController::class,'complete']);
