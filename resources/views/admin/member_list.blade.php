<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>stylist_list</title>
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

    <h3 class="uhome_h3">user list</h3>

    <table class="table_list">
      <tr>
        <th class="s_th">ID</th>
        <th class="s_th user_list_design">name</th>
        <th class="s_th user_list_design">mail</th>
        <th class="s_th user_list_design">tel</th>
        <th class="s_th user_list_design">address</th>
        <th class="s_th user_list_design">memo</th>
        <th class="s_th"></th>
        <th class="s_th"></th>
        <th class="s_th"></th>
      </tr>
      @foreach($users as $user)
      <tr>
        <td class="s_td">{{$user->user_id}}</td>
        <td class="s_td">{{$user->user_name}}</td>
        <td class="s_td">{{$user->user_mail}}</td>
        <td class="s_td">{{$user->user_tel}}</td>
        <td class="s_td">{{$user->user_address}}</td>
        <td class="s_td">{{$user->user_memo}}</td>

        <td class="s_td">
          <form action ="/admin/reservation_history_admin" method="post">
            @csrf
            <input type="hidden" name="u_id" value="{{$user->user_id}}">
            <button type="submit" class="list_bt" name="history_bt" value="">履歴</button>
          </form>
        </td>

        <td class="s_td">
          <form action ="/admin/user_profile_edit_admin" method="get">
            @csrf
            <input type="hidden" name="user_id" value="{{$user->user_id}}">
            <button type="submit" class="list_bt" name="del_bt" value="">修正</button>
          </form>
        </td>

        <td class="s_td">
          <form action ="/admin/member_delete_comp" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{$user->user_id}}">
            <button type="submit" class="list_bt" name="del_bt" onclick="return alert_js()" value="">削除</button>
          </form>
        </td>

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
