@extends('layouts.list_base')

@section('heading','contact list')

@section('th')
<h3 class="uhome_h3">contact list</h3>
<th class="s_th">contact<br>id</th>
<th class="s_th">date and time </th>
<th class="s_th">name</th>
<th class="s_th">kana</th>
<th class="s_th">mail</th>
<th class="s_th">tel</th>
<th class="s_th">text</th>
<th class="s_th">reply</th>
<th></th>
@endsection

@section('main')

@foreach($contacts as $contact)
<form method="post" action="/admin/contact_detail">
  @csrf

  <tr>
    <td class="s_td">{{$contact->contact_id}}</td>
    <td class="s_td">{{$contact->created_at}}</td>
    <td class="s_td">{{$contact->user_name}}</td>
    <td class="s_td">{{$contact->user_kana}}</td>
    <td class="s_td">{{$contact->user_mail}}</td>
    <td class="s_td">{{$contact->user_tel}}</td>
    <td class="s_td">{{$contact->contact_text}}</td>
    @if($contact->contact_flg == '1')
    <td class="s_td"><span class="comp_color">返信完了</span></td>
    @else
    <td class="s_td">※未返信※</td>
    @endif
    <input type="hidden" name="contact_id" value="{{$contact->contact_id}}">
    <td class="s_td"><button type="submit" name="user_sb" class="list_bt">返信</td>
    </tr>
  </form>

@endforeach
</table>
@endsection

</div>
</body>
</html>
