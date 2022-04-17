<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');

$uid=$_SESSION['uid'];
$q=$_GET['q'];
$t=$_GET['t'];

if ($q=="like"){
    $date=date("YmdHis");
    $cmd="INSERT INTO liker (template,user,date) VALUES ('$t','$uid','$date')";
    $query=mysqli_query($db,$cmd);
}
if ($q=="unlike"){
    $cmd="DELETE FROM liker WHERE template='$t' AND user='$uid'";
    $query=mysqli_query($db,$cmd);
}
?>
<script>history.back();</script>