  @extends('layouts.comp_base')
  @section('title','スケジュール登録完了')
  @section('heading','スケジュール登録完了')

  @section('msg')
  スケジュール登録が完了しました</p>
  @endsection

  @section('link')
  <a href="{{ url('/stylist/stylist_home')}}" class="comp_a">ホームへ戻る</a>
  @endsection
