<?php
	session_start();
	include('../../lang/account/signin/index.php');
?>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shorcut icon" href="../../brand.jpg">
	<title><?php echo $title;?></title>
</head>

<div class="container">
	<nav class="navbar navbar-light bg-light">
		<a class="navbar-brand" href="/">
			<img src="../../brand.jpg" width="50" height="50" class="d-inline-block align-top" alt="Brand logo">
			Brand name
		</a>
	</nav>

	<h2><?php echo $title;?></h2>

	<form method="POST" action="signin.php">
		<div>
			<div class="mb-3">
				<label class="form-label"><?php echo $username;?></label>
				<input type="text" name="username" class="form-control" required>
			</div>
			<div class="mb-3">
				<label class="form-label"><?php echo $password;?></label>
				<input type="password" name="password" class="form-control" required>
			</div>
		</div>
		<div style="display:flex;justify-content:space-evenly;margin-top:20px"><button type="submit"
				class="btn btn-outline-primary"><?php echo $title;?></button></div>
	</form>
</div>