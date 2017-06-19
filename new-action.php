<?php
require_once('header.php');
session_start();
if (isset($_SESSION['users'])) {
  $user_id=$_SESSION['users']['user_id'];
 $pdo=new PDO('mysql:host=localhost;dbname=forpleq_a;charset=utf8','root');
echo '<div class="form-action">';
$sql=$pdo->prepare('insert into posts values(null,?,?,?)');
if (empty($_REQUEST['title'])){
  echo 'タイトルを入力してください';
}else
if (empty($_REQUEST['content'])){
  echo '質問内容を入力してください';
}else
if ($sql->execute([$_REQUEST['title'],$_REQUEST['content'],$user_id])){
  echo '質問を受け付けました。';
}else{
  echo '質問を受け付けられませんでした。';
}
echo '</div>';
}else{
  echo '質問をするには、ログインしてください。';
}
 ?>
