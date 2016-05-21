<?php
require('sql.php');
?>

<html>

<head>
<title>top</title>
<meta charset='UTF-8'>

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="css/normalize.css">

</head>

<body>

<div id="head-border"> </div>

<div id="container" class="clearfix">

<div id="contents">


<div id="contents-left">

<div id="main-logo">
<img src="image/logo.png" /> 
</div> <!-- main-logo -->

<div id="menu">
<img src="image/menu.png" alt="Menu" />
<nav id="nav-left">
<a href="http://yahoo.co.jp?id=a">
<font color="red">
１８歳未満はこちら
</font>
</a>
</nav>
</div> <!-- menu -->

</div> <!-- contents-left -->

<div id="contents-main">
&nbsp;
</div> <!-- contents-main -->

<div id="contents-right">

<h1>
<a href="/classmake.php">新しくクラスを作る</a>
</h1>

<nav id="nav-right">
<ul>
<?php

function h($str) {
  return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}

$sql="select name,class_id from class";
$result=$link->query($sql);
if(!$result){
  die('query had died'.$sqliteerror);
}
while($row=$result->fetchArray()){
  print('<li><a href="/classpage.php?id='.h($row['class_id']).'">'.h($row['name']).'</a></li>'."\n");
}
?>
</ul>
</nav> <!-- nav-right -->
</div> <!-- contents-right -->

</div> <!-- contents -->
</div> <!-- container -->
<footer>
</footer>
</body>
</html>

?>
