<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');
mysqli_set_charset($db,"utf8mb4");
$uid="";
include('../../lang/settings/feedback/feedback.php');
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shorcut icon" href="/brand.jpg">
	<title><?php echo $title;?></title>
</head>

<div class="container">
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/navbar.php');?>
	<style>#userava{width:50px;clip-path:circle();}</style>

<?php
    $title=mysqli_real_escape_string($db,$_POST['title']);
    $rate=mysqli_real_escape_string($db,$_POST['rate']);
    $detail=mysqli_real_escape_string($db,$_POST['detail']);
    if ($uid=="") $user=0;
    else $user=$uid;
    $date=date("YmdHis");

    $cmd="INSERT INTO feedback (user,title,rate,detail,date) VALUES ('$user','$title','$rate','$detail','$date')";
    $query=mysqli_query($db,$cmd);
?>

<h3 style="text-align:center;margin-top:50px"><?php echo $thank;?></h3>
<div style="display:flex;justify-content:center;margin-top:20px">
    <a href="/"><button class="btn btn-outline-primary"><?php echo $home;?></button></a>
</div>

</div>