<style>
.table_list{
  margin-bottom: 3%;
  margin-top: 0px;
}
</style>

@extends('layouts.list_base')

@section('main')
<h3 class="uhome_h3">reservation detail</h3>

@foreach($reservations as $reservation)
<table class="table_list">
  <tr>
    <th class="s_th">reservation<br>id</th>
    <th class="s_th">reservation<br>date and time</th>
    <th class="s_th">price</th>
    <th class="s_th">quiet</th>
    <th class="s_th">talk</th>
    <th class="s_th">set</th>
    <th class="s_th">shampoo</th>
    <th class="s_th">kids<br>haircut</th>
    <th class="s_th">comment</th>
  </tr>

  <tr>
    <td class="s_td">{{$reservation->reservation_id}}</td>
    <td class="s_td">{{date('m/d', strtotime($reservation->reservation_date))}}
      {{date('H:i', strtotime($reservation->reservation_time))}}</td>
      <td class="s_td">{{$reservation->reservation_fee}}</td>

      @if($reservation->reservation_request1 =='なし')
      <td class="s_td">×</td>
      @else
      <td class="s_td">〇</td>
      @endif

      @if($reservation->reservation_request2 =='なし')
      <td class="s_td">×</td>
      @else
      <td class="s_td">〇</td>
      @endif

      @if($reservation->reservation_request3 =='なし')
      <td class="s_td">×</td>
      @else
      <td class="s_td">〇</td>
      @endif

      @if($reservation->reservation_request4 =='なし')
      <td class="s_td">×</td>
      @else
      <td class="s_td">〇</td>
      @endif

      @if($reservation->reservation_request5 =='なし')
      <td class="s_td">×</td>
      @else
      <td class="s_td">〇</td>
      @endif

      <td class="s_td">{{$reservation->reservation_comment}}</td>

    </tr>
  </table>

  <h3 class="uhome_h3">　　　user information　　　</h3>

  <table class="table_list">
    <tr>
      <th class="s_th">user<br>id</th>
      <th class="s_th">name</th>
      <th class="s_th">kana</th>
      <th class="s_th">tel</th>
      <th class="s_th">address</th>
      <th class="s_th">memo</th>
    </tr>

    <tr>
      @foreach($users as $user)
      <td class="s_td">{{$user->user_id}}</td>
      <td class="s_td">{{$user->user_name}}</td>
      <td class="s_td">{{$user->user_kana}}</td>
      <td class="s_td">{{$user->user_tel}}</td>
      <td class="s_td">{{$user->user_address}}</td>
      <td class="s_td">{{$user->user_memo}}</td>
    </tr>
    @endforeach
  </table>

  <h3 class="uhome_h3">　　　stylist information　　　</h3>

  <table class="table_list">
    <tr>
      <th class="s_th">stylist<br>id</th>
      <th class="s_th">name</th>
      <th class="s_th">kana</th>
      <th class="s_th">tel</th>
      <th class="s_th">advantage</th>
    </tr>

    <tr>
      @foreach($stylists as $stylist)
      <td class="s_td">{{$stylist->hairstylist_id}}</td>
      <td class="s_td">{{$stylist->hairstylist_name}}</td>
      <td class="s_td">{{$stylist->hairstylist_kana}}</td>
      <td class="s_td">{{$stylist->hairstylist_tel}}</td>
      <td class="s_td">{{$stylist->hairstylist_advantage}}</td>
    </tr>
    @endforeach
  </table>

  <div class="cxl">
    <p class="msg_p1">キャンセルの場合は入力して下さい<br>
      <span class="msg_sml">※入力した内容でお客様に連絡が届きます。</span></p>

      <form method="post" action="/admin/reservation_cancel_comp_admin" autocomplete="off">
        @csrf

        <input name="cancel_msg" wrap="hard"
        value="" type="text" class="textarea_box inp" required>

        <input type="hidden" name="res_id" value="{{$reservation->reservation_id}}">
        <button type="submit" name="user_sb" class ="" id="del_bt" onclick="return alert_js()">キャンセル</button>
      </form>
    </div>
    @endforeach
  </div>

  <script>
  function alert_js(){
    var result=false;
    result = window.confirm('本当にキャンセルしますか？');
    if(result){
      return true;
    }else{
      return false;
    }
  }
</script>

</body>
</html>
@endsection
