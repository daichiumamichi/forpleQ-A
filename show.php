<?php require_once('header.php');?>
<form  action="show.php" method="post">
  <input type="text" name="keyword">
  <input type="submit" value="検索">
</form>
<hr>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=forpleq_a;charset=utf8','root');
if (isset($_REQUEST['keyword'])){
  $sql=$pdo->prepare('select * from posts where name like?');
  $sql->execute(['%'.$_REQUEST['keyword'].'%']);
}else {
  $sql=$pdo->prepare('select * from posts');
  $sql->execute([]);
}
foreach ($pdo->query('select * from posts order by id desc') as $row) {
  $id = $row['id'];
  echo '<div class="content">';
  echo $row['content'].':';
  echo '<br>';
  echo '<a href="detail.php?id='.$id.'">'.$row['title'].'</a>';
  echo '</div>';
}
 ?>
