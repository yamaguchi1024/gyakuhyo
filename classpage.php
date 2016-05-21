<?php

session_start();
ini_set('display_errors',1);
?>

<html>
<head>
<title>classpage</title>
<meta charset='UTF-8'>

<link rel="stylesheet" type="text.css" href="style2.css">
<link rel="stylesheet" type="text.css" href="css/normalize.css">

</head>
<body>

<div id="head-border"></div>

<div id="container" class="clearfix" style="background: #FFFFF6">


<div id="contents">

<?php
function h($str) {
  return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}
$link=new SQLite3('gyakuhyo.db');
if(!$link){
  die('nyan'.$sqliteerror);
}


if(isset($_GET['pass'])){
  $id = SQLite3::escapeString($_GET['id']);
  $sql="select pass from class where class_id = ".$id;
  $result=$link->query($sql);
  $row=$result->fetchArray();
  if($row['pass']===$_GET['pass']){
    $_SESSION['class_id']=$_GET['id'];
  }else{
    print('<h1>パスワードが違うやで</h1>');
  }
}

if(isset($_SESSION['class_id']) && isset($_GET['id']) && $_SESSION['class_id'] === $_GET['id']){
  //ログイン済
  $id = SQLite3::escapeString($_GET['id']);
  $sql="select * from person where class_id = ".$id;
  $result=$link->query($sql);
  if(!$result){
    die('query had died'.$sqliteerror);
  }
  print('<br><a href="/addperson.php?id='.h($_GET['id']).'">人を追加します</a><br><br>');
  while($row=$result->fetchArray()){
    print('<table>');
    print('<caption><a href="/editperson.php?class_id='.h($row['class_id']).'&person_id='.h($row['person_id']).'">'.h($row['name']).'</a></caption>');
    print('<tr><th>◯</th>');
    print('<td>'.h($row['good_points']).'</td></tr>');
    print('<tr><th>×</th>');
    print('<td>'.h($row['bad_points']).'</td></tr>');
    print('<tr><th>・</th>');
    print('<td>'.h($row['middle_points']).'</td></tr>');
    print('</table><br>');
  }

}else{
  print('<link rel="stylesheet" type="text.css" href="style.css">');
  //未ログイン
  print('<h1>パスワードが必要です</h1>');
  print('<form action="classpage.php" method="get">');
  print('<dt>パスワード</dt><dd><input type="password" name="pass"></dd>');
  print('<input type="hidden" name="id" value="'.h($_GET['id']).'">');
  print('<input type="submit" value="送信する">');
  print('</form>');
}


$link->close();



?>


</div> <!-- contents -->
</div> <!-- container -->

<footer></footer>

</body>
</html>
