<?php 
function h($str) {
  return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}

session_start();
if(!isset($_SESSION['class_id']) || !isset($_GET['id']) || $_SESSION['class_id'] != $_GET['id']) {
  header('Location: /classpage.php'.$_GET['id']);
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


<form action="/addperson2.php" method="post">
<?php


print('<p>');
print('<input type="hidden" name="id" value="'.h($_GET['id']).'">');
print('</p>');
?>
<p>
名前:<input type="text" name="name" size="40">
</p>
<p>
<input type="submit" value="送信"><input type="reset" value="リセット">
</p>
</form>

</div> <!-- contents -->
</div> <!-- container -->

<footer></footer>

</body>
</html>
