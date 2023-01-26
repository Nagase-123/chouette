@extends('layouts.confirm_base')

@section('heading')
予約確認
@endsection

@section('msg1')
ご予約内容をご確認ください
@endsection

@section('content')

<form action="/user_function/reservation_comp" method="post">
@csrf
<!-- ユーザーID送信用 -->
<input type="hidden" name="user_id" value="{{ $inputs['user_id'] }}">
<h4 class="item">予約日時<span class="asterisk">* </span>

@if($anser == 'true')
{{ date('Y年m月d日', strtotime($inputs['予約日'])); }}
{{ $inputs['予約時間']; }}
<input type="hidden" name="予約日" id="date" value="{{ $inputs['予約日'] }}">
<input type="hidden" name="予約時間" id="res_time" value="{{ $inputs['予約時間'] }}">
@else
※選択された日時が不正です。<br>
再度日時をご確認の上ご予約ください。
@endif
</h4>

<h4 class="item">美容師<span class="asterisk">* </span>
@php
foreach($stylists as $stylist){
  if($stylist->hairstylist_id == $inputs['stylist']){
  echo $stylist->hairstylist_name;
  }
}
@endphp
<input type="hidden" name="stylist" id="stylist" value="{{ $inputs['stylist'] }}" placeholder="なし">
</h4>

<h4 class="item">要望<span class="asterisk">* </span>
@php
if(isset($inputs['request1'])){
  echo $inputs['request1'].'<br>' ;
@endphp
<input type="hidden" name="request1" value="{{ $inputs['request1'] }}">
@php
}
if(isset($inputs['request2'])){
  echo $inputs['request2'].'<br>' ;
@endphp
<input type="hidden" name="request2" value="{{ $inputs['request2'] }}">
@php
}
if(isset($inputs['request3'])){
  echo $inputs['request3'].'<br>' ;
@endphp
<input type="hidden" name="request3" value="{{ $inputs['request3'] }}">
@php
}
if(isset($inputs['request4'])){
  echo $inputs['request4'].'<br>' ;
@endphp
<input type="hidden" name="request4" value="{{ $inputs['request4'] }}">
@php
}
if(isset($inputs['request5'])){
  echo $inputs['request5'].'<br>' ;
@endphp
<input type="hidden" name="request5" value="{{ $inputs['request5'] }}">
@php
}
@endphp
</h4>

<h4 class="item">コメント<span class="asterisk">* </span>
{!! nl2br(e($inputs['メッセージ'])) !!}
<input type="hidden" name="msg" id="msg" value="{!! nl2br(e($inputs['メッセージ'])) !!}" wrap="hard">
</h4>

<div class="bt_box">
@if($anser == 'true')
<button type="submit" id="reservation" class="sb_bt">送　信</button>
@endif
<button type ="button" id="return" class="sb_bt" onclick=history.back()>戻る</button>
@endsection
