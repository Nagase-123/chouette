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

    <p class="return_top1"><a class="return_a" href="{{url('/user_function/user_home')}}" class="comp_a">戻る</a></p>

    <h3 class="uhome_h3">reservation history</h3>

    <table class="table_list">
      <tr>
        <th class="s_th u_res_list_design">reser<br>vation<br>id</th>
        <th class="s_th">date<br>and<br>time</th>
        <th class="s_th">price</th>
        <th class="s_th">stylist<br>name</th>
        <th class="s_th">quiet</th>
        <th class="s_th">talk</th>
        <th class="s_th">hair<br>set</th>
        <th class="s_th">shampoo</th>
        <th class="s_th">kids<br>haircut</th>
        <th class="s_th res_list_design">comment</th>
        <th class="s_th"></th>
        <th class="s_th"></th>
      </tr>

      <tr>
        @foreach($results as $result)
        <td class="s_td">{{$result->reservation_id}}</td>
        <td class="s_td">{{date('m/d', strtotime($result->reservation_date))}}<br>
          {{date('H:i', strtotime($result->reservation_time))}}</td>
          <td class="s_td">{{$result->reservation_fee}}</td>

          @php
          foreach($stylists as $stylist){
            if($stylist->hairstylist_id == $result->hairstylist_id){
              @endphp
              <td class="s_td">{{$stylist->hairstylist_name}}</td>
              @php
            }
          }
          @endphp

          @if($result->reservation_request1 =='なし')
          <td class="s_td">×</td>
          @else
          <td class="s_td">〇</td>
          @endif

          @if($result->reservation_request2 =='なし')
          <td class="s_td">×</td>
          @else
          <td class="s_td">〇</td>
          @endif

          @if($result->reservation_request3 =='なし')
          <td class="s_td">×</td>
          @else
          <td class="s_td">〇</td>
          @endif


          @if($result->reservation_request4 =='なし')
          <td class="s_td">×</td>
          @else
          <td class="s_td">〇</td>
          @endif

          @if($result->reservation_request5 =='なし')
          <td class="s_td">×</td>
          @else
          <td class="s_td">〇</td>
          @endif

          <td class="s_td">{!! nl2br(e($result->reservation_comment)) !!}</td>
          <td class="bt_td">
            <form action ="/user_function/comment_change" method="post">
              @csrf

              @php
              $date = strtotime($result->reservation_date);
              $now = strtotime(date('Y-m-d'));
              if($now < $date){
                if($result->reservation_flg =='0'){
                  @endphp

<!--                  <input type="submit" class="list_bt" value="コメント" id="edit_bt"> -->
                  <input type="hidden" name="res_id" value="{{$result->reservation_id}}">
                  <button type="submit" class="list_bt">コメント</button>
                  @php
                }else{
                  echo '編集不可';
                }
              }else{
                echo '編集不可';
              }
              @endphp
            </td>
          </form>

          <td class="bt_td">
            <form action ="./reservation_cancel_comp" method="post">
              @csrf
              @php
              $date = strtotime($result->reservation_date);
              $now = strtotime(date('Y-m-d'));
              if($now < $date){
                if($result->reservation_flg =='0'){
                  @endphp

                  <input type="hidden" name="res_id" value="{{$result->reservation_id}}">
                  <button type="submit" class="list_bt" name="delete_id" onclick="return alert_js()" value="">予約削除</button>
                  @php
                }else{
                  @endphp

                  <p class="msg_cxl">キャンセル済み</p>
                  @php
                }
              }else{
                echo 'キャンセル不可';
              }
              @endphp
            </td>
          </form>
        </tr>
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
