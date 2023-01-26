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
    margin-bottom: 3%;
  }
  </style>
</head>

<body>
  <div class="box_all">

    <p class="return_top1"><a class="return_a" onclick="history.back(-1);return false;">戻る</a></p>

    <h3 class="uhome_h3">reservation history</h3>
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
      </tr>

    <tr>
      @if(!empty($results))
      @foreach($results as $result)
      <td class="s_td">{{$result->reservation_id}}</td>
      <td class="s_td">{{date('m/d', strtotime($result->reservation_date))}}<br>
        {{date('H:i', strtotime($result->reservation_time))}}</td>
        <td class="s_td">{{$result->reservation_fee}}</td>

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

        <td class="s_td">{{$result->reservation_comment}}</td>
      </tr>
      @endforeach
      @endif
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
