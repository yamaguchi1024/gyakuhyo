<?php
function h($str) {
  return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}

session_start();
if(!isset($_POST['id']) || !isset($_SESSION['class_id']) || $_SESSION['class_id'] != $_POST['id']) {
  header('Location: /classpage.php?id='.h($_POST['id']));
  exit;
}


$link=new SQLite3('gyakuhyo.db');
if(!$link){
  die('nyan'.$sqliteerror);
}

$name = SQLite3::escapeString($_POST['name']);
$id = SQLite3::escapeString($_POST['id']);
$sql="insert into person(name,class_id) values('".$name."',".$id.")";
$result=$link->exec($sql);
if(!$result){
  die('query had died'.$sqliteerror);
}

$link->close();

header('Location: /classpage.php?id='.h($_POST['id']));

?>
