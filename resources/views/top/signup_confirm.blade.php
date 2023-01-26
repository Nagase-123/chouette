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
  <title>登録内容確認</title>

  <style>
  #submit_contact{
    padding: 0 5%;
    width: 50%;
    height: 5%;
    font-size: 20px;
    border-radius: 6px;
    margin: 5px 10% 15px 10%;
  }
  #return{
    padding: 0 5%;
    width: 50%;
    text-align: center;
    height: 35px;
    font-size: 20px;
    border-radius: 6px;
    background-color: #705339;
    border: 1px solid #705339;;
    color: #fff;
    margin: 5px 10% 15px 10%;
  }
  </style>
</head>

<body>

  <div class="contact-box">
    @php
    if($anser == true){
      @endphp

      <h2 class="form">登録内容確認</h2>
      <hr class="border">

      <h3>下記の項目をご確認の上送信ボタンを押してください</h3>
      <p></p>

      <form method="POST" action="/top/signup_comp" id="form">
        @csrf

        <p class="item">氏名</p>
        <p class="value">{{ $inputs['名前'] }}</p>
        <input type="hidden" name="name" id="name" value="{{ $inputs['名前'] }}" placeholder="山田太郎">

        <p class="item">フリガナ</p>
        <p class="value">{{ $inputs['フリガナ'] }}</p>
        <input type="hidden" name="kana" id="kana" value="{{ $inputs['フリガナ'] }}" placeholder="ヤマダタロウ">

        <p class="item">電話番号
        </p>
        <p class="value">{{ $inputs['電話番号'] }}</p>
        <input type="hidden" name="tel" id="tel" value="{{ $inputs['電話番号'] }}" placeholder="09012345678">

        <p class="item">メールアドレス</p>
        <p class="value">{{ $inputs['メール'] }}</p>
        <input type="hidden" name="mail" id="mail" value="{{ $inputs['メール'] }}" placeholder="test@test.co.jp">

        <p class="item">住所</p>
        <p class="value">{{ $inputs['住所'] }}</p>
        <input type="hidden" name="address" id="address" value="{{ $inputs['住所'] }}">

        <p class="item">パスワード</p>
        <p class="value">{{ $inputs['password'] }}</p>
        <input type="hidden" name="password" id="password" value="{{ $inputs['password'] }}">

    <br>
    <div class="bt">
      <button type="submit" id="submit_contact">送　信</button>
      <button type ="button" id="return" onclick=history.back()>戻る</button>
    </div>
    @php
  }else if($anser == false){
    @endphp
    <h2 class="form">新規会員登録はできません</h2>
    <hr class="border">

    <div class="empty"></div>

    <p class="caution">※メールアドレスは既に登録済みです</p>
    <p class="caution">会員ページにログインの上ご利用ください</p>
    <div class="empty"></div>

    <div class="bt">
      <button type ="button" id="return"><a class="a_color" href="{{ url('/rogin_rogout/rogin')}}">ログインページ</a></button>
      <button type ="button" id="return" onclick=history.back()>会員登録へ戻る</button>
    </div>

    @php

  }else{
    @endphp
    <p class="caution">※trueでもfalseでもない</p>
    @php
  }
  @endphp

  <div class="empty"></div>
</div>
</form>

</body>
</html>
