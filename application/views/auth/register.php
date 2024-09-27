<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
	<div class="row justify-content-center mt-5">
		<div class="col-md-6">
			<h3 class="text-center mb-4">Register</h3>
			<form action="your-register-endpoint" method="post">
				<div class="mb-3">
					<label for="first_name" class="form-label">First Name</label>
					<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your first name" required>
				</div>
				<div class="mb-3">
					<label for="last_name" class="form-label">Last Name</label>
					<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name" required>
				</div>
				<div class="mb-3">
					<label for="email" class="form-label">Email address</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
				</div>
				<div class="mb-3">
					<label for="mobile" class="form-label">Mobile</label>
					<input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number" required>
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
				</div>
				<button type="submit" class="btn btn-primary w-100">Register</button>
				<div class="text-center mt-3">
					<a href="login.html">Already have an account? Login</a>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
