<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');
mysqli_set_charset($db,"utf8mb4");

$user=$_SESSION['uid'];
$content=mysqli_real_escape_string($db,$_POST['comment']);
$date=date("YmdHis");
$template=$_POST['template'];

$cmd="INSERT INTO comment (template,user,date,content) VALUES ('$template','$user','$date','$content')";
$query=mysqli_query($db,$cmd);
?>
<script>history.back();</script>