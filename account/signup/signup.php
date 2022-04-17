<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');

$username = mysqli_real_escape_string($db,$_POST['username']);
$password = mysqli_real_escape_string($db,$_POST['password']);
$cfpass = mysqli_real_escape_string($db,$_POST['cfpass']);

if ($cfpass!=$password) die('<h2>Wrong password confirmed!</h2><a href="/account/signup"><button>Sign up again</button></a>');

$cfpass="";
$password=hash("sha256",$password);
$email = mysqli_real_escape_string($db,$_POST['email']);
$phone = mysqli_real_escape_string($db,$_POST['phone']);
$recovery = mysqli_real_escape_string($db,$_POST['recovery']);
$answer = mysqli_real_escape_string($db,$_POST['answer']);
$date=date("YmdHis");

$cmd1 = "SELECT username FROM account WHERE username='$username'";
$query1 = mysqli_query($db,$cmd1);
$num1 = mysqli_num_rows($query1);
if ($num1) die('<h2>User already exists!</h2><a href="/account/signup"><button>Sign up again</button></a>');

$cmd2 = "INSERT INTO account (username,password,email,phone,question,answer,created,lastactive) VALUES ('$username','$password','$email','$phone','$recovery','$answer','$date','$date')";
$query2 = mysqli_query($db,$cmd2);

echo '<h2>Signed up successfully!</h2>';

$cmd3 = "SELECT id FROM account WHERE username='$username'";
$query3 = mysqli_query($db,$cmd3);
$res = mysqli_fetch_array($query3);

$_SESSION['uid']=$res['id'];
$db->close();
?>
<script>history.go(-2)</script>