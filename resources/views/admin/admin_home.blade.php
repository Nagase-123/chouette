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
  </style>
</head>

<body>
  <div class="box_all">
    <header>
      <h2 class="title">Chouette</h2>
      <a class="admin_rogout" href="{{ url('/rogin_rogout/rogout_comp')}}">rogout</a>
      <ul class="nav_box">
        <li class="btn"><a class="btn_a" href="{{ url('/admin/member_list')}}">users</a></li>
        <li class="btn"><a class="btn_a" href="{{ url('/admin/stylist_list')}}">stylists</a></li>
        <li class="btn"><a class="btn_a" href="{{ url('/top/stylist_signup')}}">stylist entry</a></li>
        <li class="btn"><a class="btn_a" href="{{ url('/admin/contact_list')}}">contact</a>
        </li>
      </ul>
    </header>

    <p class="msg_p1">フラグ:{{$result}} 管理者アカウントでログイン中</p>
    <h4 class="uhome_h4">Reservation list</h4>

    <table class="table_list">
      <tr>
        <th class="s_th">reservation<br>ID</th>
        <th class="s_th">date</th>
        <th class="s_th">time</th>
        <th class="s_th">price</th>
        <th class="s_th">user<br>ID</th>
        <th class="s_th">stylist<br>ID</th>
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
        <td class="s_td">{{$reservation->user_id}}</td>
        <td class="s_td">{{$reservation->hairstylist_id}}</td>

        <form method="post" action="/admin/reservation_detail">
          @csrf
          <input type="hidden" name="res_id" value="{{$reservation->reservation_id}}">
          <td class="s_td"><button type="submit" name="user_sb" class="sub">詳細へ</button></td>
        </form>

      </tr>
      @endif
      @endforeach
    </table>

  </div><!-- box_all -->

</body>
</html>
