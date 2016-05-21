<?php
function h($str) {
  return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}

session_start();
if(!isset($_SESSION['class_id']) || !isset($_GET['class_id']) || $_SESSION['class_id'] != $_GET['class_id']) {
  header('Location: /classpage.php?id='.h($_GET['class_id']));
  exit;
}
?>
<html>
<head>
<meta charset='UTF-8'>
<title>addperson</title>
<link rel="stylesheet" type="text.css" href="style.css">
<link rel="stylesheet" type="text.css" href="css/normalize.css">
</head>
<body>


<div id="head-border"></div>

<div id="container" class="clearfix">

<div id="contents">

<form action="/editperson2.php" method="post">

<?php

print('<p>');
print('<input type="hidden" name="person_id" value="'.h($_GET['person_id']).'">');
print('<input type="hidden" name="class_id" value="'.h($_GET['class_id']).'">');
print('</p>');
$link=new SQLite3('gyakuhyo.db');
if(!$link){
  die('sqlite is not opend'.$sqliteerror);
}
$person_id = SQLite3::escapeString($_GET['person_id']);
$class_id = SQLite3::escapeString($_GET['class_id']);
$sql='select * from person where person_id='.$person_id.' and class_id='.$class_id;
$result=$link->query($sql);
if(!$result){
  die('sql is not good'.$sqliteerror);
}
$row=$result->fetchArray();
print(h($row['name']));

print('<p>');
print('○:<br>');
print('<textarea name="good_points" rows="4" cols="40">'.h($row['good_points']).'</textarea>');
print('</p>');

print('<p>');
print('×:<br>');
print('<textarea name="bad_points" rows="4" cols="40">'.h($row['bad_points']).'</textarea>');
print('</p>');

print('<p>');
print('・:<br>');
print('<textarea name="middle_points" rows="4" cols="40">'.h($row['middle_points']).'</textarea>');
print('</p>');

$link->close();
?>

<p>
<input type="submit" value="送信"><input type="reset" value="リセット">
</p>
</form>

</div> <!-- contents -->
</div> <!-- container -->

<footer></footer>

</body>
</html>
