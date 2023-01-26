<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\HairStylist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSendController extends Controller
{

  /*
  *resert_request　パスワードリセット
  */
  public function index(Request $request){
    $request->validate([
      'メール'=>'required',
      '名前'=>'required',
    ]);
    $data = [ ];

    //DBに存在するかを確認する必要があり
    $mail = $request['メール'];
    $name = $request['名前'];

    $user = new User();
    $stylist = new HairStylist();
    //DBに情報が存在するかチェック
    //存在する場合はIDを取得する
    $user_id = $user->check_register_user($mail,$name);
    $stylist_id = $stylist->check_register_stylist($mail,$name);

    //ユーザー会員でも美容師でもない場合
    if($user_id == null && $stylist_id == null){

    }else if(isset($user_id)){
      session()->put('user_id',$user_id);
      Mail::send('emails.mailsend', $data, function($message)use($request){
        $inputs = $request->all();
        $mail = $inputs['メール'];
        $message->to($mail, 'Test')
        ->from('XXXXX@XXXXX.co.jp','Reffect')
        ->subject('パスワード再設定');
      });
    }else if(isset($stylist_id)){
      session()->put('stylist_id',$stylist_id);
      Mail::send('emails.mailsend', $data, function($message)use($request){
        $inputs = $request->all();
        $mail = $inputs['メール'];
        $message->to($mail, 'Test')
        ->from('XXXXX@XXXXX.co.jp','Reffect')
        ->subject('パスワード再設定');
      });
    }

    return view('rogin_rogout.pass_mailsend_comp',[
    ]);
  }

  /*
  *メール送信完了
  */
  public function pass_mailsend_comp(){
    return view('rogin_rogout.pass_mailsend_comp',[
    ]);
  }


}//クラス
