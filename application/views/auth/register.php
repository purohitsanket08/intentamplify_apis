<?php $this->load->view('header'); ?>

<div id="content">
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-md-4">
				<h3 class="text-center mb-4">Register</h3>
				<form id="registerForm">
					<div class="mb-3">
						<label for="first_name" class="form-label">Fist Name</label>
						<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your First Name" required>
					</div>
					<div class="mb-3">
						<label for="last_name" class="form-label">Last Name</label>
						<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your Last Name" required>
					</div>
					<div class="mb-3">
						<label for="mobile" class="form-label">Mobile</label>
						<input type="text"  pattern="\d{10}" minlength="10" maxlength="10" class="form-control" id="mobile" name="mobile" placeholder="Enter your Mobile No" required>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" class="form-control" id=email name="email" placeholder="Enter your Email" required>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
					</div>
					<button type="submit" class="btn btn-primary w-100">Register</button>
					<div class="text-center mt-3">
						<a href="<?= base_url().'user' ?>">Do have an account? Login</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<script>
	$(document).ready(function() {
		$('#registerForm').on('submit', function (e) {
			e.preventDefault();

			var registerData = {
				email: $('#email').val(),
				first_name: $('#first_name').val(),
				last_name: $('#last_name').val(),
				mobile: $('#mobile').val(),
				password: $('#password').val()
			};

			$.ajax({
				url: '<?= base_url()?>/user/register_api', // Update to your actual API endpoint
				type: 'POST',
				contentType: 'application/json',
				data: JSON.stringify(registerData),
				success: function (response) {
					console.log(response.status);
					if (response.status ) {
						Swal.fire({
							icon: 'success',
							title: 'Registration Success',
							text: '',
						});
						window.location.href = '<?= base_url()?>user/';
					} else {
						Swal.fire({
							icon: 'Failed',
							title: 'Registration Failed',
							text: response.message,
						});
					}
				},
				error: function (xhr, status, error) {
					alert('An error occurred: ' + xhr.responseText);
				}
			});
		});
	});
</script>

<?php $this->load->view('footer'); ?>
