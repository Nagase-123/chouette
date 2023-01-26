@extends('layouts.form2_base')

@section('body')
<p class="return_home"><a href="#" onclick="history.back(-1);return false;">戻る</a></p>
<body id="contact">
  @endsection

  @section('title','お問い合わせ返信フォーム')

  @section('explanation','お問い合わせ内容')

  @foreach($results as $result)

  @section('name')
  名前：{{$result->user_name}}<br>
  @endsection

  @section('email')
  メール：{{$result->user_mail}}<br>
  @endsection

  @section('message1')
  本文：{{$result->contact_text}}
  @endsection

  @section('text_heading')
  返信内容
  @endsection

  @section('form')
  <form method="post" action="/admin/reply_confirm">
    @csrf
    <input type="hidden" name="name" id="name" value="{{$result->user_name}}">
    <input type="hidden" name="mail" id="mail" value="{{$result->user_mail}}">
    <input type="hidden" name="contact_id" id="contact_id" value="{{$result->contact_id}}">
    <input type="hidden" name="contact_text" id="contact_text" value="{{$result->contact_text}}">
    @endsection

    @section('textarea')
    <textarea class="text_box" name="textarea_box" id="textarea_box" wrap="hard" required>{{ old('本文') }}</textarea>
    @endsection

    @section('button')
    <div class="bt">
      <button type="submit" id="submit_contact">送　信</button>
    </div>
    @endsection

    @endforeach

    @section('formend')
    </form>
    @endsection

  @section('footer')
  @endsection
