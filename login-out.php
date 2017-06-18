<?php require_once('header.php');?>

<div class="form-action">

<?php
session_start();
unset($_SESSION['users']);
$pdo=new PDO('mysql:host=localhost;dbname=forpleq_a;charset=utf8','root');
$sql=$pdo->prepare('select * from users where username=? and password=?');
$sql->execute([$_REQUEST['username'],$_REQUEST['password']]);
foreach ($sql->fetchAll() as $row) {
  $_SESSION['users']=[
    'user_id'=>$row['user_id'],'name'=>$row['name'],
    'username'=>$row['username'],'email'=>$row['email'],
    'password'=>$row['password']];
}

if (isset($_SESSION['users'])){
  echo 'こんにちは'.$_SESSION['users']['name'].'さん';
}else {
  echo 'ユーザー名またはパスワードが違います。';
}
 ?>

 </div>
