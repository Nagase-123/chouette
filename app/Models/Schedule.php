<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Schedule extends Model
{
  use HasFactory;

  /*
  *スケジュール登録
  */
  public function insert_schedule($inputs){

    $schedule = new Schedule();
    $schedule->schedule_date = $inputs['date_add'];
    $schedule->hairstylist_id = $inputs['stylist_id'];

    //時間のデフォルト値は0
    //時間が選択されたら1にする
    if(isset($inputs['time6'])){
      $schedule->schedule_6 = 1;
    }
    if(isset($inputs['time7'])){
      $schedule->schedule_7 = 1;
    }
    if(isset($inputs['time8'])){
      $schedule->schedule_8 =1;
    }
    if(isset($inputs['time9'])){
      $schedule->schedule_9 =1;
    }
    if(isset($inputs['time10'])){
      $schedule->schedule_10 = 1;
    }
    if(isset($inputs['time11'])){
      $schedule->schedule_11 = 1;
    }
    if(isset($inputs['time12'])){
      $schedule->schedule_12 = 1;
    }
    if(isset($inputs['time13'])){
      $schedule->schedule_13 = 1;
    }
    if(isset($inputs['time14'])){
      $schedule->schedule_14 = 1;
    }
    if(isset($inputs['time15'])){
      $schedule->schedule_15 = 1;
    }
    if(isset($inputs['time16'])){
      $schedule->schedule_16 = 1;
    }
    if(isset($inputs['time17'])){
      $schedule->schedule_17 = 1;
    }
    if(isset($inputs['time18'])){
      $schedule->schedule_18 = 1;
    }
    if(isset($inputs['time19'])){
      $schedule->schedule_19 = 1;
    }
    if(isset($inputs['time20'])){
      $schedule->schedule_20 = 1;
    }
    if(isset($inputs['time21'])){
      $schedule->schedule_21 = 1;
    }

    $schedule->save();

  }

  /*
  *スケジュール登録　同じ日付があれば追加する
  */
  public function update_schedule($inputs){
    $cond = ['schedule_date' => $inputs['date_add']];
    $cond_id = ['hairstylist_id' => $inputs['stylist_id']];

    //0だった場合は1にする　すでに1または2の場合はそのまま
    if(isset($inputs['time6'])){
      Schedule::where($cond_id)->where($cond)->where('schedule_6','=','0')->update([
        'schedule_6' =>'1'
      ]);
    }
    if(isset($inputs['time7'])){
      Schedule::where($cond_id)->where($cond)->where('schedule_7','=','0')->update([
        'schedule_7' =>'1'
      ]);
    }
    if(isset($inputs['time8'])){
      Schedule::where($cond_id)->where($cond)->where('schedule_8','=','0')->update([
        'schedule_8' =>'1'
      ]);
    }
    if(isset($inputs['time9'])){
      Schedule::where($cond_id)->where($cond)->where('schedule_9','=','0')->update([
        'schedule_9' =>'1'
      ]);
    }
    if(isset($inputs['time10'])){
      Schedule::where($cond_id)->where($cond)->where('schedule_10','=','0')->update([
        'schedule_10' =>'1'
      ]);
    }
    if(isset($inputs['time11'])){
      Schedule::where($cond_id)->where($cond)->where('schedule_11','=','0')->update([
        'schedule_11' =>'1'
      ]);
    }
    if(isset($inputs['time12'])){
      Schedule::where($cond_id)->where($cond)->where('schedule_12','=','0')->update([
        'schedule_12' =>'1'
      ]);
    }
    if(isset($inputs['time13'])){
      Schedule::where($cond_id)->where($cond)->where('schedule_13','=','0')->update([
        'schedule_13' =>'1'
      ]);
    }
    if(isset($inputs['time14'])){
      Schedule::where($cond_id)->where($cond)->where('schedule_14','=','0')->update([
        'schedule_14' =>'1'
      ]);
    }
    if(isset($inputs['time15'])){
      Schedule::where($cond_id)->where($cond)->where('schedule_15','=','0')->update([
        'schedule_15' =>'1'
      ]);
    }
    if(isset($inputs['time16'])){
      Schedule::where($cond_id)->where($cond)->where('schedule_16','=','0')->update([
        'schedule_16' =>'1'
      ]);
    }
    if(isset($inputs['time17'])){
      Schedule::where($cond_id)->where($cond)->where('schedule_17','=','0')->update([
        'schedule_17' =>'1'
      ]);
    }
    if(isset($inputs['time18'])){
      Schedule::where($cond_id)->where($cond)->where('schedule_18','=','0')->update([
        'schedule_18' =>'1'
      ]);
    }
    if(isset($inputs['time19'])){
      Schedule::where($cond_id)->where($cond)->where('schedule_19','=','0')->update([
        'schedule_19' =>'1'
      ]);
    }
    if(isset($inputs['time20'])){
      Schedule::where($cond_id)->where($cond)->where('schedule_20','=','0')->update([
        'schedule_20' =>'1'
      ]);
    }
    if(isset($inputs['time21'])){
      Schedule::where($cond_id)->where($cond)->where('schedule_21','=','0')->update([
        'schedule_21' =>'1'
      ]);
    }

  }

  /*
  *同じ日付・同じIDのデータが存在するかチェック
  */
  public function check_schedule($inputs){
    $cond = ['schedule_date' => $inputs['date_add']];
    $cond_id = ['hairstylist_id' => $inputs['stylist_id']];

    //DBに同じIDかつ同じ日付があれば取得
    $anser = Schedule::where($cond_id)->where($cond)->get();

    //DBに同じIDかつ同じ日付があればtrue
    if($anser->isNotEmpty()){
      return 'true';
    }else{
      return 'false';
    }
  }

  /*
  *予約が入ったらスケジュールの予約時間の値を2にする
  */
  public function change_schedule_reserved($inputs){
    //inputs二つの値とDBの値が一致したら
    //データを2に変える

    $colum;

    switch ($inputs['予約時間']) {
      case '6:00':
      $colum = 'schedule_6';
      break;

      case '7:00':
      $colum = 'schedule_7';
      break;

      case '8:00':
      $colum = 'schedule_8';
      break;

      case '9:00':
      $colum = 'schedule_9';
      break;

      case '10:00':
      $colum = 'schedule_10';
      break;

      case '11:00':
      $colum = 'schedule_11';
      break;

      case '12:00':
      $colum = 'schedule_12';
      break;

      case '13:00':
      $colum = 'schedule_13';
      break;

      case '14:00':
      $colum = 'schedule_14';
      break;

      case '15:00':
      $colum = 'schedule_15';
      break;

      case '16:00':
      $colum = 'schedule_16';
      break;

      case '17:00':
      $colum = 'schedule_17';
      break;

      case '18:00':
      $colum = 'schedule_18';
      break;

      case '19:00':
      $colum = 'schedule_19';
      break;

      case '20:00':
      $colum = 'schedule_20';
      break;

      case '21:00':
      $colum = 'schedule_21';
      break;

      default:
      // code...
      break;
    }
    //日付が一致するかつIDが一致するデータ
    $cond_id = ['hairstylist_id' => $inputs['stylist']];
    $cond = ['schedule_date' => $inputs['予約日']];
    Schedule::where($cond)->where($cond_id)->update([
      $colum=>'2'
    ]);

  }

  /*
  *予約登録前にスケジュールに空きがあるか確認
  */
  public function test_schedule($inputs){
    $anser = $inputs['予約日'];
    $cond_id = ['hairstylist_id' => $inputs['stylist']];
    $cond = ['schedule_date' => $inputs['予約日']];

    $colum;
    switch ($inputs['予約時間']) {
      case '6:00':
      $colum = 'schedule_6';
      break;

      case '7:00':
      $colum = 'schedule_7';
      break;

      case '8:00':
      $colum = 'schedule_8';
      break;

      case '9:00':
      $colum = 'schedule_9';
      break;

      case '10:00':
      $colum = 'schedule_10';
      break;

      case '11:00':
      $colum = 'schedule_11';
      break;

      case '12:00':
      $colum = 'schedule_12';
      break;

      case '13:00':
      $colum = 'schedule_13';
      break;

      case '14:00':
      $colum = 'schedule_14';
      break;

      case '15:00':
      $colum = 'schedule_15';
      break;

      case '16:00':
      $colum = 'schedule_16';
      break;

      case '17:00':
      $colum = 'schedule_17';
      break;

      case '18:00':
      $colum = 'schedule_18';
      break;

      case '19:00':
      $colum = 'schedule_19';
      break;

      case '20:00':
      $colum = 'schedule_20';
      break;

      case '21:00':
      $colum = 'schedule_21';
      break;

      default:
      break;
    }
    //選択された日付の時間が1になっているかチェック
    $result = Schedule::where($cond_id)->where($cond)->where($colum,'=','1')->get();
    if($result->isNotEmpty()){
      return 'true';
    }else{
      return 'false';
    }
  }

  /*
  *予約キャンセルされたら予約時間の数字を1に戻す（stylistの方からのキャンセル操作時）
  */
  public function cancel_schedule_res($inputs){
    //キャンセルボタンが押された予約IDに紐づく予約情報を取得
    $results = $inputs->all();
    $time;
    $cond_id;
    $cond;
    foreach($results as $result){
      //予約の時間
      $time = $result['reservation_time'];
      //Reservationの中の美容師idとScheduleの中の美容師idが一致するか
      $cond_id = ['hairstylist_id' => $result['hairstylist_id']];
      //予約日とスケジュールの日付が一致するか
      $cond = ['schedule_date' => $result['reservation_date']];
    }

    //スケジュール内でcondとcond_idが一致したら
    //時間を一つ一つ比べていき、一致する時間を１に戻す
    switch ($time) {
      case '06:00:00':
      Schedule::where($cond_id)->where($cond)->update([
        'schedule_6' =>'1'
      ]);
      break;

      case '07:00:00':
      Schedule::where($cond_id)->where($cond)->update([
        'schedule_7' =>'1'
      ]);
      break;

      case '08:00:00':
      Schedule::where($cond_id)->where($cond)->update([
        'schedule_8' =>'1'
      ]);
      break;

      case '09:00:00':
      Schedule::where($cond_id)->where($cond)->update([
        'schedule_9' =>'1'
      ]);
      break;

      case '10:00:00':
      Schedule::where($cond_id)->where($cond)->update([
        'schedule_10' =>'1'
      ]);
      break;

      case '11:00:00':
      Schedule::where($cond_id)->where($cond)->update([
        'schedule_11' =>'1'
      ]);
      break;

      case '12:00:00':
      Schedule::where($cond_id)->where($cond)->update([
        'schedule_12' =>'1'
      ]);
      break;

      case '13:00:00':
      Schedule::where($cond_id)->where($cond)->update([
        'schedule_13' =>'1'
      ]);
      break;

      case '14:00:00':
      Schedule::where($cond_id)->where($cond)->update([
        'schedule_14' =>'1'
      ]);
      break;

      case '15:00:00':
      Schedule::where($cond_id)->where($cond)->update([
        'schedule_15' =>'1'
      ]);
      break;

      case '16:00:00':
      Schedule::where($cond_id)->where($cond)->update([
        'schedule_16' =>'1'
      ]);
      break;

      case '17:00:00':
      Schedule::where($cond_id)->where($cond)->update([
        'schedule_17' =>'1'
      ]);
      break;

      case '18:00:00':
      Schedule::where($cond_id)->where($cond)->update([
        'schedule_18' =>'1'
      ]);
      break;

      case '19:00:00':
      Schedule::where($cond_id)->where($cond)->update([
        'schedule_19' =>'1'
      ]);
      break;

      case '20:00:00':
      Schedule::where($cond_id)->where($cond)->update([
        'schedule_20' =>'1'
      ]);
      break;

      case '21:00:00':
      Schedule::where($cond_id)->where($cond)->update([
        'schedule_21' =>'1'
      ]);
      break;

      default:
      break;
    }

    return $results;
  }

  /*
  *現在登録中のスケジュールを取得する
  */
  public function get_schedule($stylist_id){
    $cond_id = ['hairstylist_id' => $stylist_id];
    $schedule = Schedule::orderBy('schedule_date','asc')->where($cond_id)->get();
    return $schedule;
  }

  /*
  *スケジュール論理削除
  */
  public function delete_schedule($inputs){
    //予約の時間
    $time = $inputs['予約時間'];
    //受け取った美容師idとScheduleの中の美容師idが一致するか
    $cond_id = ['hairstylist_id' => $inputs['stylist']];
    //受けった予約日とスケジュールの日付が一致するか
    $cond = ['schedule_date' => $inputs['予約日']];

    //0（登録なし）か2（予約あり）だとfalseになるので変更しない
    $anser = $this->test_schedule($inputs);

    if($anser =='true'){
      //時間を一つ一つ比べていき、一致する時間を0に戻す
      switch ($time) {
        case '6:00':
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_6' =>'0'
        ]);
        break;

        case '7:00':
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_7' =>'0'
        ]);
        break;

        case '8:00':
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_8' =>'0'
        ]);
        break;

        case '9:00':
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_9' =>'0'
        ]);
        break;

        case '10:00':
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_10' =>'0'
        ]);
        break;

        case '11:00':
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_11' =>'0'
        ]);
        break;

        case '12:00':
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_12' =>'0'
        ]);
        break;

        case '13:00':
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_13' =>'0'
        ]);
        break;

        case '14:00':
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_14' =>'0'
        ]);
        break;

        case '15:00':
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_15' =>'0'
        ]);
        break;

        case '16:00':
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_16' =>'0'
        ]);
        break;

        case '17:00':
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_17' =>'0'
        ]);
        break;

        case '18:00':
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_18' =>'0'
        ]);
        break;

        case '19:00':
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_19' =>'0'
        ]);
        break;

        case '20:00':
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_20' =>'0'
        ]);
        break;

        case '21:00':
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_21' =>'0'
        ]);
        break;

      }//switch

      return $anser;
    }else{
      return $anser;
    }

  }


}//クラス
