<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
  <meta content="width=device-width; initial-scale=1.0" name="viewport">
  <meta NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW,NOARCHIVE">
  <link href="{{ asset('css/form_style.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <style>
  body{
    height:100vh;
  }
  .bt{
    width: 80%;
    margin: 3% auto;
    flex-direction: row;
    justify-content: space-between;
  }
  #submit_contact{
    margin: 5px 15px 15px 0;
  }
  .contact-box{
    height:50%;
  }
</style>
</head>

<body>
  <div class="box_all">
    <div class="parent3">
      <h3 class="heading3"> キャンセル確認画面 </h3>
    </div>

    <div class="contact-box">

      <div>
        <form method="post" action="/stylist/reservation_cancel_comp" autocomplete="off">
          @csrf
        </div>

        @foreach($reservations as $reservation)
        <p class="msg_left">キャンセルするユーザーID：{{$reservation->user_id}}</p>
        <p class="msg_left">キャンセルする予約ID：{{$reservation->reservation_id}}</p>
        <input type="hidden" name="res_id" value="{{$reservation->reservation_id}}">
        <p class="msg_left">キャンセルする予約日時：{{date('m/d', strtotime($reservation->reservation_date))}} {{date('H:i', strtotime($reservation->reservation_time))}}</p>


        @endforeach
        <p class="msg_left">メッセージ
          <span class="msg_sml">※入力した内容でお客様に連絡が届きます。</span>
        </p>
        @if ($errors->has('textarea_box'))
        <span class = "error_msg">{{$errors->first('textarea_box')}}</span>
        @endif

        <input name="cancel_msg" wrap="hard"
        value="" type="text" class="textarea_box" required>

        <br>

        <div class="bt">
          <button type="submit" id="submit_contact">送　信</button>
          <button type ="button" id="return" onclick=history.back()>戻る</button>
        </div>
        <div class="empty"></div>
      </div>
    </form>

  </body>
  </html>
