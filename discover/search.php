<?php
if (!isset($_GET['search'])) die('<title>Invalid URL</title>'.'Invalid URL!<br>'.'<a href="/"><button class="btn btn-outline-primary">Return to home</button</a>');
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');
mysqli_set_charset($db,"utf8mb4");

$uid="";
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Search results</title>
    <link rel="shorcut icon" href="../brand.jpg">
</head>

<div class="container">

<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/navbar.php');
?>

    <h2 style="margin:10px 0px 10px 0px">Search results for 
        <?php
        $search=$_GET['search'];
        echo '"'.$search.'"';
        ?>
    </h2>

    <div> <!--Search box-->
        <form action="search.php" method="GET">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Search</span>
                <input name="search" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" maxlength="50">
                <button type="submit" class="btn btn-outline-primary">Go</button>
            </div>
        </form>
    </div>

    <h4>Templates</h4>
<?php
$search=mysqli_real_escape_string($db,$search);

$cmd="SELECT * FROM slides WHERE name LIKE '%$search%' and owner<>'$uid' ORDER BY id DESC";
$query=mysqli_query($db,$cmd);

echo '<p>'.mysqli_num_rows($query).' search results found.</p>';
?>

<div style="display:flex;flex-wrap:wrap">
<?php
while ($res=mysqli_fetch_array($query)) {
    echo '<div class="card" style="width: 18rem;">';
    echo "<a href='".$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/discover/template.php?templateid=".$res['id']."'>";
    echo "<img src='../data/thumbnail/".$res['thumbnail']."' class='card-img-top' >";
    echo '<div class="card-body">';
        echo '<p class="card-text">';
            echo "<h5 style='height:30px;overflow:hidden;white-space: nowrap;text-overflow:ellipsis'>".$res["name"]."</h5>";

            if ($res['description']) echo "<div style='height:30px;overflow:hidden;white-space: nowrap;text-overflow:ellipsis'>".$res['description']."</div>";
            else echo "<div>No description</div>";

            $owner=$res['owner'];
            $cmd2 = "SELECT username FROM account WHERE id='$owner'";
            $query2 = mysqli_query($db,$cmd2);
            $res2=mysqli_fetch_array($query2);
            echo "<div>By <i>".$res2['username']."</i></div>";
        echo '</p>';
    echo '</div></a></div>';
}
?>
</div>

<?php
if (!mysqli_num_rows($query)) echo '<p>No matching results!</p>';
else echo '<p>No more search results!</p>';
?>

    <h4>Users</h4>
<?php
$cmd3="SELECT id,username,avatar FROM account WHERE username LIKE '%$search%' and id<>'$uid' ORDER BY id DESC";
$query3=mysqli_query($db,$cmd3);

echo '<p>'.mysqli_num_rows($query3).' search results found.</p>';
?>

<div style="display:flex;flex-wrap:wrap">
<?php
while($resUser=mysqli_fetch_array($query3)){
    echo '<a href="'.$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/profile?uid='.$resUser['id'].'"><div class="searchUser">'.'<img style="margin-right:10px;clip-path:circle();" class="user" src="../data/userava/'.$resUser['avatar'].'">'.'<span class="nameOfUser">'.$resUser['username'].'</span></div></a>';
}
?>
</div>

<?php
if (!mysqli_num_rows($query3)) echo '<p>No matching results!</p>';
else echo '<p>No more search results!</p>';
?>
</div>

<style>
    #userava{
        width:50px;
        clip-path:circle();
    }
    .thumb{
        width:100px;
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
    .user{
        width:70px;
    }
    .nameOfUser{
        color:black;
    }
    .searchUser{
        background-color:transparent;
        width:300px;
        padding:10px;
        border-radius:10px;
        border:2px solid lightgray;
        transition: all 0.5s;
        margin:10px;
    }
    .searchUser:hover{
        transform:scale(1.05);
    }
</style>