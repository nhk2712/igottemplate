<?php
session_start();
require('connect.php');
mysqli_set_charset($db,"utf8mb4");
$uid="";
if (!isset($_SESSION["uid"]) && isset($_COOKIE["uid"])) $_SESSION["uid"]=$_COOKIE["uid"];
if (!isset($_SESSION['uid'])){
    if (!isset($_SESSION['lang'])) {
        if (!isset($_COOKIE['lang'])) $_COOKIE['lang']='en-US';
        $_SESSION['lang']=$_COOKIE['lang'];
    }
}
else{
    $tmpUid=$_SESSION['uid'];
    $getLang="SELECT lang FROM account WHERE id='$tmpUid'";
    $langQuery=mysqli_query($db,$getLang);
    $lang=mysqli_fetch_array($langQuery)['lang'];
    $_SESSION['lang']=$lang;
    setcookie('lang',$lang,time() + (86400 * 30),'/',$_SERVER['SERVER_NAME'],false,true);
    setcookie('uid',$tmpUid,time() + (86400 * 30),'/',$_SERVER['SERVER_NAME'],false,true);
}
include('lang/index.php');
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $title;?></title>
    <link rel="shorcut icon" href="brand.jpg">
</head>

<div class="container">
    <!-- Header -->
    <?php
        require_once('navbar.php');
    ?>

<h2><?php echo $discover;?></h2>

    <div> <!--Search box-->
        <form action="discover/search.php" method="GET">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3"><?php echo $search;?></span>
                <input name="search" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" maxlength="50">
                <button type="submit" class="btn btn-outline-primary"><?php echo $go;?></button>
            </div>
        </form>
    </div>

<?php
$cmd1="SELECT * FROM slides WHERE owner<>'$uid' ORDER BY id DESC LIMIT 50"; # get latest 50 templates, from earliest to oldest
$query1=mysqli_query($db,$cmd1);
?>

<h4><?php echo $latest;?></h4>
<div style="display:flex;flex-wrap:wrap">
<?php
while ($res=mysqli_fetch_array($query1)) {
    echo '<div class="card" style="width: 18rem;">';
    echo "<a href='".$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/discover/template.php?templateid=".$res['id']."'>";
    echo "<img src='../data/thumbnail/".$res['thumbnail']."' class='card-img-top' >";
    echo '<div class="card-body">';
        echo '<p class="card-text">';
            echo "<h5 style='height:30px;overflow:hidden;white-space: nowrap;text-overflow:ellipsis'>".$res["name"]."</h5>";

            if ($res['description']) echo "<div style='height:30px;overflow:hidden;white-space: nowrap;text-overflow:ellipsis'>".$res['description']."</div>";
            else echo "<div>$noDescript</div>";

            $owner=$res['owner'];
            $cmd2 = "SELECT username FROM account WHERE id='$owner'";
            $query2 = mysqli_query($db,$cmd2);
            $res2=mysqli_fetch_array($query2);
            echo "<div>$by <i>".$res2['username']."</i></div>";
        echo '</p>';
    echo '</div></a></div>';
}
?>
</div>

<!--TODO-->
<!--<h4><?php echo $forU;?></h4>-->
<!--<h4><?php echo $byCate;?></h4>-->
<!--<h4><?php echo $recent;?></h4>-->
<!--<h4><?php echo $popular;?></h4>-->
</div> <!--Closing container tag-->

<style>
    #userava{
        width:50px;
        clip-path:circle();
    }
    .tile{
        background-color:lightgray;
    }
    .card{
        transition:all 0.5s;
        margin:20px;
    }
    .card:hover{
        transform:scale(1.05);
    }
    .card-body{
        color:black;
    }
    a{
        text-decoration:none;
    }
</style>