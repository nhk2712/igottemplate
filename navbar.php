<?php
if (!isset($_SESSION['uid'])){
    if (!isset($_SESSION['lang'])) $_SESSION['lang']='en-US';
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
include('lang/navbar.php');
?>

<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="/">
    <img src="/brand.jpg" width="50" height="50" class="d-inline-block align-top" alt="Brand logo">
    Brand name
  </a>
    <div style="margin-right:10px;">
        <?php
        if (!isset($_SESSION['uid'])){
            echo '<a href="../account/signin" style="margin-right:10px;"><button type="button" class="btn btn-primary">'.$signIn.'</button></a>'
            .'<a href="../account/signup"><button type="button" class="btn btn-outline-primary" style="margin-right:10px;">'.$signUp.'</button></a>'
            .'<a href="../settings"><button type="button" class="btn btn-outline-secondary">'.$settings.'</button></a>';
        }
        else{
            $uid=$_SESSION['uid'];
            $date=date("YmdHis");
            $updateCmd="UPDATE account SET lastactive='$date' WHERE id='$uid'";
            mysqli_query($db,$updateCmd);

            $cmd = "SELECT username,avatar FROM account WHERE id='$uid'";
            $query = mysqli_query($db,$cmd);
            $res=mysqli_fetch_array($query);

            echo '<a href="/upload"><button type="button" class="btn btn-outline-primary">'.$upload.'</button></a>';
            echo '<div class="btn-group" role="group">';
            echo '<button id="btnGroupDrop1" type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border:none;background-color:transparent">';
            echo '<img id="userava" src="/data/userava/'.$res['avatar'].'">';
            echo "<span style='margin-left:10px'>".$res['username'].'</span>';
            echo '
            </button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="/account/signout">'.$signOut.'</a>
                <a class="dropdown-item" href="/profile?uid='.$uid.'">'.$profile.'</a>
                <a class="dropdown-item" href="/settings">'.$settings.'</a>
            </ul></div>';
        }
        ?>
        <style>#userava{-webkit-clip-path:circle();}</style>
    </div>
</nav>