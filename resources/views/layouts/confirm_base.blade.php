<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
  <meta content="width=device-width; initial-scale=1.0" name="viewport">
  <meta NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW,NOARCHIVE">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <style>
  .box{
    border-radius: 5px;
    width: 60%;
    margin:0 auto;
    border: 1px solid #D2B48C;
    padding: 10px 10px 30px 10px;
  }
  h3{
    width: 30%;
    margin: 5% 35% 0 35%;
  }
  h4{
    margin-left: 10%;
    margin-bottom: 2%;
    margin-top: 2%;
  }
  input{
    margin: 1% 35%;
  }
  h2 {
    font-size: 50px;
    font-family: 'Vladimir Script','Sacramento','Kosugi', cursive;
  }
</style>

<h3>@yield('heading')</h3>
<p class="msg_p1">@yield('msg1')</p>
<div class="box">

  @yield('content')

</div>
</form>

</form>
<div class="empty"></div>
</div>
</body>
</html>
