<?php require_once('header.php');?>

<?php
$pdo=new PDO('mysql:host=localhost;dbname=forpleq_a;charset=utf8','root');

foreach ($pdo->query('select * from posts order by id desc') as $row) {
  echo '<div class="content">';
  echo $row['content'].':';
  echo '<br>';
  echo $row['title'];
  echo '</div>';
}
 ?>
