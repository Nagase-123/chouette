<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
  <meta content="width=device-width; initial-scale=1.0" name="viewport">
  <meta NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW,NOARCHIVE">
  <link href="{{ asset('css/form_style.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <style>
  </style>
</head>
  @yield('body')

  <div class="contact-box">
    <h2 class="form">@yield('title')</h2>
    <hr class="border">
    <h3>@yield('explanation')</h3>
    <p>@yield('message1')</p>

    <div>
      @yield('form')
    </div>

    <p class="item">氏名<span class="asterisk">* </span>
      @if ($errors->has('name'))
      <span class = "error_msg">{{$errors->first('name')}}</span>
      @endif
    </p>
    @yield('name')

    <p class="item">フリガナ<span class="asterisk">*</span>
      @if ($errors->has('kana'))
      <span class = "error_msg">{{$errors->first('kana')}}</span>
      @endif
    </p>
    @yield('kana')

    <p class="item">電話番号
      @if ($errors->has('tel'))
      <span class = "error_msg">{{$errors->first('tel')}}</span>
      @endif
    </p>
    @yield('tel')

    <p class="item">メールアドレス<span class="asterisk">*</span>
      @if ($errors->has('email'))
      <span class = "error_msg">{{$errors->first('email')}}</span>
      @endif
    </p>
    @yield('email')

    <h3>@yield('text_heading')
      @if ($errors->has('textarea_box'))
      <span class = "error_msg">{{$errors->first('textarea_box')}}</span>
      @endif
    </h3>
    @yield('textarea')
    <br>

    <div class="bt">
      <button type="submit" id="submit_contact">送　信</button>
      @yield('return')
    </div>
    <div class="empty"></div>
  </div>
  @yield('formend')

  <div>
    @yield('footer')
  </div>

</body>
</html>
