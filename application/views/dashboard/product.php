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
						<input type="hidden" class="form-control" id="product_id" name="product_id" value="12">
						<input type="hidden" class="form-control" id="amount" name="amount" value="999">
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
		var amount = $('#amount').val();
		var product_id = $('#product_id').val();

		var options = {
			"key": "rzp_test_gecBvZHea4HsRa",
			"amount": amount * 100,
			"currency": "INR",
			"name": "Intent Amplify",
			"description": "Payment for services",
			"image": "https://png.pngtree.com/png-clipart/20230330/original/pngtree-modern-demo-logo-vector-file-png-image_9011302.png",
			"handler": function (response) {
				const paymentData = {
					id: user_id,
					order_id: response.razorpay_order_id,
					payment_id: response.razorpay_payment_id,
					amount: amount,
					product_id: product_id,
					status: "captured"
				};
				addSuccess(paymentData)
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

	function addSuccess(paymentData){
		$.ajax({
			url: '<?= base_url() ?>user/payment_success',
			type: 'POST',
			contentType: 'application/json',
			data: JSON.stringify(paymentData),
			success: function(apiResponse) {
				if (apiResponse.status) {
					Swal.fire({
						icon: 'success',
						title: 'Product Ordered Successfully',
						text: 'and Your order Id ' + apiResponse.result.order_id,
					});
					window.location.href = '<?= base_url()?>dashboard/product';
				} else {
					alert("Error: " + apiResponse.message);
				}
			},
			error: function(xhr, status, error) {
				alert("API request failed: " + xhr.responseText);
			}
		});
	}

</script>

<?php $this->load->view('footer'); ?>
