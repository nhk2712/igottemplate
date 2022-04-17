<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');
mysqli_set_charset($db,"utf8mb4");
$uid="";
include('../../lang/settings/rename/index.php');
?>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shorcut icon" href="/brand.jpg">
	<title><?php echo $title;?></title>
</head>

<div class="container">
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/navbar.php');?>
	<style>#userava{width:50px;clip-path:circle();}</style>

	<h2><?php echo $title;?></h2>

	<form method="POST" action="rename.php">
		<div>
			<div class="row mb-3">
				<label class="form-label"><?php echo $newLabel;?></label>
				<input type="text" name="name" required class="form-control">
			</div>
		</div>
		<div style="display:flex;flex-wrap:wrap;justify-content:space-evenly"><button type="submit"
				class="btn btn-outline-primary"><?php echo $title;?></button></div>
	</form>
</div>