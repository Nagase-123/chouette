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
  <title>会員情報修正</title>
</head>

<body>
  <div class="box_all">
    <p class="return_top"><a href="#" onclick="history.back(-1);return false;">戻る</a></p>

    <div class="contact-box">
      <h2 class="form">ID：{{$u_id}}　会員情報修正</h2>
      <hr class="border">
      <h3>編集内容を入力後、更新するボタンを押してください</h3>
      <p></p>

      @foreach($results as $result)
      <form method="POST" action="/user_function/user_profile_edit_comp" id="form">
        @csrf
        <input type="hidden" name="user_id" value="{{$u_id}}">

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
        <input type="text" name="名前" id="name" value="{{$result->user_name}}" placeholder="山田太郎">

        <p class="item">フリガナ</p>
        <input type="text" name="フリガナ" id="kana" value="{{$result->user_kana}}" placeholder="ヤマダタロウ">

        <p class="item">電話番号</p>
        <input type="text" name="電話" id="tel" value="{{$result->user_tel}}" placeholder="09012345678">

        <p class="item">メールアドレス</p>
        <input type="text" name="メール" id="mail" value="{{$result->user_mail}}" placeholder="test@test.co.jp">

        <p class="item">住所</p>
        <input type="text" name="住所" id="address" value="{{$result->user_address}}" placeholder="福岡市●●区●●">

        <button type="submit" id="submit_contact" onclick="return check()">更新する</button>

        <div class="empty"></div>
      </div>
      @endforeach
    </form>

  </div><!-- box_all -->
</body>
</head>
