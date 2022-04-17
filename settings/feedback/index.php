<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/connect.php');
mysqli_set_charset($db,"utf8mb4");
$uid="";
include('../../lang/settings/feedback/index.php');
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

	<form method="POST" action="feedback.php">
		<div style="display:flex;flex-direction:column;justify-content:space-evenly">
			<div>
				<label class="form-label"><?php echo $titleLabel;?></label>
				<input type="text" name="title" required class="form-control" maxlength="100">
			</div>
			<div>
				<label class="form-label"><?php echo $rateLabel;?></label>
				<div style="display:flex;justify-content:space-evenly">
					<button type="button" id="1" class="rate" title="Aggressively bad"><img src="img/1.svg"
							class="rate-icon"></button>
					<button type="button" id="2" class="rate" title="Bad"><img src="img/2.svg"
							class="rate-icon"></button>
					<button type="button" id="3" class="rate" title="Neutral"><img src="img/3.svg"
							class="rate-icon"></button>
					<button type="button" id="4" class="rate" title="Good"><img src="img/4.svg"
							class="rate-icon"></button>
					<button type="button" id="5" class="rate" title="Perfect"><img src="img/5.svg"
							class="rate-icon"></button>
				</div>
				<input type="number" name="rate" value="0" id="rate-val">
			</div>
			<div>
				<label class="form-label"><?php echo $detailLabel;?></label>
				<textarea style="height:200px" name="detail" class="form-control"></textarea>
			</div>
		</div>
		<div style="display:flex;flex-wrap:wrap;justify-content:space-evenly;margin-top:20px"><button type="submit"
				class="btn btn-outline-primary"><?php echo $sendLabel;?></button></div>
	</form>
</div>

<style>
	.rate {
		border: none;
		outline: none;
		background-color: transparent;
		transition: all 0.5s;
	}

	.rate-icon {
		width: 50px;
	}

	.rate:hover {
		transform: scale(1.3)
	}
</style>

<script>
	var rate = document.querySelectorAll('.rate')
	var rateVal = document.querySelector('#rate-val')
	rateVal.style.display = 'none'
	for (var i = 0; i < rate.length; i++) {
		rate[i].onclick = function () {
			for (var j = 0; j < rate.length; j++) {
				rate[j].style.transform = 'unset'
				rate[j].style.opacity = 0.3

			}
			this.style.opacity = 1
			this.style.transform = 'scale(1.3)'
			rateVal.value = this.id
		}
	}
</script>