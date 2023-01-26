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
  <title>美容師会員登録</title>
  <style>
  .contact-box{
    height: 160vh;
  }
  </style>
</head>

<body>
  <p class="return_home"><a href="#" onclick="history.back(-1);return false;">戻る</a></p>

  <div class="contact-box">
    <h2 class="form">美容師会員登録</h2>
    <hr class="border">
    <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
    <p></p>

    <form method="POST" action="/top/stylist_signup_confirm" id="form" autocomplete="off">
      @csrf
      @php
      if(isset($errors)){
        foreach($errors->all() as $error){
          @endphp
          <p><span class="asterisk">*</span>{{$error}}</p>
          @php
        }
      }
      @endphp

      <p class="item">氏名</p>
      <input type="text" name="名前" class="inp" id="name" value="{{ old('名前') }}" placeholder="山田太郎" required>

      <p class="item">フリガナ</p>
      <input type="text" name="フリガナ" class="inp" id="kana" value="{{ old('フリガナ') }}" placeholder="ヤマダタロウ" required>

      <p class="item">電話番号</p>
      <input type="text" name="電話" class="inp" id="tel" value="{{ old('電話') }}" placeholder="09012345678" required>

      <p class="item">メールアドレス</p>
      <input type="text" name="メール" class="inp" id="mail" value="{{ old('メール') }}" placeholder="test@test.co.jp" required>

      <p class="item">住所</p>
      <input type="text" name="住所" class="inp" id="address" value="{{ old('住所') }}" placeholder="福岡市●●区●●" required>

      <p class="item">パスワード</p>
      <input type="password" name="password" class="inp" id="password" value="{{ old('password') }}" placeholder="半角英数字" required>

      <p class="item">パスワード確認用</p>
      <input type="password" name="password_confirmation" class="inp" id="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="半角英数字" required>

      <p class="item">得意スタイル</p>
      <input type="text" name="得意スタイル" class="inp" id="advantage" value="{{ old('得意スタイル') }}" placeholder="ショートカットが得意です" required>

      <p class="item">自己紹介</p>
      <textarea class="text_box" name="自己紹介" class="inp" id="profile" wrap="hard" placeholder="美容師歴●●年です、よろしくお願いします。" required>{{ old('自己紹介') }}</textarea>
      <br>

      <button type="submit" id="submit_contact" onclick="return check()">送信</button>
    </div>
  </form>

</body>
</head>
