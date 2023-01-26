<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\TestController;
use App\Models\Contact;
use App\Models\User;
use App\Models\Hairstylist;
use App\Models\Schedule;
use App\Models\Reservation;

use Illuminate\Support\Facades\DB;

class TestController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


  /*★★★★美容師ここから★★★★*/

  /*
  *美容師 完了画面からGETでhomeに戻る時
  */
  public function stylist_home(Request $request){
    $stylist_id = $request->session()->get('stylist_id');

    $res = new Reservation();
    $reservations = $res->get_reservation($stylist_id);

    //セッションが存在する場合はログイン可能
    if($request->session()->get('mail') !== null){
      return view('stylist.stylist_home',[
        'stylist_id'=>$stylist_id,
        'reservations'=>$reservations,
      ]);
    }else{
      return view('rogin_rogout.stylist_rogin',[
        'msg'=>'再度ログインしてください',
      ]);
    }

  }

  /*
  *美容師　予約一覧
  */
  public function stylist_reservation_history(Request $request){
    //美容師idを取得して紐づく予約を取得する
    $stylist_id = $request->session()->get('stylist_id');
    $res = new Reservation();
    $reservations = $res->get_reservation($stylist_id);

    //セッションが存在する場合はログイン可能
    if($request->session()->get('mail') !== null){
      return view('stylist.reservation_history',[
        'stylist_id'=>$request->session()->get('stylist_id'),
        'reservations'=>$reservations,
      ]);
    }else{
      return view('rogin_rogout.stylist_rogin',[
        'msg'=>'再度ログインしてください',
      ]);
    }

  }

  /*
  *美容師　プロフィール編集
  */
  public function profile_edit(Request $request){
    $stylist_id = $request->session()->get('stylist_id');
    $s = new HairStylist();
    $stylists = $s->get_stylist($stylist_id);

    //セッションが存在する場合はログイン可能
    if($request->session()->get('mail') !== null){
      return view('stylist.profile_edit',[
        'stylist_id'=>$request->session()->get('stylist_id'),
        'stylists'=>$stylists,
      ]);
    }else{
      return view('rogin_rogout.stylist_rogin',[
        'msg'=>'再度ログインしてください',
      ]);
    }

  }

  /*
  *　美容師　プロフィール編集完了
  */
  public function profile_edit_comp(Request $request){

    $request->validate([
      '名前'=>'required|max:10',
      'フリガナ'=>'required|max:10|regex:/^[ァ-ヶー]+$/u',
      '電話'=>'required|digits_between:8,11',
      'メール'=>'required|email',
      '住所'=>'required|max:50',
      '得意スタイル'=>'required|max:90',
      '自己紹介'=>'required|max:300',
    ]);
    //フォームからの入力値を全て取得
    $inputs = $request->all();
    $stylist = new Hairstylist();
    $stylist->update_stylist_profile($inputs);

    return view('stylist.profile_edit_comp',[
      'inputs'=>$inputs,
    ]);
  }

  /*
  *美容師　スケジュール追加
  */
  public function schedule_add(Request $request){

    //セッションが存在する場合はログイン可能
    if($request->session()->get('mail') !== null){
      return view('stylist.schedule_add',[
        'stylist_id'=>$request->session()->get('stylist_id'),
      ]);
    }else{
      return view('rogin_rogout.stylist_rogin',[
        'msg'=>'再度ログインしてください',
      ]);
    }
  }

  /*
  *美容師　ユーザーメモ編集
  */
  public function user_memo(Request $request){
    //フォームからの入力値を全て取得
    $inputs = $request->all();
    $users = User::where('user_id', $inputs['user'])->get();

    return view('stylist.user_memo',[
      'users'=>$users,
    ]);
  }

  /*
  *美容師　ユーザーメモ編集完了
  */
  public function user_memo_comp(Request $request){
    //user_idが一緒かを確かめた上でメモをupdateする
    $inputs = $request->all();
    $user = new User();
    $user->update_memo($inputs);
    return view('stylist.user_memo_comp');
  }

  /*
  *美容師　予約キャンセル完了
  */
  public function stylist_reservation_cancel_comp(Request $request){
    $inputs = $request->all();
    $reservation = new Reservation();
    $reservation->update_cancel_memo($inputs);
    //予約IDに紐づく情報を取得
    $anser = $reservation->get_res($inputs);
    //上記情報をスケジュールに渡す
    $schedule = new Schedule();
    $test = $schedule->cancel_schedule_res($anser);

    return view('stylist.reservation_cancel_comp',[
      'test'=>$test,
    ]);
  }

  /*
  *美容師　スケジュール登録完了
  */
  public function schedule_comp(Request $request){
    $request->validate([
      'date_add'=>'required|date|after:today',
    ]);

    //フォームからの入力値を全て取得
    $inputs = $request->all();
    $schedule = new Schedule();

    $anser = $schedule->check_schedule($inputs);
    if($anser == 'true'){
      $schedule->update_schedule($inputs);
    }else if($anser == 'false'){
      $schedule->insert_schedule($inputs);
    }else{
      $anser ='trueでもfalseでもない';
    }

    return view('stylist.schedule_comp',[
      'inputs'=>$inputs,
      'anser'=>$anser,
    ]);
  }

  /*
  *美容師　予約キャンセル（確認）
  */
  public function reservation_cancel(Request $request){
    $inputs = $request->all();
    $reservations = Reservation::where('reservation_id', $inputs['res_id'])->where('user_id', $inputs['user_id'])->get();
    return view('stylist.reservation_cancel',[
      'reservations'=>$reservations,
    ]);
  }

  /*
  *美容師　スケジュール一覧
  */
  public function schedule_list(Request $request){
    $stylist_id = $request->session()->get('stylist_id');
    $schedule = new Schedule();
    $results = $schedule->get_schedule($stylist_id);

    //セッションが存在する場合はログイン可能
    if($request->session()->get('mail') !== null){
      return view('stylist.schedule_list',[
        'results'=>$results,
        'stylist_id'=>$request->session()->get('stylist_id'),
      ]);
    }else{
      return view('rogin_rogout.stylist_rogin',[
        'msg'=>'再度ログインしてください',
      ]);
    }
  }

  /*
  *美容師　スケジュール削除完了
  */
  public function schedule_delete_comp(Request $request){
    //時間 日付 stylistが格納されている
    $inputs = $request->all();
    $schedule = new Schedule();
    $anser = $schedule->delete_schedule($inputs);
    return view('stylist.schedule_delete_comp',[
      'inputs'=>$inputs,
      'anser'=>$anser,
    ]);
  }
  /*★★★★美容師ここまで★★★★*/


  /*★★★★管理者ここから★★★★*/

  /*
  *管理者　ホーム画面
  */
  public function admin_home(Request $request){
    $result = $request->session()->get('result');
    $res = new Reservation();
    //未来の予約を全て取得する
    $reservations = $res->get_future_reservation_all();

    //セッションが存在する場合はログイン可能
    if($request->session()->get('mail') !== null){
      return view('admin.admin_home',[
        'result'=>$result,
        'reservations'=>$reservations,
      ]);
    }else{
      return view('rogin_rogout.rogin',[
        'msg'=>'再度ログインしてください',
      ]);
    }
  }

  /*
  *管理者　予約キャンセル
  */
  public function reservation_cancel_comp_admin(Request $request){
    $inputs = $request->all();
    $r = new Reservation();
    $r->cancel_reservation_admin($inputs);
    //予約IDに紐づく予約情報を取得
    $anser = $r->get_res($inputs);
    //上記情報をスケジュールに渡す
    $schedule = new Schedule();
    $result = $schedule->cancel_schedule_res($anser);

    return view('admin.reservation_cancel_comp_admin');
  }

  /*
  *管理者　予約詳細（ユーザー・美容師・予約詳細全て見られる）
  */
  public function reservation_detail(Request $request){
    $res = new Reservation();
    //予約IDに紐づく予約情報を取得
    $reservations = $res->get_res($request);
    $users;
    $stylists;

    foreach($reservations as $reservation){
      //予約に紐づく会員情報を取得
      $u = new User();
      $id = $reservation->user_id;
      $users = $u->get_user($id);

      //予約に紐づく美容師情報を取得
      $stylist_id = $reservation->hairstylist_id;
      $s = new Hairstylist();
      $stylists = $s->get_stylist($stylist_id);
    }

    if($request->session()->get('mail') !== null){
      return view('admin.reservation_detail',[
        'reservations'=>$reservations,
        'users'=>$users,
        'stylists'=>$stylists,
      ]);
    }else{
      return view('rogin_rogout.rogin',[
        'msg'=>'再度ログインしてください',
      ]);
    }
  }

  /*
  *管理者　美容師一覧
  */
  public function stylist_list(Request $request){
    //フラグ＝1　登録中　フラグ＝2　論理削除
    $cond = ['hairstylist_flg' => '1'];

    //登録中の美容師情報を全て取得する
    $stylists = Hairstylist::where($cond)->get();

    //セッションがあればログイン可能
    if($request->session()->get('mail') !== null){
      return view('admin.stylist_list',[
        'stylists'=>$stylists,
      ]);
    }else{
      return view('rogin_rogout.rogin',[
        'msg'=>'再度ログインしてください',
      ]);
    }
  }

  /*
  *管理者　スケジュール一覧
  */
  public function schedule_list_admin(Request $request){
    $stylist_id = $request['stylist_id'];
    $schedule = new Schedule();
    $results = $schedule->get_schedule($stylist_id);

    return view('admin.schedule_list_admin',[
      'stylist_id'=>$stylist_id,
      'results'=>$results,
    ]);
  }

  /*
  *管理者　スケジュール削除
  */
  public function schedule_delete_comp_admin(Request $request){
    //予約時間 予約日 stylistが格納されている
    $inputs = $request->all();
    $schedule = new Schedule();
    $anser = $schedule->delete_schedule($inputs);
    return view('admin.schedule_delete_comp_admin',[
      'inputs'=>$inputs,
      'anser'=>$anser,
    ]);
  }

  /*
  *管理者　美容師別　予約履歴一覧
  */
  public function reservation_history_stylist(Request $request){
    //美容師idを取得してget_reservationをする
    $stylist_id = $request['stylist_id'];
    $res = new Reservation();
    $results = $res->get_reservation($stylist_id);
    return view('admin.reservation_history_stylist',[
      'stylist_id'=>$stylist_id,
      'results'=>$results,
    ]);
  }

  /*
  *管理者　ユーザー　一覧
  */
  public function member_list(Request $request){
    //登録中の会員のみ
    $cond = ['user_flg' => '0'];

    $users = User::where($cond)->get();
    //セッションがあればログイン可能
    if($request->session()->get('mail') !== null){
      return view('admin.member_list',[
        'users'=>$users,
      ]);
    }else{
      return view('rogin_rogout.rogin',[
        'msg'=>'再度ログインしてください',
      ]);
    }
  }

  /*
  *管理者　美容師プロフィール編集
  */
  public function stylist_profile_edit(Request $request){

    if(isset($request['stylist_id'])){
      session()->put('stylist_id',$request['stylist_id']);
    }

    $stylist_id =session()->get('stylist_id');

    $s = new HairStylist();
    $stylists = $s->get_stylist($stylist_id);
    return view('admin.stylist_profile_edit',[
      'stylist_id'=>$stylist_id,
      'stylists'=>$stylists,
    ]);
  }

  /*
  *管理者　美容師プロフィール編集完了
  */
  public function stylist_profile_edit_comp(Request $request){
    $request->validate([
      '名前'=>'required|max:10',
      'フリガナ'=>'required|max:10|regex:/^[ァ-ヶー]+$/u',
      '電話'=>'required|digits_between:8,11',
      'メール'=>'required|email',
      '住所'=>'required|max:50',
      '得意スタイル'=>'required|max:90',
      '自己紹介'=>'required|max:300',
    ]);
    //フォームからの入力値を全て取得
    $inputs = $request->all();
    $stylist = new Hairstylist();
    $stylist->update_stylist_profile($inputs);

    return view('admin.stylist_profile_edit_comp',[
      'inputs'=>$inputs,
    ]);
  }

  /*
  *管理者　美容師会員削除
  */
  public function stylist_delete_comp(Request $request){
    $inputs = $request['stylist_id'];
    $stylist = new Hairstylist();
    $stylist->delete_stylist($inputs);
    return view('admin.stylist_delete_comp');
  }

  /*
  *管理者　ユーザー別　予約履歴一覧
  */
  public function reservation_history_admin(Request $request){
    $u_id = $request['u_id'];
    $request->session()->put('u_id',$u_id);
    $reservation = new Reservation();
    //ユーザーIDに紐づく予約情報を取得
    $results = $reservation->get_reservation_list($u_id);
    return view('admin.reservation_history_admin',[
      'u_id'=>$u_id,
      'results'=>$results,
    ]);
  }

  /*
  *管理者　ユーザー　プロフィール編集
  */
  public function user_profile_edit_admin(Request $request){
    //$_GET['user_id']
    $u_id = $request['user_id'];
    $users = new User();
    $results = $users->get_user($u_id);
    //セッションがあればログイン可能
    if($request->session()->get('mail') !== null){
      return view('admin.user_profile_edit_admin',[
        'results'=>$results,
      ]);
    }else{
      return view('rogin_rogout.rogin',[
        'msg'=>'再度ログインしてください',
      ]);
    }
  }

  /*
  *管理者　ユーザー　プロフィール編集完了
  */
  public function user_profile_edit_comp_admin(Request $request){
    $request->validate([
      '名前'=>'required|max:10',
      'フリガナ'=>'required|max:10|regex:/^[ァ-ヶー]+$/u',
      '電話'=>'nullable|digits_between:8,11',
      'メール'=>'required|email',
      '住所'=>'required|max:50',
    ]);
    //フォームからの入力値を全て取得
    $inputs = $request->all();
    $users = new User();
    //update
    $users->update_user_profile($inputs);
    return view('admin.user_profile_edit_comp_admin');
  }

  /*
  *管理者　ユーザー　会員削除
  */
  public function member_delete_comp(Request $request){
    $inputs = $request['user_id'];
    $user = new User();
    $res = new Reservation();
    //生きている予約がある場合はreservationに代入
    $reservation = $res->check_reservation($inputs);

    if($reservation->isEmpty()){
      $user->delete_user($inputs);
      $anser = '会員削除が完了しました';
    }else{
      $anser = '会員削除に失敗しました。
      予約がある場合は予約をキャンセルする必要があります。';
    }
    return view('admin.member_delete_comp',[
      'anser'=>$anser,
      'reservation'=>$reservation,
    ]);
  }

  /*
  *管理者　お問い合わせ一覧
  */
  public function contact_list(){
    $contacts = Contact::all();
    return view('admin.contact_list',[
      'contacts'=>$contacts,
    ]);
  }

  /*
  *管理者　お問い合わせ　詳細
  */
  public function contact_detail(Request $request){
    $contact = new Contact();
    $results = $contact->get_contact($request);
    return view('admin.contact_detail',[
      'results'=>$results,
    ]);
  }

  /*
  *管理者　お問い合わせ　返信内容確認
  */
  public function reply_confirm(Request $request){
    $results = $request->all();
    return view('admin.reply_confirm',[
      'results'=>$results,
    ]);
  }

  /*
  *管理者　お問い合わせ　返信完了
  */
  public function reply_comp(Request $request){
    $results = $request->all();
    $data = [ ];

    Mail::send('emails.contact_mailsend', $data, function($message)use($results){
      $text = $results['textarea_box'];
      session()->put('text',$text);
      $mail = $results['mail'];
      $message->to($mail, 'Test')
      ->from('XXXXX@XXXXX.co.jp','Reffect')
      ->subject('お問い合わせの件について');
    });
    $contact = new Contact();
    //メール送信が完了したらフラグを変える
    $contact->update_flg($results['contact_id']);

    return view('admin.reply_comp',[
      'results'=>$results,
    ]);
  }

  /*★★★★管理者ここまで★★★★*/

  /*★★★★トップ　ここから★★★★*/

  /*
  *トップページ　
  */
  public function index1(Request $request){
    $items =DB::select('select * from users');
    return view('top.index1',['items'=>$items]);
  }

  /*
  *faq　
  */
  public function faq(){
    return view('top.faq');
  }

  /*
  *トップ　ユーザー 新規会員登録　確認
  */
  public function signup_confirm(Request $request){
    //バリデーション
    $request->validate([
      '名前'=>'required|max:10',
      'フリガナ'=>'required|max:10|regex:/^[ァ-ヶー]+$/u',
      '電話番号'=>'nullable|numeric|digits_between:8,11',
      'メール'=>'required|email',
      '住所'=>'required|max:50',
      'password'=>'confirmed:password,required|min:10|max:20',
    ]);

    //フォームからの入力値を全て取得
    $inputs = $request->all();
    $users = new User();
    $mail = $inputs['メール'];
    //会員登録があればuserにはIDが入る
    $user = $users->get_user_id($mail);
    $anser;
    //anserがtrueなら新規会員登録できる
    if($user->isEmpty()){
      $anser = true;
    }else{
      //userに値が入っている場合は会員登録あり
      $anser = false;
    }

    //確認ページに表示
    //入力値を引数に渡す
    return view('top.signup_confirm',[
      'inputs'=>$inputs,
      'anser'=>$anser,
      'user'=>$user,
      'mail'=>$mail,
    ]);
  }

  /*
  *トップ　美容師 新規会員登録　確認
  */
  public function stylist_signup_confirm(Request $request){
    //バリデーション
    $request->validate([
      '名前'=>'required|max:10',
      'フリガナ'=>'required|max:10|regex:/^[ァ-ヶー]+$/u',
      '電話'=>'required|digits_between:8,11',
      'メール'=>'required|email',
      '住所'=>'required|max:50',
      'password'=>'confirmed:password,required|min:10|max:20',
      '得意スタイル'=>'required|max:90',
      '自己紹介'=>'required|max:300',
    ]);
    //フォームからの入力値を全て取得
    $inputs = $request->all();

    $stylists = new HairStylist();
        $mail = $inputs['メール'];
        //会員登録があればstylistには美容師のデータが入る
        $stylist = $stylists->get_stylist_id($mail);
        $anser;
        //anserがtrueなら新規会員登録できる
        if($stylist->isEmpty()){
          $anser = true;
        }else{
          //stylistに値が入っている場合は会員登録あり
          $anser = false;
        }

    //確認ページに表示
    //入力値を引数に渡す
    return view('top.stylist_signup_confirm',[
      'inputs'=>$inputs,
      'anser'=>$anser,
      'stylist'=>$stylist,
      'mail'=>$mail,
    ]);
  }

  /*
  *　トップ 美容師会員登録完了　
  */
  public function stylist_signup_comp(Request $request){
    $inputs = $request->all();
    $stylist = new Hairstylist();
    $stylist->insert_stylist($inputs);

    return view('top.stylist_signup_comp',[
      'inputs'=>$inputs,
    ]);
  }

  /*
  *　トップ 　ユーザー新規会員登録完了　
  */
  public function signup_comp(Request $request){
    $inputs = $request->all();
    $user = new User();
    $anser;
    $heading;
    //メールアドレスの登録有無を調べる
    $id = $user->get_user_id($inputs['mail']);
    if($id->isNotEmpty()){
      $anser = '既に会員登録があります';
    }else{
      $user->insert($inputs);

      $anser = '会員登録が完了しました';
    }

    return view('top.signup_comp',[
      'inputs'=>$inputs,
      'anser'=>$anser,
    ]);

  }

  /*
  *トップ　ユーザー新規会員登録
  */
  public function signup(){
    return view('top.signup');
  }

  /*★★★★トップ　ここまで★★★★*/

  /*★★★★ログイン関連　ここから★★★★*/

  /*
  *　ログイン関連 美容師ログイン　
  */
  public function stylist_signup(Request $request){

    //セッションがあればログイン可能
    if($request->session()->get('mail') !== null){
      return view('top.stylist_signup');
    }else{
      return view('rogin_rogout.rogin',[
        'msg'=>'再度ログインしてください',
      ]);
    }
  }

  /*
  *　ログイン関連 ユーザーログイン　
  */
  public function rogin_confirm(Request $request){
    $request->validate([
      'mail'=>'required',
      'pass'=>'required',
    ]);

    //DBに存在するかを確認する必要があり
    $mail = $request['mail'];
    $pass = $request['pass'];

    $user = new User();
    $result = $user->check_users($mail,$pass);

    //メールアドレスをセッションに入れる
    $request->session()->put('mail',$mail);

    //DBに会員が存在するか確かめたうえで、
    //flgが0ならユーザーホーム画面へ
    if($result == 0){
      $inputs = Schedule::orderBy('schedule_date','asc')->get();

      $cond = ['hairstylist_flg' => '1'];
      $stylists = HairStylist::where($cond)->get();

      $users = $user->get_user_id($mail);
      //  $u_id;
      foreach($users as $user){
        $u_id = $user->user_id;
        $request->session()->put('u_id',$u_id);
      }
      //セッションがあればログイン可能
      if($request->session()->get('mail') !== null){
        return view('user_function.user_home',[
          'u_id'=>$request->session()->get('u_id'),
          'stylists'=>$stylists,
        ]);
      }else{
        return view('rogin_rogout.rogin',[
          'msg'=>'再度ログインして下さい',
        ]);
      }

      //管理者情報でログインされた場合
    }else if($result == 10){
      $request->session()->put('result',$result);
      $res = new Reservation();
      //未来の予約を全て取得する
      $reservations = $res->get_future_reservation_all();
      //セッションがあればログイン可能
      if($request->session()->get('mail') !== null){
        return view('admin.admin_home',[
          'result'=>$result,
          'reservations'=>$reservations,
        ]);
      }else{
        return view('rogin_rogout.rogin',[
          'msg'=>'再度ログインして下さい',
        ]);

      }

    }else{
      return view('rogin_rogout.rogin',[
        'msg'=>'メールアドレスかパスワードが正しくありません',
      ]);
    }

  }

  /*
  *　ログイン関連 パスワード再発行依頼　
  */
  public function reset_request(){
    return view('rogin_rogout.reset_request');
  }

  /*
  *　ログイン関連 パスワード再設定　
  */
  public function pass_reset_confirm(Request $request){
    //urlの値を取得
    $token_url = $request['token'];
    $token = session()->get('token');
    $user_id = session()->get('user_id');
    $stylist_id = session()->get('stylist_id');
    $anser;
    $result;

    if($token_url == $token){
      $anser = '新しいパスワードを入力してください';
      $result = true;
    }else{
      $anser = '有効期限が切れています';
      $result = false;
    }

    return view('rogin_rogout.pass_reset_confirm',[
      'anser'=>$anser,
      'result' => $result,
      'user_id'=>$user_id,
      'stylist_id'=>$stylist_id,
    ]);

  }

  /*
  *　ログイン関連 パスワード再設定完了　
  */
  public function pass_reset_comp(Request $request){
    //バリデーション
    $request->validate([
      'password'=>'confirmed:password,required|min:10|max:20',
    ]);

    $inputs = $request->all();
    $user_id = session()->get('user_id');
    $stylist_id = session()->get('stylist_id');

    if(isset($user_id)){
      $user = new User();
      $user->update_password($inputs);
      return view('rogin_rogout.pass_reset_comp');

    }else if(isset($stylist_id)){
      $stylist = new HairStylist();
      $stylist->update_password($inputs);
      return view('rogin_rogout.pass_reset_comp');
    }

  }

  /*
  *　ログイン関連 美容師ログイン（情報一致すればホーム画面へ）
  */
  public function stylist_rogin_confirm(Request $request){
    $request->validate([
      'mail'=>'required',
      'pass'=>'required',
    ]);

    //DBに存在するかを確認する必要があり
    $mail = $request['mail'];
    $pass = $request['pass'];

    $request->session()->put('mail',$mail);

    $stylist = new Hairstylist();
    $res = new Reservation();
    $result = $stylist->check_stylist($mail,$pass);

    if($result == 1){
      $sid =$stylist->get_stylist_id($mail);
      $stylist_id;
      foreach($sid as $id){
        $stylist_id = $id->hairstylist_id;
      }
      //美容師IDに紐づく予約を取得
      $reservations = $res->get_reservation($stylist_id);
      $request->session()->put('stylist_id',$stylist_id);


      //セッションが存在する場合はログイン可能
      if($request->session()->get('mail') !== null){
        return view('stylist.stylist_home',[
          'stylist_id'=>$request->session()->get('stylist_id'),
          //  'sid'=>$sid,
          'reservations'=>$reservations,
        ]);
      }else{
        return view('rogin_rogout.stylist_rogin',[
          'msg'=>'再度ログインしてください',
        ]);
      }
    }else{
      return view('rogin_rogout.stylist_rogin',[
        'msg'=>'メールアドレスかパスワードが正しくありません',
      ]);
    }
  }

  /*
  *　ログイン関連　ユーザーログイン
  */
  public function rogin(){
    return view('rogin_rogout.rogin');
  }

  /*
  *ログイン関連　ログアウト完了
  */
  public function rogout_comp(Request $request){
    $request->session()->flush();
    return view('rogin_rogout.rogout_comp');
  }

  /*
  *ログイン関連　美容師ログイン画面
  */
  public function stylist_rogin(){
    return view('rogin_rogout.stylist_rogin');
  }

  /*★★★★ログインログアウトここまで★★★★*/

  /*★★★★コンタクト　ここから★★★★*/

  /*
  *コンタクト　お問い合わせ入力
  */
  public function contact(){
    return view('contact.contact');
  }

  /*
  *コンタクト　お問い合わせ確認
  */
  public function confirm(Request $request){

    $request->validate([
      '名前'=>'required|max:10',
      'フリガナ'=>'required|max:10|regex:/^[ァ-ヶー]+$/u',
      '電話番号'=>'nullable|digits_between:8,11',
      'メール'=>'required|email',
      '本文'=>'required',
    ]);
    return view('contact.confirm',[
      'request'=>$request,
    ]);
  }

  /*
  *コンタクト　お問い合わせ完了
  */
  public function complete(Request $request){
    $contact = new Contact();
    $contact->insert_contact($request);
    return view('contact.complete');
  }

  /*★★★★コンタクト　ここまで★★★★*/

  /*★★★★ユーザー　ここから★★★★*/

  /*
  *ユーザー　ホーム画面　完了画面等からGETされた場合
  */
  public function user_home(Request $request){
    $stylists = Hairstylist::all();

    //セッションが存在する場合はログイン可能
    if($request->session()->get('mail') !== null){
      return view('user_function.user_home',[
        'u_id'=>$request->session()->get('u_id'),
        'stylists'=>$stylists,
      ]);
    }else{
      return view('rogin_rogout.rogin',[
        'msg'=>'再度ログインしてください',
      ]);
    }
  }

  /*
  *ユーザー　予約画面
  */
  public function reservation(Request $request){
    $results = $request->all();
    $user_id = session()->get('u_id');
    $stylist_id;

    if(isset($results['stylist'])){
      $stylist_id = $results['stylist'];
      session()->put('stylist_id',$stylist_id);
    }else{
      $stylist_id = session()->get('stylist_id');
    }

    $s = new HairStylist();

    //idに紐づく美容師情報を代入
    $stylists = $s->get_stylist($stylist_id);

    $inputs = Schedule::orderBy('schedule_date','asc')->where('hairstylist_id', '=', $stylist_id)->get();

    return view('user_function.reservation',[
      'inputs'=>$inputs,
      'stylists'=>$stylists,
      'stylist_id'=>$stylist_id,
      'user_id'=>$user_id,
    ]);
  }

  /*
  *ユーザー　予約確認
  */
  public function reservation_confirm(Request $request){

    //スケジュールに空きがない場合は送信できないようにする
    $request->validate([
      '予約日'=>'required',
      '予約時間'=>'required',
      'メッセージ'=>'max:500',
    ]);

    //フォームからの入力値を全て取得
    $inputs = $request->all();
    $schedule = new Schedule();

    //予約登録をする前にスケジュールに空きがあるかチェックをする
    $anser = $schedule->test_schedule($inputs);
    $stylists = Hairstylist::all();
    return view('user_function.reservation_confirm',[
      'anser'=>$anser,
      'inputs'=>$inputs,
      'stylists'=>$stylists,
    ]);
  }

  /*
  *ユーザー　予約完了
  */
  public function reservation_comp(Request $request){
    $inputs = $request->all();
    $u_id = $inputs['user_id'];
    $request->session()->put('u_id',$u_id);

    $reservation = new Reservation();
    $schedule = new Schedule();

    //予約登録をする前にスケジュールに空きがあるかチェックをする
    $anser = $schedule->test_schedule($inputs);

    //予約完了時
    if($anser == 'true'){
      $result = $reservation->insert_reservation($inputs);
      $s = $schedule->change_schedule_reserved($inputs);
      $anser = 'ご予約が完了しました。';
      $msg='予約詳細は予約履歴からご確認ください';
      return view('user_function.reservation_comp',[
        'inputs'=>$inputs,
        'anser'=>$anser,
        'msg'=>$msg,
      ]);
    }else{
      //スケジュールに空きがない場合
      $anser ="※ご予約が完了できませんでした。";
      $msg ="日時をご確認の上、再度ご予約下さい。";
      return view('user_function.reservation_comp',[
        'inputs'=>$inputs,
        'anser'=>$anser,
        'msg'=>$msg,
      ]);
    }

  }

  /*
  *ユーザー　予約履歴一覧
  */
  public function reservation_history(Request $request){
    $u_id = $request->session()->get('u_id');

    //ユーザーIDに紐づく予約情報を取得
    $reservation = new Reservation();
    $results = $reservation->get_reservation_list($u_id);

    //美容師情報を取得
    $stylists = Hairstylist::all();

    //セッションがあればログイン可能
    if($request->session()->get('mail') !== null){
      return view('user_function.reservation_history',[
        'u_id'=>$u_id,
        'results'=>$results,
        'stylists'=>$stylists,
      ]);
    }else{
      return view('rogin_rogout.rogin',[
        'msg'=>'再度ログインして下さい',
      ]);
    }
  }

  /*
  *ユーザー　コメント変更
  */
  public function comment_change(Request $request){
    //予約ＩＤ取得
    $inputs = $request->all();
    $reservation = new reservation();
    //予約IDに紐づくユーザー情報を取得
    $results = $reservation->get_res($inputs);
    return view('user_function.comment_change',[
      'results'=>$results,
    ]);
  }

  /*
  *ユーザー　コメント変更完了
  */
  public function comment_change_comp(Request $request){
    //予約番号とコメントを取得
    $inputs = $request->all();
    $reservation = new Reservation();
    $reservation->update_comment($inputs);

    return view('user_function.comment_change_comp');
  }

  /*
  *ユーザー　予約キャンセル完了
  */
  public function reservation_cancel_comp(Request $request){
    $inputs = $request->all();
    $r = new Reservation();
    $r->cancel_reservation_user($inputs);
    //予約IDに紐づく予約情報を取得
    $anser = $r->get_res($inputs);
    //上記情報をスケジュールに渡す
    $schedule = new Schedule();
    $result = $schedule->cancel_schedule_res($anser);
    return view('user_function.reservation_cancel_comp');
  }

  /*
  *ユーザー　プロフィール編集
  */
  public function user_profile_edit(Request $request){
    $u_id = $request->session()->get('u_id');
    $users = new User();
    $results = $users->get_user($u_id);

    //セッションがあればログイン可能
    if($request->session()->get('mail') !== null){
      return view('user_function.user_profile_edit',[
        'u_id'=>$u_id,
        'results'=>$results,
      ]);
    }else{
      return view('rogin_rogout.rogin',[
        'msg'=>'再度ログインして下さい',
      ]);
    }
  }

  /*
  *ユーザー　プロフィール編集完了
  */
  public function user_profile_edit_comp(Request $request){
    $request->validate([
      '名前'=>'required|max:10',
      'フリガナ'=>'required|max:10|regex:/^[ァ-ヶー]+$/u',
      '電話'=>'nullable|digits_between:8,11',
      'メール'=>'required|email',
      '住所'=>'required|max:50',
    ]);
    //フォームからの入力値を全て取得
    $inputs = $request->all();
    $users = new User();
    //update
    $users->update_user_profile($inputs);

    //セッションがあればログイン可能
    if($request->session()->get('mail') !== null){
      return view('user_function.user_profile_edit_comp');
    }else{
      return view('rogin_rogout.rogin',[
        'msg'=>'再度ログインして下さい',
      ]);
    }
  }

  /*★★★★ユーザー　ここまで★★★★*/



}//クラス
