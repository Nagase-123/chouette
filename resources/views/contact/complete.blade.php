  @extends('layouts.comp_base')
  @section('title','お問い合わせ完了')
  @section('heading','お問い合わせ完了')

  @section('msg')
  お問い合わせ頂きありがとうございます。<br>
  送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>
  なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
  @endsection

  @section('link')
  <a href="{{url('../top')}}">トップへ戻る</a>
  @endsection
