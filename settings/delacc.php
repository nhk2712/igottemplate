<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');

$uid=$_SESSION['uid'];

$cmd1="DELETE FROM account WHERE id='$uid'";
$query1=mysqli_query($db,$cmd1);

echo 'Deleted account successfully!';
$db->close();
unset($_SESSION['uid']);

echo '<script>location.href="/"</script>';

?>