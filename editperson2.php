<?php

function h($str) {
  return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}

session_start();
if(!isset($_SESSION['class_id']) || $_SESSION['class_id'] != $_POST['class_id']) {
  header('Location: /classpage.php?id='.$_POST['class_id']);
}


$link=new SQLite3('gyakuhyo.db');
if(!$link){
  die($sqliteerror);
}



$good_points = SQLite3::escapeString($_POST['good_points']);
$bad_points = SQLite3::escapeString($_POST['bad_points']);
$middle_points = SQLite3::escapeString($_POST['middle_points']);
$person_id = SQLite3::escapeString($_POST['person_id']);
$middle_points = SQLite3::escapeString($_POST['middle_points']);
$sql="update person set good_points='".$good_points."',bad_points='".$bad_points."',middle_points='".$middle_points."' where person_id=".$person_id;

$result=$link->exec($sql);
if(!$result){ die('query had died'.$sqliteerror); }

$link->close();

header('Location: /classpage.php?id='.h($_POST['class_id']));
?>
