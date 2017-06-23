<?php require_once('header.php'); ?>

<?php
$pdo=new PDO('mysql:host=localhost;dbname=forpleq_a;charset=utf8','root');
$sql=$pdo->prepare('select * from posts where id=?');
$sql->execute([$_REQUEST['id']]);
foreach ($sql->fetchAll() as $row) {
  echo '<p>'.$row['title'].'</p><br>';
  echo '<p>'.$row['content'].'</p>';
}

echo '<hr>';
echo '<h2>回答</h2>';
$sql=$pdo->prepare('select * from posts, answer where id=? and posts.id=post_id ');
$sql->execute([$_REQUEST['id']]);
foreach ($sql->fetchAll() as $row) {
  $id = $row['answer_id'];
  echo '<li>'.$row['content'].'</li>';
}

echo '
 <p><コメント></p>
 <form class="answer-new" action="answer.php" method="post">
   <p>アンサー</p>
   <input type="hidden" name="id" value="'.$_REQUEST['id'].'">
   <input type="text" name="content">
   <br>
   <input type="submit" name="submit" value="答える">
 </form>';

?>
