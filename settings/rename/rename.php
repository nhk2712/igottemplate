<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');
?>

<?php
$name=$_POST['name'];
$uid=$_SESSION['uid'];

$cmd1="SELECT username FROM account WHERE username='$name'";
$query1=mysqli_query($db,$cmd1);
$num1=mysqli_num_rows($query1);

if ($num1) die(include('exist/'.$_SESSION['lang'].'.html'));

$cmd2="UPDATE account SET username='$name' WHERE id='$uid'";
$query2=mysqli_query($db,$cmd2);

echo 'Changed username successfully!';
$db->close();
?>
<script>history.go(-2);</script>