<?php
if (!isset($_GET['templateid'])) die('<title>Invalid URL</title>'.'Invalid URL!<br>'.'<a href="/"><button class="btn btn-outline-primary">Return to home</button</a>');
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');
mysqli_set_charset($db,"utf8mb4");
include('../lang/discover/template.php');
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

<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/navbar.php');
?>

<style>
    #userava{
        width:50px;
        clip-path:circle();
    }
    #uploader{
        width:30px;
        clip-path:circle();
    }

    @media all and (max-width:1024px){
        .thumb{
            width:100%;
        }
    }
    @media all and (min-width:1024px){
        .thumb{
            width:45%;
        }
    }
    #owner{
        font-weight:bold;
        font-style:italic;
        color:black;
    }
    a{
        text-decoration:none;
    }
</style>

<?php
$templateId=mysqli_real_escape_string($db,$_GET['templateid']);
$cmd="SELECT * FROM slides WHERE id='$templateId'";
$query=mysqli_query($db,$cmd);
if (!mysqli_num_rows($query)) die('<title>'.$invalid.'</title>'.'<h3 style="text-align:center;margin-top:50px">'.$invalidLong.'</h3>'.'<div style="display:flex;justify-content:center;margin-top:20px"><a href="/" ><button class="btn btn-outline-primary">'.$return.'</button</a></div></div>');

$date=date("YmdHis");
if ($uid=="") $viewer=0;
else $viewer=$uid;
$viewCmd="INSERT INTO view (template,user,date) VALUES ('$templateId','$viewer','$date')";
$viewQuery=mysqli_query($db,$viewCmd);

$res=mysqli_fetch_array($query);
?>

<title><?php echo $res['name']; ?></title>
<div style="display:flex;flex-wrap:wrap;justify-content:space-evenly">
    <img class='thumb' style='margin:20px 0px 20px 0px' src='<?php echo "../data/thumbnail/".$res['thumbnail']; ?>'>
    <div class="thumb" style="margin:20px 0px 20px 0px">
        <h2><?php echo $res['name']; ?></h2>
        <?php
            $owner=$res['owner'];
            $cmd2 = "SELECT username,avatar FROM account WHERE id='$owner'";
            $query2 = mysqli_query($db,$cmd2);
            $res2=mysqli_fetch_array($query2);
            echo '<p>'.$uploadedBy.' '.'<a href="'.$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/profile?uid='.$res['owner'].'">'.'<img id="uploader" src="../data/userava/'.$res2['avatar'].'">'.'<span id="owner">'.$res2['username'].'</span></a></p>';
        ?>

        <h4><?php echo $likeHeader;?></h4>
            <?php
                if ($uid=="") echo "<p>$noUserLike</p>";
                else{
                    $checkLikeCmd="SELECT * FROM liker WHERE user='$uid' AND template='$templateId'";
                    $checkLikeQuery=mysqli_query($db,$checkLikeCmd);
                    $isLiked=mysqli_num_rows($checkLikeQuery);
                    if ($isLiked){
                        echo '<a href="interact/like.php?q=unlike&t='.$templateId.'"><button id="likeButton" style="background-color:red;color:white;">';
                        include('heart-fill.svg');
                        echo '</button></a>';
                    }
                    else{
                        echo '<a href="interact/like.php?q=like&t='.$templateId.'"><button id="likeButton" style="background-color:white;color:red;">';
                        include('heart-fill.svg');
                        echo '</button></a>';
                    }
                }
            ?>
            <span>(<?php
                $countLikeCmd="SELECT * FROM liker WHERE template='$templateId'";
                $countLikeQuery=mysqli_query($db,$countLikeCmd);
                $numLike=mysqli_num_rows($countLikeQuery);
                echo $numLike;
            ?> <?php echo $likeLabel;?>)</span>

        <h4 style="margin-top:20px"><?php echo $downloadHeader;?></h4>
        <div style="display:flex;align-items:baseline;">
            <?php
            echo '<a href="download.php?templateid='.$templateId.'"><button type="button" class="btn btn-success">'.$downloadBtn.'</button></a>';
            ?>
            <p style="margin-left:20px">(<?php 
                $countDnloadCmd="SELECT * FROM download WHERE template='$templateId'";
                $countDnloadQuery=mysqli_query($db,$countDnloadCmd);
                $numDown=mysqli_num_rows($countDnloadQuery);
                echo $numDown;
            ?> <?php echo $downloadLabel;?>)</p>
        </div>
    </div>
</div>

<!--Share to FB-->
<head>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0" nonce="XvnqIcPg"></script>
</head>
<h4><?php echo $shareHeader;?></h4>
    <div style="display:flex">
        <button id="link" class="share"><img src="link-45deg.svg">Copy link</button>
        <div class="fb-share-button share" data-layout="button" data-size="large"><a target="_blank" class="fb-xfbml-parse-ignore">Share</a></div>
        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button share" data-size="large" data-show-count="false">Tweet</a>
    </div>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<div id="copied" style="display:none;"><?php echo $copiedNoti;?></div>

<style>
    @keyframes appear{
        0%{opacity:0}
        100%{opacity:1}
    }
    @keyframes disappear{
        0%{opacity:1}
        100%{opacity:0}
    }
    #link{
        height:28px;
        border:none;
        border-radius:5px;
        background-color:gray;
        color:white;
        font-size:15px;
    }
    .share{
        margin:0px 5px 0px 5px;
    }
    #likeButton{
        margin-right:10px;
        padding:7px;
        border-radius:5px;
        border:2px solid red;
        transition:all 0.5s;
    }
    #likeButton:hover{
        transform:scale(1.1);
    }
    #likeButton:active{
        transform:scale(1.3);
    }
</style>

<script>
    document.querySelector('#link').onclick = function(){
        navigator.clipboard.writeText(location.href)
        var copied = document.querySelector('#copied')
        copied.style.display="block"
        copied.style.animation="appear 0.5s"
        setTimeout(function(){
            copied.style.animation="disappear 0.5s"
            setTimeout(function(){
                copied.style.display="none"
            },500)
        },10000)
    }
</script>

<h4><?php echo $previewHeader;?></h4>
<div class="preview" style="width:100%">
<?php
$path=$res['path'];
$num=count(glob("../data/preview/$path/*"));
if ($num>0){
    echo '<style>.preview{display:flex;justify-content:center;}</style>';
    echo '<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="width:500px">
    <div class="carousel-inner">';
    for ($i=0; $i<$num; $i++) {
        echo '<div class="carousel-item';
        if ($i==0) echo ' active';
        echo '">
          <img src="../data/preview/'.$path.'/'.$i.'.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="preview-caption">Slide '.($i+1).'</h5>
            </div>
        </div>';
    }
    echo '</div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>';
}
else{
    echo '<p>'.$noPreview.'</p>';
}
?>
</div>

<h4><?php echo $descHeader;?></h4>
<?php
    if ($res['description']) echo '<p>'.$res['description'].'</p>';
    else echo '<p>'.$noDesc.'</p>';
?>

<h4><?php echo $detailHeader;?></h4>
<table><tbody>
    <tr>
        <td><?php echo $dateRow;?></td>
        <td class="detail"><?php echo str2date($res['date'],'date only');?></td>
    </tr>
    <tr>
        <td><?php echo $cateRow;?></td>
        <td class="detail"><?php echo $cateContent[$res['category']];?></td>
    </tr>
    <tr>
        <td><?php echo $sizeRow;?></td>
        <td class="detail"><?php
            $fileSize=filesize('../data/slides/'.$res['path']);
            echo getFileSize($fileSize);
        ?></td>
    </tr>
</tbody></table>

<?php 
function str2date($str,$type){
    $y=substr($str,0,4);
    $m=substr($str,4,2);
    $d=substr($str,6,2);
    $h=substr($str,8,2); 
    $i=substr($str,10,2);
    $s=substr($str,12,2);
    if ($type=='date only') return $d.'/'.$m.'/'.$y;
    elseif ($type=='date and time') return $h.':'.$i.':'.$s.' '.$d.'/'.$m.'/'.$y;
}
function getFileSize($size){
    if ($size/1024<1){
        $res=$size.' bytes';
        return $res;
    }
    elseif ($size/1048576<1){
        $res=$size/1024;
        $res*=100;
        $res=floor($res);
        $res/=100;
        $res=$res.' KB';
        return $res;
    }
    elseif ($size/1073741824<1){
        $res=$size/1048576;
        $res*=100;
        $res=floor($res);
        $res/=100;
        $res=$res.' MB';
        return $res;
    }
    else{
        $res=$size/1073741824;
        $res*=100;
        $res=floor($res);
        $res/=100;
        $res=$res.' GB';
        return $res;
    }
}
?>

<h4><?php echo $cmtHeader;?></h4>
<div>
    <?php
        if (!isset($_SESSION['uid'])){
            echo "<p>$noAccCmt</p>";
        }
        else{
            $getImgCmd="SELECT username FROM account WHERE id='$uid'";
            $getImgQuery=mysqli_query($db,$getImgCmd);
            $getImgRes=mysqli_fetch_array($getImgQuery);
            $imgSrc=$getImgRes['username'];

            echo '<form id="cmtForm" action="interact/comment.php" method="POST">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">@'.$imgSrc.'</span>
                    <input name="comment" type="text" placeholder="'.$placeholderCmt.'" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                    <input name="template" type="number" value="'.$templateId.'" readonly style="display:none">
                    <button type="submit" class="btn btn-outline-primary">'.$sendLabel.'</button>
                </div>
            </form>';
            echo "<script>window.onload=function() {document.querySelector('#cmtForm').reset();}</script>";
        }
    ?>
</div>
<div>
    <?php
        $getCmt="SELECT * FROM comment WHERE template='$templateId' ORDER BY id DESC";
        $getCmtQuery=mysqli_query($db,$getCmt);
        if (!mysqli_num_rows($getCmtQuery)){
            echo "<p>$noCmt</p>";
        }
        else{
            echo '<p>'.mysqli_num_rows($getCmtQuery)." $cmtCountLabel</p>";
            while($cmtRes=mysqli_fetch_array($getCmtQuery)){
                $commentor=$cmtRes['user'];
                $getCmtor="SELECT username,avatar FROM account WHERE id='$commentor'";
                $getCmtorQuery=mysqli_query($db,$getCmtor);
                $cmtorRes=mysqli_fetch_array($getCmtorQuery);

                echo '<div style="display:flex;align-items:flex-start;margin:10px 0px 10px 0px">
                    <img src="../data/userava/'.$cmtorRes['avatar'].'" style="width:50px;clip-path:circle();margin-right:10px">
                    <div>
                        <i><b style="margin-right:10px;">'.'<a style="color:black" href="'.$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/profile?uid='.$cmtRes['user'].'">'.$cmtorRes['username'].'</a>'.'</b><span style="color:grey">'.str2date($cmtRes['date'],'date only').'</span></i>
                        <div>'.$cmtRes['content'].'</div>
                    </div>
                </div>';
            }
        }
    ?>
</div>

<footer style="height:200px;"></footer>

<style>
    .carousel-control-next{
        background-image:linear-gradient(to right,transparent,lightgrey);
    }
    .carousel-control-prev{
        background-image:linear-gradient(to left,transparent,lightgrey);
    }
    .preview-caption{
        height:40px;
        background-color:rgba(0,0,0,0.5);
        color:white;
        padding:5px 0px 5px 0px;
        border-radius:5px;
    }
    .detail{
        padding-left:20px;
    }
</style>
</div>