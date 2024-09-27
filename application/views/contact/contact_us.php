<?php $this->load->view('header'); ?>

<div id="content">
	<div class="container mt-5">

		<h2 style="text-align: center;">Contact Us</h2>

		<form id="contactForm">
			<div class="form-group">
				<label for="contactName">Name:</label>
				<input type="text" class="form-control" id="contactName" name="name" required>
			</div>
			<div class="form-group">
				<label for="contactEmail">Email:</label>
				<input type="email" class="form-control" id="contactEmail" name="email" required>
			</div>
			<div class="form-group">
				<label for="contactMob">Mobile:</label>
				<input type="text"  pattern="\d{10}" minlength="10" maxlength="10" class="form-control" id="contactMob" name="mobile" required>
			</div>
			<div class="form-group">
				<label for="contactCompany">Company:</label>
				<input type="text" class="form-control" id="contactCompany" name="company" required>
			</div>
			<div class="form-group">
				<label for="contactDetails">Details:</label>
				<textarea class="form-control" id="contactDetails" name="details" required></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#contactForm').on('submit', function(e) {
			e.preventDefault();
			var contactData = {
				email: $('#contactEmail').val(),
				name: $('#contactName').val(),
				mob: $('#contactMob').val(),
				company: $('#contactCompany').val(),
				details: $('#contactDetails').val()
			};

			$.ajax({
				url: '<?= base_url()?>'+'/contact/contact_request',
				type: 'POST',
				contentType: 'application/json',
				data: JSON.stringify(contactData),
				success: function(response) {
						Swal.fire({
							icon: 'success',
							title: 'Contact Request Submitted',
							text: 'Your contact request has been successfully submitted!',
							confirmButtonText: 'OK'
						});
						$('#contactForm')[0].reset();
						window.location.href = '<?= base_url()?>dashboard';

				},
				error: function(xhr, status, error) {
					alert('An error occurred: ' + xhr.responseText);
				}
			});
		});
	});
</script>
<?php $this->load->view('footer'); ?>
