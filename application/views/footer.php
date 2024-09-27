<div id="footer">
	<footer class="text-center">
		<p>&copy; <?= date('Y'); ?> Intent Amplify. All Rights Reserved.</p>
	</footer>
</div>
<script>

	$(document).ready(function() {
		var token = localStorage.getItem('authToken');
		if('<?= $this->uri->segment(1); ?>' == 'user') {
			if (token) {
				window.location.href = '<?= base_url()?>dashboard';
			}
		}

		if('<?= $this->uri->segment(1); ?>' == 'dashboard'){
			console.log("$this->uri->segment(1);",'<?= $this->uri->segment(1); ?>');
			if (!token) {
				window.location.href = '<?= base_url()?>user';
			}
		}


		$('#logoutBtn').on('click', function(e) {
			e.preventDefault();
			localStorage.removeItem('authToken');
			localStorage.removeItem('userData');
			window.location.href = '<?= base_url()?>user/';
		});
	});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
