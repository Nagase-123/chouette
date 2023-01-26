
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>パスワード再設定</title>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
  <p class="return_top"><a href=""></a></p>

  <div class="box2">
    <div class="naka">
      <form method="POST" action="/rogin_rogout/pass_reset_comp" autocomplete="off">
        @csrf
        <h3 class="rogin">パスワード再設定</h3>

        @if($result == true)

        @php
        if(isset($user_id)){
          @endphp
          <p>ID:{{$user_id}}</p>
          <input type="hidden" name="user_id" id="user_id" class="input1" value="{{$user_id}}">

          @php
        }else if(isset($stylist_id)){
          @endphp
          <p>ID:{{$stylist_id}}</p>
          <input type="hidden" name="stylist_id" id="stylist_id" class="input1" value="{{$stylist_id}}">

          @php
        }
        @endphp

        <p>{{$anser}}</p>
        @if(isset($msg))
        <p class="error_msg">※{{$msg}}</p>
        @endif

        @php
        if(isset($errors)){
          foreach($errors->all() as $error){
            @endphp
            <p class="error_msg"><span class="asterisk">*</span>{{$error}}</p>
            @php
          }
        }
        @endphp

        <table class="input_box">
          <tr>
            <td class="label_item">  パスワード:<br>
            </td>
            <td class="rogin_input1">
              <input type="password" name="password" id="pass" class="rogin_input2 inp" value="{{old('password')}}" required>
            </td>
          </tr>

          <tr>
            <td class="label_item">  パスワード確認:<br>
            </td>
            <td class="rogin_input1"><input type="password" name="password_confirmation" class="rogin_input2 inp" value="{{old('password_confirmation')}}" required></td>
          </tr>
        </table>

        <button type="submit" id="rogin_bt" name="rogin_bt" class="sub_bt" >再設定する</button>
        @else
        <p>{{$anser}}</p>

        <p>もう一度やり直してください</p>
        <a href="{{url('/rogin_rogout/rogin')}}">ログイン画面へ戻る</a>

        @endif

      </form>

    </div>
  </div>
</body>
</html>
