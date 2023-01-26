<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  use HasFactory;

  /*
  *問い合わせ内容をDBに追加
  */
  public function insert_contact($request){

    $inputs = $request->all();
    $contact = new Contact();
    $tel = 'なし';
    if(isset($inputs['tel'])){
      $tel = $inputs['tel'];
    }

    $contact->user_name = $inputs['name'];
    $contact->user_kana = $inputs['kana'];
    $contact->user_mail = $inputs['email'];
    $contact->user_tel = $tel;
    $contact->contact_text = $inputs['textarea_box'];

    $contact->save();

  }

  /*
  *問い合わせ内容を取得
  */
  public function get_contact($request){
    $cond_id = ['contact_id' => $request['contact_id']];
    $contact = Contact::where($cond_id)->get();
    return $contact;
  }

  /*
  *返信完了後フラグの値を変更
  */
  public function update_flg($id){
    $cond_id = ['contact_id' => $id];

    Contact::where($cond_id)->update([
      'contact_flg' =>'1',
    ]);

  }


}//クラス
