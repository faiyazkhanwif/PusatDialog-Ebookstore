<?php 
if($this->session->flashdata('success'))
    {
        print '<div class= "success-msg">'.$this->session->flashdata('success').'</div>';
    }
?>

<br>
<div class="row">
	<div class="col-lg-6">
		<div id="table-header">shipping details</div>
		<?= form_open('checkout')?>
			<div id= "table-header">Payments methods </div>
			<p>Now we have only option cash on delivery. Later we will connect with bKash, Rocket and other banks facility.Thanks for your supports</p>
			
			<div class="form-check">
				<?= form_checkbox(['name'=>'paymentcheck', 'class'=>'form-check-input', 'value'=> TRUE]);?>
				<label class="form-check-label" for="payment">
					<b>Online Payment</b>
				</label>
				<div class="text-danger form-error"><?= form_error('paymentcheck')?></div>
			</div>
			
			<br><div><p>We will contact with you with in 24 hours. Please read our shipping policy at <a href="<?= base_url()?>users/terms" target ="_blank" class="text-primary">terms and condition</a> page. If you agree with our shipping policy then place your order now.</p></div>
			<div class="sub">
            <span><?= form_submit(['name'=> 'submit', 'value'=> 'Place Order', 'class'=>'btn btn-primary my-btn'])?></span>
    		</div>
		<?= form_close()?>
	</div>
	<div class="col-lg-6">
		<div id="table-header">order summary</div><br>
		<h5>Payments Details</h5>
		<?php
			print "<table class = 'table'>";

			print "<tr>";
			print "<th>Total Book Price</th>";
			print "<td colspan = '2'>".$this->cart->total().".TK</td>";
			print "</tr>";

			print "<tr>";
			$shipping = 40;
			print "<th>Shipping cost</th>";
			print "<td colspan = '2'>".$shipping.".TK</td>";
			print "</tr>";

			print "<tr>";
			$payable_total = $this->cart->total() + $shipping;
			print "<th>Total cost</th>";
			print "<td colspan = '2'>".$payable_total.".TK</td>";
			print "</tr>";
			
			print "</table>";
			
			print "<h5>Your Products</h5>";
			print "<table class = 'table border-bottom table-hover'>";
			print "<tr>";
			print "<th>Image</th><th>Book Name</th><th>Quantity</th><th>Price</th><th>Subtotal</th>";
			print "</tr>";
			foreach ($this->cart->contents() as $books) 
			{
				print "<tr>";
				print "<td><img src = '".$books['book_image']."' alt = '' width='50' hieght='80'</td>";
				print "<td>";
				print $books['name'];
				print "</td>";
				print "<td>";
				print $books['qty'];
				print "</td>";
				print "<td>";
				print $books['price'];
				print ".TK</td>";
				print "<td>";
				print $books['subtotal'];
				print ".TK</td>";
				print "</tr>";
			}

			print "</table>";
		?>
	</div>
</div><br>
