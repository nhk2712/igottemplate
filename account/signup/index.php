<?php
session_start();
?>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shorcut icon" href="../../brand.jpg">
</head>

<div class="container">
	<nav class="navbar navbar-light bg-light">
		<a class="navbar-brand" href="/">
			<img src="../../brand.jpg" width="50" height="50" class="d-inline-block align-top" alt="Brand logo">
			Brand name
		</a>
	</nav>

	<?php require('signup-'.$_SESSION['lang'].'.html');?>
</div>