<?php
require_once('header.php');

session_start();
$pdo=new PDO('mysql:host=localhost;dbname=forpleq_a;charset=utf8','root');
if (isset($_SESSION['users'])){
  $user_id=$_SESSION['users']['user_id'];
  $sql=$pdo->prepare('select * from users where user_id!=? and username=?');
  $sql->execute([$user_id,$_REQUEST['username']]);
}else{
  $sql=$pdo->prepare('select * from users where username=?');
  $sql->execute([$_REQUEST['username']]);
}
if (empty($sql->fetchAll())) {
  if (isset($_SESSION['users'])){
    $sql=$pdo->prepare('update users set name=?, email=?,
    username=?, password=? where user_id=?');
    $sql->execute([
      $_REQUEST['name'], $_REQUEST['email'],
      $_REQUEST['username'],$_REQUEST['password'], $user_id]);
    $_SESSION['users']=[
      'user_id'=>$user_id, 'name'=>$_REQUEST['name'],
      'email'=>$_REQUEST['email'],'username'=>$_REQUEST['username'],
      'password'=>$_REQUEST['password']
    ];
    echo '<p>アカウントを更新しました。</p>';
  }else {
  $sql=$pdo->prepare('insert into users valuse(null,?,?,?,?)');
  $sql->execute([
    $_REQUEST['name'],$_REQUEST['email'],$_REQUEST['username'],
    $_REQUEST['password']]);
  echo '<p>アカウントを登録しました。</p>';
  }
}else {
  echo '<p>ログイン名がすでに使われていますので、変更してください。</p>';
}
 ?>
