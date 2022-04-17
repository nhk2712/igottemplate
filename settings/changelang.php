<?php
session_start();

require($_SERVER['DOCUMENT_ROOT'].'/connect.php');
$lang=mysqli_real_escape_string($db,$_POST["lang"]);
mysqli_set_charset($db,"utf8mb4");

$uid=$_SESSION['uid'];
$cmd="UPDATE account SET lang='$lang' WHERE id='$uid'";
$query=mysqli_query($db,$cmd);

$_SESSION['lang']=$lang;
setcookie('lang',$lang,time() + (86400 * 30),'/',$_SERVER['SERVER_NAME'],false,true);
?>
<script>history.back();</script>