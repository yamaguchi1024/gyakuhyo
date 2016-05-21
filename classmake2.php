<?php

ini_set('display_errors',1);


$link=new SQLite3('gyakuhyo.db');
if(!$link){
  die('nyan'.$sqliteerror);
}

header('Location: /');

$name = SQLite3::escapeString($_POST['name']);
//$description = SQLite3::escapeString($_POST['description']);
$pass=SQLite3::escapeString($_POST['password']);
$sql="insert into class(name,pass) values('".$name."','".$pass."')";
$result=$link->exec($sql);
if(!$result){
  die('query had died'.$sqliteerror);
}

$link->close();


?>
