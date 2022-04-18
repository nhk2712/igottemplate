<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');
mysqli_set_charset($db,"utf8mb4");
?>

<?php
$newpass=mysqli_real_escape_string($db,$_POST['pass']);
$cf=mysqli_real_escape_string($db,$_POST['cf']);

if ($newpass!=$cf) die(require('wrongpass/'.$_SESSION['lang'].'.html'));
$cf="";

$newpass=hash("sha256",$newpass);
$username=mysqli_real_escape_string($db,$_POST['username']);

$cmd="UPDATE account SET password='$newpass' WHERE username='$username'";
mysqli_query($db,$cmd);

$getUid="SELECT id FROM account WHERE username='$username'";
$getUidQuery=mysqli_query($db,$getUid);
$res=mysqli_fetch_array($getUidQuery);
$_SESSION['uid']=$res['id'];
?>
<script>location.href='/'</script>