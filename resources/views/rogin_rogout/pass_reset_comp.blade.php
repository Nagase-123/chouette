@extends('layouts.comp_base')
@section('heading','パスワード再設定完了')

@section('msg')
パスワードの再設定が完了いたしました。</p>
@endsection

@section('link')
<a href="{{url('/rogin_rogout/rogin')}}">ログイン画面へ戻る</a>
@endsection
