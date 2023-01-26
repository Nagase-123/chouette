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
  <title>お問い合わせ内容確認</title>
  <style>
  .empty{
    margin-bottom: 10%;
  }
  #submit_contact{
    padding: 0 5%;
    margin: 5px 10% 15px 10%;
  }
  #return{
    padding: 0 5%;
    margin: 5px 10% 15px 10%;
  }
  </style>
</head>

<body>

  <div class="contact-box">

    <h2 class="form">お問い合わせ内容確認</h2>
    <hr class="border">
    <h3>下記の項目をご確認の上送信ボタンを押してください</h3>
    <p>内容を訂正する場合は、戻るを押してください</p>

    <form method="post" action="./complete">
      @csrf

      <p class="item">氏名
        <p class="value">{{$request['名前'] }}</p>
        <input type="hidden" name="name" id="name" value="{{$request['名前']}}" placeholder="山田太郎">

        <p class="item">フリガナ
          <p class="value">{{$request['フリガナ'] }}</p>
          <input type="hidden" name="kana" id="kana" value="{{$request['フリガナ'] }}" placeholder="ヤマダタロウ">

          <p class="item">電話番号</p>
          @php
          if(empty($request['電話番号'])){
            @endphp
            <p class="value">なし</p>
            @php
          }else{
            @endphp
            <p class="value">{{$request['電話番号'] }}</p>
            @php
          }
          @endphp
          <input type="hidden" name="tel" id="tel" value="{{$request['電話番号'] }}" placeholder="09012345678">

          <p class="item">メールアドレス</p>
          <p class="value">{{$request['メール'] }}</p>
          <input type="hidden" name="email" id="email" value="{{$request['メール'] }}" placeholder="test@test.co.jp">

          <h3>お問い合わせ内容</h3>
          {!! nl2br(e($request['本文'])) !!}
          <input name="textarea_box" id="textarea_box" wrap="hard"
          value="{!! nl2br(e($request['本文'])) !!}" type="hidden">

          <div class="bt">
            <button type="submit" id="submit_contact">送　信</button>
            <button type ="button" id="return" onclick=history.back()>戻る</button>
          </div>

          <div class="empty"></div>
        </div>
      </form>

    </body>
    </html>
