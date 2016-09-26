<?php 
  session_start();
  require('dbconnect.php');

    if (empty($_REQUEST['tweet_id'])) {
    // tweet_idがパラメータになかったらindex.phpへ遷移
    header('Location: index.php');
    exit();
  }

  // 編集を反映する
  if(!empty($_POST)){
    if ($_POST['tweet'] != '') {
        $sql = sprintf('UPDATE `tweets` SET `tweet`= "%s" WHERE `tweet_id` = %d',
    mysqli_real_escape_string($db, $_POST['tweet']),
    mysqli_real_escape_string($db, $_POST['tweet_id'])
    );
    mysqli_query($db, $sql) or die(mysqli_error($db));
    }
  }


 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<title></title>
<script language="JavaScript">
<!--
// 一定時間経過後に指定ページにジャンプする
mnt = 3; // 何秒後に移動するか？
url = "index.php"; // 移動するアドレス
function jumpPage() {
  location.href = url;
}
setTimeout("jumpPage()",mnt*1000)
//-->
</script>
</head>
<body bgcolor="#ffffff">
 <p>投稿内容を変更しました。</p>
 <p>自動的に画面が切り替わります。画面が切り替わらない場合は、リンクをクリックしてください。</p>
 <a href="index.php">最初の画面に戻る</a>
</body>
</html>


