<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>美容師専用ログイン画面</title>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
  <p class="return_top"><a href="{{url('/top')}}">TOPページへ戻る</a></p>

  <div class="box2">
    <div class="naka">
      <form method="POST" action="/rogin_rogout/stylist_rogin" autocomplete="off">
        @csrf
        <h3 class="rogin">美容師専用ログイン</h3>

        @if(isset($msg))
        <p class="error_msg">※{{$msg}}</p>
        @endif

        <table class="input_box">
          <tr>
            <td class="label_item">メールアドレス :<br></td>
            <td class="rogin_input1"><input type="text" name="mail" id="mail"  class="rogin_input2 inp" value="" required></td>
          </tr>

          <tr>
            <td class="label_item">  パスワード :<br></td>
            <td class="rogin_input1"><input type="password" name="pass" id="pass" class="rogin_input2 inp" value="" required></td>
          </tr>
        </table>
        <button type="submit" id="rogin_bt" name="rogin_bt" class="sub_bt">ログインする</button>

      </form>
    </div>
  </div>

  <div class="msg">
    <p class="msg_p1">美容師会員登録には事前の審査がございます。<br>
      会員登録がお済みでない場合はお問い合わせフォームよりご連絡ください<br>
      <a href="{{ url('../contact') }}">お問い合わせフォーム</a>
    </p>
  </div>

  <div class="msg"><p class="msg_p1"><a class="a_color" href="{{url('/rogin_rogout/reset_request')}}">
    パスワードを忘れた場合はこちら</a></p>
  </div>

</body>
</html>
