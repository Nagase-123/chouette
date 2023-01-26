@extends('layouts.comp_base')
@section('heading','メール送信完了')

@section('msg')
パスワード再発行メールを送信いたしました<br>
メールが届かない場合は、メールアドレスかお名前が間違っているか会員登録がありません。<br>
お困りの場合は問い合わせフォームよりお問い合わせください</p>
@endsection

@section('link')
<a href="{{url('/contact')}}">お問い合わせ</a><br>
<a href="{{url('/rogin_rogout/rogin')}}">ログイン画面へ戻る</a>
@endsection
