<?php
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');

$username = $_POST['username'];
$password = $_POST['password'];
$password=mysqli_real_escape_string($db,$password);
$password = hash("sha256",$password);

$cmd = "SELECT * from account WHERE username='$username'";
$query = mysqli_query($db,$cmd);

$num=mysqli_num_rows($query);
if (!$num) die('User does not exist. Wanna sign up?'
.'<br/>'
.'<a href="/account/signin"><button>Sign in again</button></a>'
.'<a href="/account/signup"><button>Sign up</button></a>');

session_start();
$res=mysqli_fetch_array($query);
if ($password!=$res['password']) die('Wrong password!'.'<br/>'.'<a href="/account/signin"><button>Sign in again</button></a>');
else{
        echo 'Signed in successfully!';
        $_SESSION['uid']=$res['id'];
        $db->close();
}
?>
<script>history.go(-2)</script>