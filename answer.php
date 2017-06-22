<?php require_once('header.php'); ?>




<?php
 session_start();
 if (isset($_SESSION['users'])) {
   $user_id=$_SESSION['users']['user_id'];
  $pdo=new PDO('mysql:host=localhost;dbname=forpleq_a;charset=utf8','root');
 echo '<div class="form-action">';
 $sql=$pdo->prepare('insert into answer values(null,?,?)');
 if (empty($_REQUEST['id'])){
   echo 'ログインをしてください。';
 }else
 if (empty($_REQUEST['content'])){
   echo '答えを入力してください。';
 }else
 if ($sql->execute([$_REQUEST['content'],$_REQUEST['id']])){
   echo '答えを受け付けました。';
 }else{
   echo '答えを受け付けることが出来ませんでした。';
 }
 echo '</div>';
 }else{
   echo '回答するには、ログインしてください。';
 }
  ?>
