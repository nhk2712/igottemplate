<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');
mysqli_set_charset($db,"utf8mb4");
?>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shorcut icon" href="/brand.jpg">
</head>

<div class="container">
	<nav class="navbar navbar-light bg-light">
		<a class="navbar-brand" href="/">
			<img src="/brand.jpg" width="50" height="50" class="d-inline-block align-top" alt="Brand logo">
			Brand name
		</a>
	</nav>

<?php
$username=mysqli_real_escape_string($db,$_POST['username']);
$question=mysqli_real_escape_string($db,$_POST['question']);
$answer=mysqli_real_escape_string($db,$_POST['answer']);

$cmd="SELECT answer FROM account WHERE username='$username' AND question='$question'";
$query=mysqli_query($db,$cmd);
$res=mysqli_fetch_array($query);
$trueAns=$res['answer'];

if ($answer!=$trueAns){
    die(require('wrong/'.$_SESSION['lang'].'.html'));
}
else{
    require('newpass/'.$_SESSION['lang'].'.html');
    echo '<input type="text" name="username" value="'.$username.'" readonly style="display:none">';
}
?>
</div>