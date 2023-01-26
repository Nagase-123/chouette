
@extends('layouts.form_base')

  @section('body')
  <p class="return_home"><a href="#" onclick="history.back(-1);return false;">戻る</a></p>
  <body id="contact">
  @endsection

  @section('title','お問い合わせ')
  @section('explanation','下記の項目をご記入の上送信ボタンを押してください')
  @section('message1')
  なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。
  @endsection

  @section('form')
  <form method="post" action="/contact/confirm" autocomplete="off">
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
    @endsection

    @section('name')
    <input type="text" name="名前" id="name" placeholder="山田太郎" class="inp" value="{{ old('名前') }}" required>
    @endsection

    @section('kana')
    <input type="text" name="フリガナ" id="kana" placeholder="ヤマダタロウ" class="inp" value="{{ old('フリガナ') }}" required>
    @endsection

    @section('tel')
    <input type="text" name="電話番号" id="tel" placeholder="09012345678" class="inp" value="{{ old('電話番号') }}">
    @endsection

    @section('email')
    <input type="text" name="メール" id="email" placeholder="test@test.co.jp" class="inp" value="{{ old('メール') }}" required>
    @endsection

    @section('text_heading')
    お問い合わせ内容をご記入ください<span class="asterisk">*</span>
    @endsection

    @section('textarea')
    <textarea class="text_box" name="本文" id="textarea_box" wrap="hard" required>{{ old('本文') }}</textarea>
    @endsection

    @section('formend')
    </form>
    @endsection

    @section('footer')
    @endsection
