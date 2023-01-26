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
</head>

<body>
  <div class="box_all">

    <header>
      <h2 class="title">Chouette</h2>
      <ul class="nav_box">
        <li class="btn"><a class="btn_a" href="{{ url('/stylist/schedule_add')}}">schedule</a></li>
        <li class="btn"><a class="btn_a" href="{{ url('/stylist/reservation_history')}}">past reservations</a></li>
        <li class="btn"><a class="btn_a" href="{{ url('/stylist/profile_edit')}}">profile</a></li>
        <li class="btn"><a class="btn_a" href="{{ url('/rogin_rogout/rogout_comp')}}">rogout</a></li>
      </ul>
    </header>

    <h4 class="uhome_h4">直近　予約一覧</h4>

    <table class="table_list">
      <tr>
        <th class="s_th">ID</th>
        <th class="s_th">date</th>
        <th class="s_th">time</th>
        <th class="s_th">price</th>
        <th class="s_th">quiet</th>
        <th class="s_th">talk</th>
        <th class="s_th">hair set</th>
        <th class="s_th">shampoo</th>
        <th class="s_th">kids<br>haircut</th>
        <th class="s_th list_design">comment</th>
        <th class="s_th"></th>
        <th class="s_th"></th>
      </tr>

      <tr>
        <?php
        $time = new DateTime();
        $today = $time->format('Y-m-d');
        ?>
        @foreach($reservations as $reservation)
        @if($reservation->reservation_date >= $today && $reservation->reservation_flg == 0)
        <td class="s_td">{{$reservation->reservation_id}}</td>
        <td class="s_td">{{date('m/d', strtotime($reservation->reservation_date))}}</td>
        <td class="s_td">{{date('H:i', strtotime($reservation->reservation_time))}}</td>
        <td class="s_td">{{$reservation->reservation_fee}}</td>

        @if($reservation->reservation_request1 =='なし')
        <td class="s_td">×</td>
        @else
        <td class="s_td">〇</td>
        @endif

        @if($reservation->reservation_request2 =='なし')
        <td class="s_td">×</td>
        @else
        <td class="s_td">〇</td>
        @endif

        @if($reservation->reservation_request3 =='なし')
        <td class="s_td">×</td>
        @else
        <td class="s_td">〇</td>
        @endif

        @if($reservation->reservation_request4 =='なし')
        <td class="s_td">×</td>
        @else
        <td class="s_td">〇</td>
        @endif

        @if($reservation->reservation_request5 =='なし')
        <td class="s_td">×</td>
        @else
        <td class="s_td">〇</td>
        @endif

        <td class="s_td">{{$reservation->reservation_comment}}</td>

        <form method="post" action="/stylist/user_memo">
          @csrf
          <input type="hidden" name="user" value="{{$reservation->user_id}}">
          <td class="s_td"><button type="submit" class="list_bt" name="user_sb">顧客情報</td>
          </form>

          <form method="post" action="/stylist/reservation_cancel">
            @csrf
            <input type="hidden" name="user_id" value="{{$reservation->user_id}}">
            <input type="hidden" name="res_id" value="{{$reservation->reservation_id}}">
            <td class="s_td"><button type="submit" class="list_bt" name="user_sb">キャンセル</td>
            </form>
          </tr>
          @endif
          @endforeach
        </table>

      </div>
    </body>
    </html>
