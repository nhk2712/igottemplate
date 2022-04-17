<?php
session_start();

if (!isset($_GET['templateid'])) die('Invalid URL!<br>'.'<a href="/"><button class="btn btn-outline-primary">Return to home</button</a>');
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');

$templateId=mysqli_real_escape_string($db,$_GET['templateid']);
$cmd="SELECT * FROM slides WHERE id='$templateId'";
$query = mysqli_query($db,$cmd);
if(!mysqli_num_rows($query)) die('Invalid URL!<br>'.'<a href="/"><button class="btn btn-outline-primary">Return to home</button</a>');

if (isset($_SESSION['uid'])) $uid=$_SESSION['uid'];
else $uid=0;
$date=date('YmdHis');

$userDownCmd="INSERT INTO download (template,user,date) VALUES ('$templateId','$uid','$date')";
$userDownQuery=mysqli_query($db,$userDownCmd);

$res=mysqli_fetch_array($query);
$file=$_SERVER['DOCUMENT_ROOT'].'/data/slides/'.$res['path'];

header("Content-Description: File Transfer"); 
header("Content-Type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=\"". basename($file) ."\"");

readfile($file);
?>

<script>location.back();</script>