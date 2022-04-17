<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');
mysqli_set_charset($db,"utf8mb4");
$uid="";
include('../lang/settings/index.php');
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $title;?></title>
</head>

<div class="container">
<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/navbar.php');
?>

<?php
$langOption=['<option value="en-US">English (US)</option>','<option value="vi">Tiếng Việt</option>'];
?>

<h2><?php echo $title;?></h2>
    <h4><?php echo $webSettings;?></h4>
        <form method="POST" action="changelang.php">
            <div class="row mb-3">
                <label for="lang" class="col-sm-2 col-form-label"><?php echo $language;?></label>
                <div class="col-sm-10">
                    <select class="form-select form-control" id="lang" name="lang">
                        <?php
                            if ($_SESSION['lang'] == 'en-US'){
                                echo $langOption[0];
                                echo $langOption[1];
                            }
                            elseif ($_SESSION['lang'] == 'vi'){
                                echo $langOption[1];
                                echo $langOption[0];
                            }
                        ?>
                    </select>
                </div>
            </div>
            <button class="btn btn-primary"><?php echo $save;?></button>
        </form>
        
    <h4><?php echo $accountPref;?></h4>

    <?php
        if (!$uid){
            echo "<p>$noUser</p>";
        }
        else{require('account-pref.php');}
    ?>

    <h4><?php echo $feedback;?></h4>
        <div class="list-group">
            <a href="feedback" class="list-group-item list-group-item-action"><?php echo $feedbackLink;?></a>
        </div>

    <h4><?php echo $about;?></h4>

</div> <!--Closing container tag-->

<style>
    #userava{
    width:50px;
    clip-path:circle();
    }
</style>