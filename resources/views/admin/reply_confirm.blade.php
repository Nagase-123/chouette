
@extends('layouts.form2_base')

  @section('body')
  <body id="contact">
  @endsection

  @section('title','返信内容確認')
  @section('explanation','お問い合わせ内容')

  @section('name')
  <p>名前：{{$results['name']}}<br></p>
  @endsection

  @section('email')
  <p>メール：{{$results['mail']}}<br></p>
  @endsection

  @section('message1')
  <p>本文：{{$results['contact_text']}}</p>
  @endsection

  @section('text_heading')
  返信内容
  @endsection

  @section('form')
  <form method="post" action="/admin/reply_comp">
    @csrf
    <input type="hidden" name="name" id="name" value="{{$results['name']}}">
    <input type="hidden" name="mail" id="mail" value="{{$results['mail']}}">
    <input type="hidden" name="contact_id" id="contact_id" value="{{$results['contact_id']}}">
    <input type="hidden" name="textarea_box" id="textarea_box" value="{{$results['textarea_box']}}">
  @endsection

    @section('textarea')
    <p>{{$results['textarea_box']}}</p>
    <hr class="border">
    @endsection

    @section('button')
    <div class="bt_box">
      <button type="submit" class="sb_bt bt1" onclick="return alert_js()">送　信</button>
      <button type ="button" class="sb_bt bt2" onclick=history.back()>戻る</button>
    </div>
    @endsection
    
    @section('formend')
    </form>
    @endsection

  @section('footer')
  @endsection
