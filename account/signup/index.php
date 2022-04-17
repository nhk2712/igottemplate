<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shorcut icon" href="../../brand.jpg">
	<title>Sign up</title>
</head>

<div class="container">
	<nav class="navbar navbar-light bg-light">
		<a class="navbar-brand" href="/">
			<img src="../../brand.jpg" width="50" height="50" class="d-inline-block align-top" alt="Brand logo">
			Brand name
		</a>
	</nav>

	<h2>Sign up</h2>

	<form method="POST" action="signup.php">
		<div>
			<div class="mb-3">
				<label class="form-label">Username</label>
				<input type="text" name="username" required class="form-control" />
			</div>
			<div class="mb-3">
				<label class="form-label">Password</label>
				<input type="password" name="password" required class="form-control">
			</div>
			<div class="mb-3">
				<label class="form-label">Confirm password</label>
				<input type="password" name="cfpass" required class="form-control">
			</div>
			<div class="mb-3">
				<label class="form-label">Email</label>
				<input type="email" name="email" required class="form-control">
			</div>
			<div class="mb-3">
				<label class="form-label">Phone number</label>
				<input type="tel" name="phone" class="form-control">
			</div>
			<div>
                <label class="form-label">Recovery question</label>
                <select name="category" class="form-select" required>
                    <option value="" disabled selected>Choose a question</option>
                </select>
            </div>
			<div class="mb-3">
				<label class="form-label">Answer</label>
				<input type="text" name="answer" required class="form-control" />
			</div>
		</div>
		<div style="display:flex;justify-content:space-evenly"><button type="submit"
				class="btn btn-outline-primary">Sign up</button></div>
	</form>
</div>