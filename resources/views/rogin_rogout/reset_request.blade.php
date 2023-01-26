<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>パスワードリセット</title>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <style>
    .msg_p1 {
      margin:0 auto 10px auto;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
  <p class="return_top"><a href="{{ url('/top')}}">TOPへ戻る</a></p>

  <div class="box2">
    <div class="naka">

      <form method="POST" action="/rogin_rogout/pass_mailsend_comp" autocomplete="off">
        @csrf
        <h3 class="rogin">パスワードリセット</h3>
        <p class="msg_p1">会員登録時に登録されたお名前・メールアドレスを
          ご入力の上送信ボタンをクリックしてください。</p>

          @php
          if(isset($errors)){
            foreach($errors->all() as $error){
              @endphp
              <p class="error_msg"><span class="asterisk">*</span>{{$error}}</p>
              @php
            }
          }
          @endphp

          <table class="input_box">
            <tr class="input_tr">
              <td class="label_item">メールアドレス : </td>
              <td class="rogin_input1">
                <input type="text" name="メール" id="mail" class="rogin_input2 inp" value="{{old('mail')}}"　required>
              </td>
              </tr>

            <tr class="input_tr">
              <td class="label_item">  お名前 : <br>
              </td>
              <td class="rogin_input1"><input type="text" required name="名前" id="name" class="rogin_input2 inp" value="" required></td>
            </tr>

          </table>

          <span class="msg_caution">※苗字と名前の間にスペースは不要です</span><br>
          <button type="submit" id="reset_request_bt" name="reset_request_bt" class="sub_bt" onclick="return alert_js()">送信</button>
        </form>

      </div>
    </div>

    <div class="msg">
      <p class="msg_p1">
        <a href="{{url('/rogin_rogout/rogin')}}">ログイン画面へ戻る</a>
      </p>

    </div>

    <script type="text/javascript">
    //送信ボタンを押した際に送信ボタンを無効化する（連打による多数送信回避）
    $(function(){
      $('[type="submit"]').click(function(){
        $(this).prop('disabled',true);//ボタンを無効化する
        $(this).closest('form').submit();//フォームを送信する
      });
    });
  </script>

</body>
</html>
