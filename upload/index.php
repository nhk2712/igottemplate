<?php
session_start();
include('../lang/upload/index.php');
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $title;?></title>
    <link rel="shorcut icon" href="../brand.jpg">
</head>

<?php
// Handle no user
if (!isset($_SESSION['uid'])) die(include($noUser));

require($_SERVER['DOCUMENT_ROOT'].'/connect.php');
mysqli_set_charset($db,"utf8mb4");

$uid=$_SESSION['uid'];
$cmd = "SELECT username,avatar FROM account WHERE id='$uid'";
$query = mysqli_query($db,$cmd);
$res=mysqli_fetch_array($query);
?>

<div class="container">
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/navbar.php');
    ?>

    <h2><?php echo $h2;?></h2>

    <form method="POST" action="upload.php" enctype="multipart/form-data">
        <div style="display:flex;flex-wrap:wrap;justify-content:space-evenly;flex-direction: column;">
            <div>
                <label class="form-label"><?php echo $select;?></label>
                <input type="file" name="template" required class="form-control" accept=".ppt,.pptx">
                <p style="font-style: italic;color:grey"><?php echo $accept;?></p>
            </div>

            <div>
                <label class="form-label"><?php echo $tempName;?></label>
                <input type="text" name="name" required class="form-control" maxlength="50">
                <p style="font-style: italic;color:grey"><?php echo $maxLength;?></p>
            </div>

            <div>
                <label class="form-label"><?php echo $description;?></label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div>
                <label class="form-label"><?php echo $thumb;?></label>
                <input type="file" name="thumbnail" class="form-control" accept=".jpg,.jpeg,.png">
            </div>
            
            <div>
                <label class="form-label"><?php echo $category;?></label>
                <select name="category" class="form-select" required>
                    <option value="" disabled selected><?php echo $selectCate;?></option>
                    <option value="business"><?php echo $cateContent['business'];?></option>
                    <option value="technology"><?php echo $cateContent['technology'];?></option>
                    <option value="education"><?php echo $cateContent['education'];?></option>
                    <option value="medical"><?php echo $cateContent['medical'];?></option>
                    <option value="science"><?php echo $cateContent['science'];?></option>
                    <option value="language"><?php echo $cateContent['language'];?></option>
                    <option value="society"><?php echo $cateContent['society'];?></option>
                    <option value="religion"><?php echo $cateContent['religion'];?></option>
                    <option value="culture"><?php echo $cateContent['culture'];?></option>
                </select>
            </div>
        </div>

        <div style="display:flex;flex-wrap:wrap;justify-content:space-evenly;margin-top:20px">
            <button type="submit" class="btn btn-outline-primary"><?php echo $title;?></button>
        </div>
    </form>
</div>

<style>
#userava{
width:50px;
clip-path:circle();
}
</style>
