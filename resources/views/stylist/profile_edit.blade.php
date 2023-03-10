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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>プロフィール編集</title>
  <style>
    .text_box{
      width:100%;
      height: 200px;
    }
  </style>
</head>

<body>
  <p class="return_top"><a href="#" onclick="history.back(-1);return false;">戻る</a></p>

  <div class="contact-box">
    <h2 class="form">ID:{{$stylist_id}} プロフィール編集</h2>
    <hr class="border">
    <h3>編集内容を入力後、更新ボタンを押してください</h3>
    <p></p>
    <form method="POST" action="/stylist/profile_edit_comp" id="form">
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

      <input type="hidden" name="stylist_id" value="{{$stylist_id}}">
      @foreach($stylists as $stylist)
      <p></p>
      @endforeach

      <p class="item">氏名</p>
      <input type="text" name="名前" class="inp" id="name" value="{{$stylist->hairstylist_name }}" required>

      <p class="item">フリガナ</p>
      <input type="text" name="フリガナ" class="inp" id="kana" value="{{$stylist->hairstylist_kana}}" required>

      <p class="item">メール</p>
      <input type="text" name="メール" class="inp" id="mail" value="{{$stylist->hairstylist_mail}}" required>

      <p class="item">電話番号</p>
      <input type="text" name="電話" class="inp" id="tel" value="{{$stylist->hairstylist_tel}}" required>

      <p class="item">住所</p>
      <input type="text" name="住所" class="inp" id="address" value="{{$stylist->hairstylist_address}}" required>

      <p class="item">得意スタイル
      </p>
      <input type="text" name="得意スタイル" class="inp" id="advantage" value="{{$stylist->hairstylist_advantage}}" required>

      <p class="item">自己紹介</p>
      <textarea name="自己紹介" class="text_box" id="profile" required>{{$stylist->hairstylist_profile}}</textarea>
      <button type="submit" id="submit_contact" onclick="return check()">更新する</button>

    </div>
  </form>

</body>
</head>
