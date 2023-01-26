@extends('layouts.comp_base')

@section('title','会員登録')
@php
if($anser == '既に会員登録があります'){
@endphp
@section('heading','会員登録失敗')
@php
}else{
@endphp
@section('heading','会員登録完了')
@php
}
@endphp

@section('msg')
{{$anser}}<br>
会員ページにログインの上ご利用ください</p>
@endsection

@section('link')
<a href="{{ url('/rogin_rogout/rogin')}}">ログインページ</a>
@endsection
