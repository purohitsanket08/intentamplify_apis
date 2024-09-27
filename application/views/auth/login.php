<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
	<div class="row justify-content-center mt-5">
		<div class="col-md-4">
			<h3 class="text-center mb-4">Login</h3>
			<form action="your-login-endpoint" method="post">
				<div class="mb-3">
					<label for="email" class="form-label">Email address</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
				</div>
				<button type="submit" class="btn btn-primary w-100">Login</button>
				<div class="text-center mt-3">
					<a href="register.html">Don't have an account? Register</a>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
