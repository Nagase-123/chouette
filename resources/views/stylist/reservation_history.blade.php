<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>reservation_history</title>
  <meta name="viewport" content="width=initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
  <meta content="width=device-width; initial-scale=1.0" name="viewport">
  <meta NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW,NOARCHIVE">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <style>
  .uhome_h3{
    margin-bottom: 5%;
  }
  </style>
</head>

<body>
  <div class="box_all">

    <p class="return_top1"><a class="return_a" onclick="history.back(-1);return false;">戻る</a></p>

    <h3 class="uhome_h3">reservation_history</h3>
    <br>
    <table class="table_list">
      <tr>
        <th class="s_th">reservation<br>id</th>
        <th class="s_th">date<br>and<br>time</th>
        <th class="s_th">price</th>
        <th class="s_th">quiet</th>
        <th class="s_th">talk</th>
        <th class="s_th">hair set</th>
        <th class="s_th">shampoo</th>
        <th class="s_th">kids<br>haircut</th>
        <th class="s_th list_design">comment</th>
        <th class="s_th">customer<br>information</th>
      </tr>

      <tr>
        @foreach($reservations as $reservation)
        @if($reservation->reservation_flg == 0)
        <td class="s_td">{{$reservation->reservation_id}}</td>
        <td class="s_td">{{date('m/d', strtotime($reservation->reservation_date))}} {{date('H:i', strtotime($reservation->reservation_time))}}</td>
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
          <td class="s_td"><button type="submit" name="user_sb" class="list_bt">顧客情報</td>
          </form>

        </tr>
        @endif
        @endforeach

      </table>
    </div>

    <script>
    function alert_js(){
      var result=false;
      result = window.confirm('本当に削除しますか？');
      if(result){
        return true;
      }else{
        return false;
      }
    }
  </script>

</body>
</html>
