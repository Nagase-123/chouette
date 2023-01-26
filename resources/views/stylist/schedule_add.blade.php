<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
  <meta content="width=device-width; initial-scale=1.0" name="viewport">
  <meta NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW,NOARCHIVE">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <style>
  label{
    margin-right: 3%;
    color:#705339;
  }
  .uhome_h3{
    margin-top: 0;
  }
  .return_top{
    margin-top: 0;
    margin-bottom: 0;
  }
  /* チェックボックスデザイン */
  input[type=checkbox] {
    display: none;
  }
  input[type=checkbox]:checked + .checkbox01::after {
    opacity: 1;
  }
  /*チェックボックスデザインここまで*/
  .box3{
    text-align: center;
  }
</style>
</head>

<body>
  <div class="box_all">

    <p class="return_top"><a href="#" onclick="history.back(-1);return false;">戻る</a></p>

    <h3 class="uhome_h3">スケジュール登録</h3>

    <p class="msg_p1"><a href="{{ url('../stylist/schedule_list')}}"><span class="astrisk">※</span>現在登録中のスケジュール一覧はこちら</a></p>

    @php
    if(isset($errors)){
      foreach($errors->all() as $error){

        //指定した文字列が一致したら置き換える
        $replace = str_replace('date add は今日より後の日付を選択して下さい', '日付は今日より後の日付を選択して下さい', $error);

        @endphp
        <p class="error_msg"><span class="asterisk">*</span>{{$replace}}</p>
        @php
      }
    }
    @endphp

    <p class="msg_p1">
      出勤希望日と時間を選択してください<br>
      6：00を選択した場合、6：00開始の予約が入ります<br>
      選択した時間に訪問できるようスケジュールを登録してください
    </p>

    <div class="box3">

      <form class="schedule_form" action="/stylist/schedule_comp" method="post">
        @csrf
        <!-- 　美容師ID送信用 -->
        <input type="hidden" name="stylist_id" value="{{$stylist_id}}">

        <br>
        <!--時間のプルダウン用-->
        <datalist id="data-list">
          @for($i = 6; $i <= 20; $i++)
          @if($i<=9)
          <option value="0{{$i}}:00"></option>
          @elseif($i>=10)
          <option value="{{$i}}:00"></option>
          @endif
          @endfor
        </datalist>

        <label>date</label>
        <input type="date" class="inp" name="date_add" required="required">

        <br>
      <input type="checkbox" id="6am" name="time6" checked="checked">
      <label for="6am" class="checkbox01">6:00</label>

      <input type="checkbox" id="7am" name="time7">
      <label for="7am" class="checkbox01">7:00</label>

      <input type="checkbox" id="8am" name="time8">
      <label for="8am" class="checkbox01">8:00</label>

      <input type="checkbox" id="9am" name="time9">
      <label for="9am" class="checkbox01">9:00</label>

      <input type="checkbox" id="10am" name="time10">
      <label for="10am" class="checkbox01">10:00</label>

      <input type="checkbox" id="11am" name="time11">
      <label for="11am" class="checkbox01">11:00</label>
      <br>
      <input type="checkbox" id="12pm" name="time12">
      <label for="12pm" class="checkbox01">12:00</label>

      <input type="checkbox" id="13pm" name="time13">
      <label for="13pm" class="checkbox01">13:00</label>

      <input type="checkbox" id="14pm" name="time14">
      <label for="14pm" class="checkbox01">14:00</label>

      <input type="checkbox" id="15pm" name="time15">
      <label for="15pm" class="checkbox01">15:00</label>

      <input type="checkbox" id="16pm" name="time16">
      <label for="16pm" class="checkbox01">16:00</label>
      <br>
      <input type="checkbox" id="17pm" name="time17">
      <label for="17pm" class="checkbox01">17:00</label>

      <input type="checkbox" id="18pm" name="time18">
      <label for="18pm" class="checkbox01">18:00</label>

      <input type="checkbox" id="19pm" name="time19">
      <label for="19pm" class="checkbox01">19:00</label>

      <input type="checkbox" id="20pm" name="time20">
      <label for="20pm" class="checkbox01">20:00</label>

      <input type="checkbox" id="21pm" name="time21">
      <label for="21pm" class="checkbox01">21:00</label>

      <br>
      <button type="submit" class="sub_bt" onclick="return check()">登録</button>

    </div><!-- box3 -->

<br>

</form>
</div><!-- box_all -->

</body>
</html>
