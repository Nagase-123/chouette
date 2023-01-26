
※このメールはパスワードの再設定をご希望された方にお送りしております。<br>
<br>
いつもchouetteをご利用いただき、誠にありがとうございます。<br>
パスワード再設定用のURLをお送りします。<br>

<?php
$token = bin2hex(random_bytes(32));
session()->put('token',$token);
$url = "http://localhost:8000/rogin_rogout/pass_reset_confirm?token=".$token;
?>
<a href="{{ $url }}">{{ $url }}</a><br>
<br>
上記URLにアクセスし、パスワードの再設定を行ってください。<br>
有効期限は本メールを受信してから48時間となります。<br>
<br>
※※※※※本メールは送信専用のメールアドレスから送信しております。<br>
ご返信できませんのでご了承ください。※※※※※<br>
<br>
<p>
    ---------------------------------<br>
    chouette運営事務局<br>
    福岡県福岡市11-22-33<br>
    TEL：xx-xxxx-xxxx<br>
    ---------------------------------
</p>
