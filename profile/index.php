<?php
if (!isset($_GET['uid'])) die('<title>Invalid URL</title>'.'Invalid URL!<br>'.'<a href="/"><button class="btn btn-outline-primary">Return to home</button</a>');
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');
mysqli_set_charset($db,"utf8mb4");
include('../lang/profile/index.php');
$uid="";
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shorcut icon" href="../brand.jpg">
</head>

<div class="container">
    <style>
        #userava{
            width:50px;
            clip-path:circle();
        }
        #avatar{
            width:300px;
            clip-path:circle();
        }
    </style>

<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/navbar.php');
?>

<?php
$profileId=mysqli_real_escape_string($db,$_GET['uid']);
$cmd="SELECT username,avatar FROM account WHERE id='$profileId'";
$query=mysqli_query($db,$cmd);
if (!mysqli_num_rows($query)) die('<title>'.$invalid.'</title>'.'<h3 style="text-align:center;margin-top:50px">'.$invalidLong.'</h3>'.'<div style="display:flex;justify-content:center;margin-top:20px"><a href="/" ><button class="btn btn-outline-primary">'.$return.'</button</a></div></div>');

$user=mysqli_fetch_array($query);
?>
    <title>
        <?php
        echo $user['username'];
        ?>
    </title>

    <div style="display:flex;flex-wrap:wrap">
        <?php
            echo '<img id="avatar" src="../data/userava/'.$user['avatar'].'">';
        ?>
        <div>
            <h2>
                <?php
                echo $user['username'];
                ?>
            </h2>
        </div>
    </div>

    <h4><?php echo $uploadedHeader;?></h4>

    <div style="display:flex;flex-wrap:wrap">
    <?php
    $cmd2="SELECT * FROM slides WHERE owner='$profileId' ORDER BY id DESC";
    $query2=mysqli_query($db,$cmd2);
    if (!mysqli_num_rows($query2)) echo '<p>'.$noUpload.'</p>';
    else{
        while($res=mysqli_fetch_array($query2)){
            echo '<div class="card" style="width: 18rem;">';
            echo "<a href='".$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/discover/template.php?templateid=".$res['id']."'>";
            echo "<img src='../data/thumbnail/".$res['thumbnail']."' class='card-img-top' >";
            echo '<div class="card-body">';
                echo '<p class="card-text">';
                    echo "<h5 style='height:30px;overflow:hidden;white-space: nowrap;text-overflow:ellipsis'>".$res["name"]."</h5>";

                    if ($res['description']) echo "<div style='height:30px;overflow:hidden;white-space: nowrap;text-overflow:ellipsis'>".$res['description']."</div>";
                    else echo "<div>$noDesc</div>";
                echo '</p>';
            echo '</div></a></div>';
        }
    }
    ?>
    </div>

    <style>
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
</div>