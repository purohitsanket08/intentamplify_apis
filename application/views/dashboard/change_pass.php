<?php $this->load->view('header'); ?>

<div id="content">
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-md-4">
				<h3 class="text-center mb-4">Change Password</h3>
				<form id="changePasswordForm">
					<div class="mb-3">
						<label for="userid_name" class="form-label">User ID</label>
						<input type="text" class="form-control" id="id" name="id" readonly>
					</div>
					<div class="mb-3">
						<label for="old_password" class="form-label">Old Password</label>
						<input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter your old password" required>
					</div>
					<div class="mb-3">
						<label for="new_password" class="form-label">New Password</label>
						<input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter your new password" required>
					</div>
					<button type="submit" class="btn btn-primary w-100">Change Password</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		const userData = JSON.parse(localStorage.getItem('userData'));
		let user_id = userData.id;
		$('#id').val(userData.id+' ('+userData.first_name+' '+userData.last_name+')');

		$('#changePasswordForm').on('submit', function(e) {
			e.preventDefault();

			var changePasswordData = {
				id: user_id,
				old_password: $('#old_password').val(),
				new_password: $('#new_password').val()
			};

			$.ajax({
				url: '<?= base_url()?>/user/change_password_api', // Update to your actual API endpoint
				type: 'POST',
				contentType: 'application/json',
				data: JSON.stringify(changePasswordData),
				success: function(response) {
					if (response.status) {
						Swal.fire({
							icon: 'success',
							title: 'Password Changed Success',
							text: 'Password Changed Success',
						});
						localStorage.removeItem('authToken');
						localStorage.removeItem('userData');
						window.location.href = '<?= base_url()?>/user';
					} else {
						Swal.fire({
							icon: 'Failed',
							title: 'Password Change request Failed',
							text: response.message,
						});
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
