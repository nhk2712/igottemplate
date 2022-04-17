<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');
include('../../lang/account/signin/signin.php');
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $title;?></title>
    <link rel="shorcut icon" href="/brand.jpg">
</head>

<?php
$username = mysqli_real_escape_string($db,$_POST['username']);
$password = mysqli_real_escape_string($db,$_POST['password']);
$password = hash("sha256",$password);

$cmd = "SELECT * from account WHERE username='$username'";
$query = mysqli_query($db,$cmd);

$num=mysqli_num_rows($query);
if (!$num) die('<h3 style="text-align:center;margin-top:50px">'.$notExist.'</h3>
<div style="display:flex;justify-content:center;margin-top:20px">
    <a href="/account/signin" style="margin-right:10px;"><button class="btn btn-primary">'.$again.'</button></a>
    <a href="/account/signup"><button type="button" class="btn btn-outline-primary">'.$signUp.'</button></a>
</div>');

$res=mysqli_fetch_array($query);
if ($password!=$res['password']) die('<h3 style="text-align:center;margin-top:50px">'.$wrong.'</h3>
<div style="display:flex;justify-content:center;margin-top:20px">
    <a href="/account/signin" style="margin-right:10px;"><button class="btn btn-primary">'.$again.'</button></a>
    <a href="/"><button type="button" class="btn btn-outline-primary">'.$home.'</button></a>
</div>');
else{
    echo 'Signed in successfully!';
    $_SESSION['uid']=$res['id'];
    $db->close();
}
?>
<script>history.go(-2)</script>