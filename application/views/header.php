<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?> | Intent Amplify</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<style>
	html {
		height: 100%;
	}

	body {
		display: flex;
		flex-direction: column;
		min-height: 100%;
	}

	#content {
		flex: 1;
		padding: 20px;
	}

	#footer {
		padding: 20px;
	}
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="<?= base_url().'dashboard'?>" style="color: #ff8400;">Intent Amplify</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item"><a class="nav-link" href="<?= base_url().'contact'; ?>">Get in Touch</a></li>
			<li class="nav-item"><a class="nav-link" href="<?= base_url().'dashboard/product'; ?>">Payment</a></li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<?php if ($this->uri->segment(1) == 'dashboard'): ?>
				<li class="nav-item"><a class="nav-link" href="<?= base_url().'dashboard/change_password'; ?>">Change Password</a></li>
				<li class="nav-item"><a class="nav-link" href="#" id="logoutBtn">Logout</a></li>
			<?php endif; ?>
		</ul>
	</div>
</nav>
