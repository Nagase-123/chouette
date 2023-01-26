
  @extends('layouts.comp_base')
  @section('title','ログアウト完了')
  @section('heading','ログアウト完了')

  @section('msg')
  ログアウトしました</p>
  @endsection

  @section('link')
  <a href="{{url('../top')}}" class="comp_a">トップページへ戻る</a>
  @endsection
