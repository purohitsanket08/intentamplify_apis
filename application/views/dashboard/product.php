<?php $this->load->view('header'); ?>

<div id="content">
	<div class="container mt-5">
		<h2 class="text-center mb-4">Make a Payment</h2>
		<form id="paymentForm">
			<div class="col-md-4">
				<div class="card mb-4">
					<img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product Image">
					<div class="card-body">
						<h5 class="card-title">Product Title</h5>
						<p class="card-text">This is a brief description of the product. It highlights key features and benefits.</p>
						<p class="card-text"><strong>Price: ₹999</strong></p>
						<input type="hidden" class="form-control" id="amount" name="amount" value="999" required>
						<button type="button" class="btn btn-primary w-100" id="payBtn">Pay Now</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
	const userData = JSON.parse(localStorage.getItem('userData'));
	let user_id = userData.id;
	let name = +userData.first_name+' '+userData.last_name;
	let email = userData.email;
	let mobile = userData.mobile;
	console.log("userData",userData)

	document.getElementById('payBtn').onclick = function (e) {
		e.preventDefault();
		var amount = document.getElementById('amount').value;

		var options = {
			"key": "rzp_test_gecBvZHea4HsRa",
			"amount": amount * 100,
			"currency": "INR",
			"name": "Intent Amplify",
			"description": "Payment for services",
			"image": "https://png.pngtree.com/png-clipart/20230330/original/pngtree-modern-demo-logo-vector-file-png-image_9011302.png",
			"handler": function (response) {
				alert("Payment successful! Payment ID: " + response.razorpay_payment_id);
			},
			"prefill": {
				"name": name,
				"email": email,
				"contact": mobile
			},
			"theme": {
				"color": "#ff8400"
			}
		};

		var razorpay = new Razorpay(options);
		razorpay.open();
	};
</script>

<?php $this->load->view('footer'); ?>
