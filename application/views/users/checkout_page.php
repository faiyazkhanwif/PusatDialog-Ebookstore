<?php 
if($this->session->flashdata('success'))
    {
        print '<div class= "success-msg">'.$this->session->flashdata('success').'</div>';
    }
?>

<br>
<div class="row">
	<div class="col-lg-6">
		<?= form_open('checkout')?>
			<div id= "table-header">Payments methods </div>
			<p>Our online payment uses --- payment gateway which is a smart, fast and reliable online payment service.</p>
			
			<div class="form-check">
				<?= form_checkbox(['name'=>'paymentcheck', 'class'=>'form-check-input', 'value'=> TRUE]);?>
				<label class="form-check-label" for="payment">
					<b>Online Payment</b>
				</label>
				<div class="text-danger form-error"><?= form_error('paymentcheck')?></div>
			</div>
			
			<br><div><p>We recommend to read our <a href="<?= base_url()?>users/terms" target ="_blank" class="text-primary">terms and conditions</a> before making any purchase.</p></div>
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
			print "<td colspan = '2'>RM ".$this->cart->total()."</td>";
			print "</tr>";

			print "<tr>";
			$shipping = 0;
			print "<th>Shipping cost</th>";
			print "<td colspan = '2'>".$shipping."</td>";
			print "</tr>";

			print "<tr>";
			$payable_total = $this->cart->total() + $shipping;
			print "<th>Total cost</th>";
			print "<td colspan = '2'>RM ".$payable_total."</td>";
			print "</tr>";
			
			print "</table>";
			
			print "<h5>Your Products</h5>";
			print "<table class = 'table border-bottom table-hover'>";
			print "<tr>";
			print "<th>Image</th><th>Book Name</th><th></th><th>Price</th><th>Subtotal</th>";
			print "</tr>";
			foreach ($this->cart->contents() as $books) 
			{
				print "<tr>";
				print "<td><img src = '".$books['book_image']."' alt = '' width='50' hieght='80'</td>";
				print "<td>";
				print $books['name'];
				print "</td>";
				print "<td>";
				//print $books['qty'];
				print "</td>";
				print "<td>RM ";
				print $books['price'];
				//print " RM</td>";
				print "<td>RM ";
				print $books['subtotal'];
				//print " RM</td>";
				print "</tr>";
			}

			print "</table>";
		?>
	</div>
</div><br>
