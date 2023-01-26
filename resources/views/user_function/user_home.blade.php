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
  form{
    width: 100%;
  }
  </style>
</head>

<body>
  <div class="box_all">

    <header>
      <h2 class="title">Chouette</h2>
      <ul class="nav_box">
        <li class="btn"><a class="btn_a" href="{{url('/top/faq')}}">Faq</a></li>
        <li class="btn"><a class="btn_a" href="{{ url('/user_function/reservation_history')}}">past reservations</a></li>
        <li class="btn"><a class="btn_a" href="{{ url('/user_function/user_profile_edit')}}">member infomation</a></li>
        <li class="btn"><a class="btn_a" href="{{ url('/rogin_rogout/rogout_comp')}}">rogout</a></li>
      </ul>
    </header>

    <form action="/user_function/reservation" method="post">
      @csrf

      <input type="hidden" name="user_id" value="{{ $u_id }}">

      <h4 class="uhome_h4">美容師を指名する</h4>

      <table class="table_list">
        <tr>
          <th class="s_th"></th>
          <th class="s_th">stylist name</th>
          <th class="s_th">advantage</th>
          <th class="s_th">profile</th>
        </tr>

        <tr>
          @php
          foreach($stylists as $stylist){
            if($stylist -> hairstylist_flg == 1){
              @endphp
              <td class="s_td">
                <input type="radio" name="stylist" class="stylist_radio" value="{{ $stylist->hairstylist_id }}" required>
              </td>
              <td class="s_td">{{$stylist->hairstylist_name}}</td>
              <td class="s_td">{{$stylist->hairstylist_advantage}}</td>
              <td class="s_td">{{$stylist->hairstylist_profile}}</td>
            </form>
          </tr>
          @php
        }
      }
      @endphp
    </table>

    <div class="bt">
      <button type="submit" id="submit">予約画面へ</button>
    </div>

    <div class="empty"></div>

  </div><!-- box_all -->

</body>
</html>
