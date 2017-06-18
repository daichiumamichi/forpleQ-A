<?php require_once('header.php'); ?>


<h1>アカウント</h1>

<?php
session_start();
$name=$email=$username=$password='';
if (isset($_SESSION['users'])){
  $name=$_SESSION['users']['name'];
  $email=$_SESSION['users']['email'];
  $username=$_SESSION['users']['username'];
  $password=$_SESSION['users']['password'];
}
  echo '<form class="singup" action="signup-out.php" method="post">';
    echo '<p>名前</p>';
    echo '<input type="text" name="name" value="'.$name.'"><br>';
    echo '<p>ユーザー名</p>';
    echo '<input type="text" name="username" value="'.$username.'"><br>';
    echo '<p>メールアドレス</p>';
    echo '<input type="text" name="email" value="'.$email.'"><br>';
    echo '<p>パスワード</p>';
    echo '<input type="password" name="password" value="'.$password.'"><br>';

    echo '<input type="submit" value="更新">';
  echo '</form>';
 ?>

<p><a href="logout.php">ログアウト</a></p>
