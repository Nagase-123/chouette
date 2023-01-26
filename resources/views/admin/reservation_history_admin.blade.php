<style>
th{
  font-size: 14px;
}
</style>

@extends('layouts.list_base')

@section('th')
<h3 class="uhome_h3">reservation history list</h3>
<th class="s_th">reser<br>vation<br>id</th>
<th class="s_th">date<br> and <br>time</th>
<th class="s_th">price</th>
<th class="s_th">stylist<br>id</th>
<th class="s_th">quiet</th>
<th class="s_th">talk</th>
<th class="s_th">set</th>
<th class="s_th">shampoo</th>
<th class="s_th">kids<br>haircut</th>
<th class="s_th">comment</th>
<th class="s_th"></th>
@endsection

@section('main')

@foreach($results as $result)
<td class="s_td">{{$result->reservation_id}}</td>
<td class="s_td">{{date('m/d', strtotime($result->reservation_date))}}<br>
  {{date('H:i', strtotime($result->reservation_time))}}</td>
  <td class="s_td">{{$result->reservation_fee}}</td>
  <td class="s_td">{{$result->hairstylist_id}}</td>

  @if($result->reservation_request1 =='なし')
  <td class="s_td">×</td>
  @else
  <td class="s_td">〇</td>
  @endif

  @if($result->reservation_request2 =='なし')
  <td class="s_td">×</td>
  @else
  <td class="s_td">〇</td>
  @endif

  @if($result->reservation_request3 =='なし')
  <td class="s_td">×</td>
  @else
  <td class="s_td">〇</td>
  @endif


  @if($result->reservation_request4 =='なし')
  <td class="s_td">×</td>
  @else
  <td class="s_td">〇</td>
  @endif

  @if($result->reservation_request5 =='なし')
  <td class="s_td">×</td>
  @else
  <td class="s_td">〇</td>
  @endif

  <td class="s_td res_list_design">{{$result->reservation_comment}}</td>

  <td class="s_td">
    <form action ="/admin/reservation_cancel_comp_admin" method="post">
      @csrf
      @php
      $date = strtotime($result->reservation_date);
      $now = strtotime(date('Y-m-d'));
      if($now < $date){
        @endphp

        @php
        if($result->reservation_flg == 1){
          @endphp
          <p>キャンセル済み</p>
          @php
        }else{
          @endphp
          <p class="msg_left">キャンセルの場合は入力して下さい<br>
            <span class="msg_sml">※入力した内容でお客様に連絡が届きます。</span>
          </p>
          <textarea name="cancel_msg" wrap="hard"
          value="" type="text" class="res_textarea_box" required></textarea>

          <input type="hidden" name="res_id" value="{{$result->reservation_id}}">
          <button type="submit" name="user_sb" id="delete_bt" onclick="return alert_js()">キャンセル</button>
          @php
        }
        @endphp

        @php
      }else{
        echo 'キャンセル不可';
      }
      @endphp
    </td>
  </form>
</tr>
@endforeach
</table>

<script>
function alert_js(){
  var result=false;
  result = window.confirm('本当に削除しますか？');
  if(result){
    return true;
  }else{
    return false;
  }
}
</script>

@endsection
