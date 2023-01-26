<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Reservation extends Model
{
  use HasFactory;


  /*
  *予約登録
  */
  public function insert_reservation($inputs){
    $res = new Reservation;
    $fee = 5000;

    $res->reservation_date = $inputs['予約日'];
    $res->reservation_time = $inputs['予約時間'];
    $res->user_id = $inputs['user_id'];
    $res->hairstylist_id = $inputs['stylist'];

    if(isset($inputs['request1'])){
      $res->reservation_request1 = $inputs['request1'];
    }
    if(isset($inputs['request2'])){
      $res->reservation_request2 = $inputs['request2'];
    }
    if(isset($inputs['request3'])){
      $res->reservation_request3 = $inputs['request3'];
      $fee = $fee + 3000;
      $res->reservation_fee = $fee;
    }
    if(isset($inputs['request4'])){
      $res->reservation_request4 = $inputs['request4'];
      $fee = $fee+1000;
      $res->reservation_fee = $fee;
    }
    if(isset($inputs['request5'])){
      $res->reservation_request5 = $inputs['request5'];
      $fee = $fee+1000;
      $res->reservation_fee = $fee;
    }
    if(isset($inputs['msg'])){
      $res->reservation_comment = $inputs['msg'];
    }
    $res->save();

  }

  /*
  *美容師毎の予約を取得する
  */
  public function get_reservation($stylist_id){
    $cond_id = ['hairstylist_id' => $stylist_id];
    $reservation = Reservation::orderBy('reservation_date','asc')->orderBy('reservation_time','asc')->where($cond_id)->get();
    return $reservation;
  }

  /*
  *キャンセルされたら　キャンセル理由を更新
  */
  public function update_cancel_memo($inputs){
    $cond_id = ['reservation_id' => $inputs['res_id']];

    Reservation::where($cond_id)->update([
      'cancel_message'=>$inputs['cancel_msg'],
      'reservation_flg'=>'1',
    ]);

  }

  /*
  *予約IDに紐づく情報を取得
  */
  public function get_res($inputs){
    $anser = Reservation::where('reservation_id',$inputs['res_id'])->get();
    return $anser;
  }

  /*
  *ユーザーIDに紐づく予約情報を取得
  */
  public function get_reservation_list($input){
    $anser = Reservation::orderBy('reservation_date','asc')->orderBy('reservation_time','asc')->where('user_id',$input)->get();
    return $anser;
  }

  /*
  *コメント変更
  */
  public function update_comment($inputs){
    $cond_id = ['reservation_id' => $inputs['res_id']];
    $comment;
    if(isset($inputs['comment'])){
      $comment = $inputs['comment'];
    }else{
      $comment ='なし';
    }
    Reservation::where($cond_id)->update([
      'reservation_comment'=>$comment,
    ]);
  }

  /*
  *未来の予約情報を取得
  */
  public function get_future_reservation_all(){
    //日付が今日より古いものは取得しないようにする
    $today = date('Y-m-d');

    $reservations = Reservation::where('reservation_date','>',$today)->orderBy('reservation_date','asc')->orderBy('reservation_time','asc')->get();
    return $reservations;
  }

  /*
  *予約論理削除　（adminからキャンセルボタンが押された時 ）
  */
  public function cancel_reservation_admin($inputs){
    //受け取る必要がある情報　
    //予約ID・予約日時・スタイリストID・キャンセルメッセージ
    $res_id = $inputs['res_id'];
    $cond_id = ['reservation_id' => $res_id];
    Reservation::where($cond_id)->update([
      'cancel_message'=>$inputs['cancel_msg'],
      'reservation_flg'=>'1',
    ]);
  }

  /*
  *予約論理削除　（ユーザーからキャンセルボタンが押された時）
  */
  public function cancel_reservation_user($inputs){
    //受け取る必要がある情報　
    //予約ID・予約日時・スタイリストID
    $res_id = $inputs['res_id'];
    $cond_id = ['reservation_id' => $res_id];
    Reservation::where($cond_id)->update([
      'cancel_message'=>'ユーザー側からのキャンセル',
      'reservation_flg'=>'1',
    ]);

  }

  /*
  *ユーザーIDに紐づく予約情報を取得（キャンセル除く）
  */
  public function check_reservation($input){
    $anser = Reservation::where('user_id',$input)->where('reservation_flg',0)->get();
    return $anser;
  }


}//クラス
