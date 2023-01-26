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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <style type="text/css">
  .bt{
    width: 80%;
    margin: 2% auto;
    flex-direction: row;
    justify-content: space-between;
  }
  #submit_contact{
    margin: 5px 15px 15px 0;
  }
  .empty{
    height: 50px;
  }
  .contact-box{
    height:55%;
  }
</style>
</head>

<body>
  <div class="box_all">

    <div class="parent3">
      <h3 class="heading3"> 顧客情報・メモ編集 </h3>
    </div>

    <div class="contact-box">
      <div>
        <form method="post" action="/stylist/user_memo_comp">
          @csrf
        </div>

        @foreach($users as $user)

        <p class="msg_left">会員ID：{{$user->user_id}}</p>
        <input type="hidden" name="user_id" value="{{$user->user_id}}">
        <p class="msg_left">名前:{{$user->user_name}} 様</p>
        <p class="msg_left" id="address" value="{{$user->user_address}}">住所：{{$user->user_address}}</p>
        <p class="msg_left">電話:{{$user->user_tel}}</p>

        @if ($errors->has('textarea_box'))
        <span class = "error_msg">{{$errors->first('textarea_box')}}</span>
        @endif

        <input name="memo" id="textarea_box" wrap="hard"
        value="{{$user->user_memo}}" type="text" class="textarea_box">

        @endforeach

        <br>

        <div class="bt">
          <button type="submit" id="submit_contact">更新する</button>
          <button type ="button" id="return" onclick=history.back()>戻る</button>
        </div>
      </form>

      <div id="map"></div>
      <div class="empty"></div>

    </div>

    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAiSLC1zxJfZHwn4IcqqOvzOpas1YFET_0" type="text/javascript" charset="UTF-8"></script>
    <script type="text/javascript">
    //<![CDATA[
    var map;
    var geo;

    // 初期化。bodyのonloadでinit()を指定することで呼び出し
    window.onload = function init() {
      var user = document.getElementById('address'); //住所を指定
      var useraddress = user.textContent;
      console.log(useraddress);
      // Google Mapで利用する初期設定用の変数
      var latlng = new google.maps.LatLng(39, 138);
      var opts = {
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: latlng
      };

      // getElementById("map")の"map"は、body内の<div id="map">より
      map = new google.maps.Map(document.getElementById("map"), opts);

      // ジオコードリクエストを送信するGeocoderの作成
      geo = new google.maps.Geocoder();

      // GeocoderRequest
      var req = {
        address: useraddress,
      };
      geo.geocode(req, geoResultCallback);
    }

    function geoResultCallback(result, status) {
      if (status != google.maps.GeocoderStatus.OK) {
        alert('住所が存在しません');
        return;
      }

      var latlng = result[0].geometry.location;

      map.setCenter(latlng);

      new google.maps.Marker({position:latlng, map:map});
    }

    //]]>
    </script>

  </div>
</body>
</html>
