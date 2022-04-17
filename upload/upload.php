<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');
mysqli_set_charset($db,"utf8mb4");
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shorcut icon" href="../brand.jpg">
</head>

<div class="container">
<?php
require('../navbar.php');
include('../lang/upload/upload.php');
?>
<style>#userava{width:50px;clip-path:circle();}</style>

<?php
// Get variables
$uid=$_SESSION['uid'];
$template=$_FILES["template"];
$name=mysqli_real_escape_string($db,$_POST["name"]);
$description=mysqli_real_escape_string($db,$_POST["description"]);
$thumbnail=$_FILES["thumbnail"];
$category=$_POST["category"];

// Check template file type
$templateExt="";
if ($template['type']=="application/vnd.openxmlformats-officedocument.presentationml.presentation") $templateExt=".pptx";
else if ($template['type']=="application/vnd.ms-powerpoint") $templateExt=".ppt";
else die('
<title>'.$case1[0].'</title>
<h3 style="text-align:center;margin-top:50px">'.$case1[1].'</h3>
<div style="display:flex;justify-content:center;margin-top:20px">
    <a href="/" style="margin-right:10px;"><button class="btn btn-outline-primary">'.$case1[2].'</button></a>
    <a href="/upload"><button type="button" class="btn btn-primary">'.$case1[3].'</button></a>
</div></div>'); // Case 1

// Save template
$targetTemplate=$_SERVER['DOCUMENT_ROOT']."/data/slides/";
$date=date("YmdHis");
$fileName=$date.$templateExt;
$fileTemplate=$targetTemplate.$fileName;

if (!move_uploaded_file($template['tmp_name'], $fileTemplate)) die('
<title>'.$case1[0].'</title>
<h3 style="text-align:center;margin-top:50px">'.$case2[0].'</h3>
<div style="display:flex;justify-content:center;margin-top:20px">
    <a href="/" style="margin-right:10px;"><button class="btn btn-outline-primary">'.$case1[2].'</button></a>
    <a href="/upload"><button type="button" class="btn btn-primary">'.$case1[3].'</button></a>
</div></div>'); // Case 2

// Create preview
$shell = shell_exec("python ../python/ppt2jpg.py $fileName");

// Update database
$insertTemplateCmd="INSERT INTO slides (name,description,owner,path,date,category) VALUES ('$name', '$description','$uid','$fileName','$date','$category')";
$insertTemplateQuery=mysqli_query($db,$insertTemplateCmd);
echo '<title>'.$case3[0].'</title><h3 style="text-align:center;margin-top:50px">'.$case3[1].'</h3>';
// Case 3

// Check thumbnail
$tmpThumb=$thumbnail['tmp_name'];
$thumbExt="";

function setThumbnail(){
    global $date,$tmpThumb,$thumbExt,$fileName,$db,$thumbnail;
    if (!$tmpThumb) return;

    $check=getimagesize($tmpThumb);
    if (!$check) return;

    if ($thumbnail['type']=='image/jpeg') $thumbExt=".jpeg";
    else if ($thumbnail['type']=='image/jpg') $thumbExt=".jpg";
    else if ($thumbnail['type']=='image/png') $thumbExt=".png";
    else return;

    $targetThumb=$_SERVER['DOCUMENT_ROOT']."/data/tmp/";
    $thumbName=$date.$thumbExt; // file name
    $fileThumb=$targetThumb.$thumbName;

    if (!move_uploaded_file($tmpThumb,$fileThumb)) return;

    $shell = shell_exec("python ../python/cropThumb.py $thumbName");

    $updateThumbCmd="UPDATE slides SET thumbnail='$thumbName' WHERE path='$fileName'";
    $updateThumbQuery=mysqli_query($db,$updateThumbCmd);

    $db->close();
}
setThumbnail();
?>

<div style="display:flex;justify-content:center;margin-top:20px">
    <a href="/upload" style="margin-right:10px;"><button class="btn btn-primary"><?php echo $case3[2];?></button></a>
    <a href="/"><button type="button" class="btn btn-outline-primary"><?php echo $case3[3];?></button></a>
</div>

</div>