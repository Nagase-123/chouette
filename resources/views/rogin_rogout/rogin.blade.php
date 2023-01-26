<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>ログイン画面</title>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
  <p class="return_top"><a href="{{url('/top')}}">TOPページへ戻る</a></p>

  <div class="box2">
    <div class="naka">
      <form method="POST" action="/rogin_rogout/rogin" autocomplete="off">
        @csrf
        <h3 class="rogin">ログイン</h3>

        @if(isset($msg))
        <p class="error_msg">※{{$msg}}</p>
        @endif

        <table class="input_box">
          <tr>
            <td class="label_item">メールアドレス : <br>
            </td>

            <td class="rogin_input1">
              <input type="text" name="mail" id="mail" class="rogin_input2 inp" value="{{old('mail')}}" required>
            </td>
          </tr>

          <tr>
            <td class="label_item">  パスワード : <br>
            </td>
            <td class="rogin_input1"><input type="password" name="pass" id="pass" class="rogin_input2 inp" value="{{old('pass')}}" required></td>
          </tr>
        </table>
        <button type="submit" name="rogin_bt" class="sub_bt">ログインする</button>
      </form>

    </div>
  </div>

  <div class="msg"><p class="msg_p1">
    <a class="a_color" href="{{url('/top/signup')}}">会員登録がお済みでない場合はこちら</a></p>
  </div>

  <div class="msg"><p class="msg_p1"><a class="a_color" href="{{url('/rogin_rogout/reset_request')}}">
    パスワードを忘れた場合はこちら</a></p>
  </div>

  <div class="msg">
    <p class="msg_p1"><a class="a_color" href="{{url('/rogin_rogout/stylist_rogin')}}">
      美容師の方はこちら</a></p>
    </div>

  </body>
  </html>
