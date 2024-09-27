<?php $this->load->view('header'); ?>

<div id="content">
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-md-4">
				<h3 class="text-center mb-4">Login</h3>
				<form id="loginForm">
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
						<a href="<?= base_url().'user/register' ?>">Don't have an account? Register</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#loginForm').on('submit', function(e) {
			e.preventDefault();

			var email = $('#email').val();
			var password = $('#password').val();

			var loginData = {
				email: email,
				password: password
			};
			$.ajax({
				url: '<?= base_url()?>'+'/user/login_api',
				type: 'POST',
				contentType: 'application/json',
				data: JSON.stringify(loginData),
				success: function(response) {
					if (response.status) {
						localStorage.setItem('authToken', response.result.token);
						localStorage.setItem('userData', JSON.stringify(response.result.user));

						Swal.fire({
							icon: 'success',
							title: 'Login Success',
							text: 'Welcome Back',
						});
						window.location.href = '<?= base_url()?>dashboard';
					} else {
						alert('Login failed: ' + response.message);
					}
				},
				error: function(xhr, status, error) {
					alert('An error occurred: ' + xhr.responseText);
				}
			});
		});
	});
</script>

<?php $this->load->view('footer'); ?>
