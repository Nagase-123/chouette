
@extends('layouts.confirm_base')

@section('heading')
コメント変更
@endsection

@section('msg1')
変更内容をご記入ください
@endsection

@section('content')
  <form method="post" action="/user_function/comment_change_comp">
    @csrf
@foreach($results as $result)

    @if ($errors->has('textarea_box'))
    <span class = "error_msg">{{$errors->first('textarea_box')}}</span>
    @endif

    <p class="msg_confirm">予約番号：{{$result->reservation_id}}</p>
    <p class="msg_confirm">ユーザー番号：{{$result->user_id}}</p>
  <input name="comment" id="textarea_box" wrap="hard"
  value="{{$result->reservation_comment}}" type="text" class="textarea_box inp">
  <input name="res_id" type="hidden" value="{{$result->reservation_id}}">

  <br>
  @endforeach

  <div class="bt_box">
    <button type="submit" class="sb_bt" id="reservation">送　信</button>
    <button type ="button" id="return" class="sb_bt" onclick=history.back()>戻る</button>
@endsection
