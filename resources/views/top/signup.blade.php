<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
  <meta content="width=device-width; initial-scale=1.0" name="viewport">
  <meta NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW,NOARCHIVE">
  <link href="{{ asset('css/form_style.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <title>新規会員登録</title>
</head>

<body>
  <p class="return_top"><a href="#" onclick="history.back(-1);return false;">戻る</a></p>

  <div class="contact-box">
    <h2 class="form">新規会員登録</h2>
    <hr class="border">
    <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
    <p></p>

    <form method="POST" action="/top/signup_confirm" id="form" autocomplete="off">
      @csrf
      @php
      if(isset($errors)){
        foreach($errors->all() as $error){
          @endphp
          <p class="error_msg"><span class="asterisk">*</span>{{$error}}</p>
          @php
        }
      }
      @endphp
      <p class="item">氏名</p>
      <input type="text" name="名前" id="name" value="{{ old('名前') }}" class="inp" placeholder="山田太郎" required>

      <p class="item">フリガナ</p>
      <input type="text" name="フリガナ" id="kana" value="{{ old('フリガナ') }}" class="inp" placeholder="ヤマダタロウ" required>

      <p class="item">電話番号
      </p>
      <input type="text" name="電話番号" id="tel" value="{{ old('電話番号') }}" class="inp" placeholder="09012345678" required>

      <p class="item">メールアドレス</p>
      <input type="text" name="メール" id="mail" value="{{ old('メール') }}" class="inp" placeholder="test@test.co.jp" required>

      <p class="item">住所</p>
      <input type="text" name="住所" id="address" value="{{ old('住所') }}" class="inp" placeholder="福岡市●●区●●" required>

      <p class="item">パスワード</p>
      <input type="password" name="password" id="password" class="inp" value="{{ old('password') }}" placeholder="半角英数字" required>

      <p class="item">パスワード確認用</p>
      <input type="password" name="password_confirmation" id="pass_check" class="inp" value="{{ old('password_confirmation') }}" placeholder="半角英数字" required>
      <br>
      <button type="submit" id="submit_contact">送　信</button>

    </div>
  </form>

</body>
</head>
