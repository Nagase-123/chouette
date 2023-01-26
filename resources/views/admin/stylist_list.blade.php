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
    .uhome_h3{
      margin-bottom: 5%;
    }
  </style>
</head>

<body>
  <div class="box_all">

    <p class="return_top1"><a class="return_a" onclick="history.back(-1);return false;">戻る</a></p>
    <h3 class="uhome_h3">stylist list</h3>

    <table class="table_list">
      <tr>
        <th class="s_th">stylist<br>id</th>
        <th class="s_th">name</th>
        <th class="s_th"></th>
        <th class="s_th"></th>
        <th class="s_th"></th>
        <th class="s_th"></th>
      </tr>

      @php
      foreach($stylists as $stylist){
        @endphp
        <tr>
          <td class="s_td">{{$stylist->hairstylist_id}}</td>
          <td class="s_td">{{$stylist->hairstylist_name}}</td>
          <form action="/admin/schedule_list_admin" method="post">
            @csrf
            <input type="hidden" name="stylist_id" value="{{$stylist->hairstylist_id}}">
            <td class="td_bt"><button type="submit" id="sub">スケジュール</button></td>
          </form>

          <form action="/admin/reservation_history_stylist" method="post">
            @csrf
            <input type="hidden" name="stylist_id" value="{{$stylist->hairstylist_id}}">
            <td class="td_bt"><button type="submit" id="sub">予約履歴</button></td>
          </form>

          <form action="/admin/stylist_profile_edit" method="post">
            @csrf
            <input type="hidden" name="stylist_id" value="{{$stylist->hairstylist_id}}">
            <td class="td_bt"><button type="submit" id="sub">会員修正</button></td>
          </form>

          <form action="/admin/stylist_delete_comp" method="post">
            @csrf
            <input type="hidden" name="stylist_id" value="{{$stylist->hairstylist_id}}">
            <td class="td_bt"><button type="submit" id="sub" onclick="return alert_js()">会員削除</button></td>
          </form>
        </tr>
        @php
      }
      @endphp
    </table>

    <div class="empty"></div>

  </div><!-- box_all -->

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
