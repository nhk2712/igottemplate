<?php
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');

$username = $_POST['username'];
$password = $_POST['password'];
$cfpass = $_POST['cfpass'];

if ($cfpass!=$password) die('<h2>Wrong password confirmed!</h2><a href="/account/signup"><button>Sign up again</button></a>');

$cfpass="";
$password=mysqli_real_escape_string($db,$password);
$password=hash("sha256",$password);

$cmd1 = "SELECT username FROM account WHERE username='$username'";
$query1 = mysqli_query($db,$cmd1);
$num1 = mysqli_num_rows($query1);
if ($num1) die('<h2>User already exists!</h2><a href="/account/signup"><button>Sign up again</button></a>');

$cmd2 = "INSERT INTO account (username,password) VALUES ('$username','$password')";
$query2 = mysqli_query($db,$cmd2);

session_start();
echo '<h2>Signed up successfully!</h2>';

$cmd3 = "SELECT id FROM account WHERE username='$username'";
$query3 = mysqli_query($db,$cmd3);
$res = mysqli_fetch_array($query3);

$_SESSION['uid']=$res['id'];
$db->close();

echo '<script>location.href="/"</script>';
?>