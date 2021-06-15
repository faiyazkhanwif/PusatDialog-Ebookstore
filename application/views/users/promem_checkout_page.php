<?php 
if($this->session->flashdata('success'))
    {
        print '<div class= "success-msg">'.$this->session->flashdata('success').'</div>';
    }
?>

<br>
<div class="row">
	<div class="col-lg-6">
		<?= form_open(base_url('Users/subscribeaspro/'.$months))?>
			<div id= "table-header">Payments methods </div>
			<p>Our online payment uses --- payment gateway which is a smart, fast and reliable online payment service.</p>
			
			<div class="form-check">
				<?= form_checkbox(['name'=>'paymentcheck', 'class'=>'form-check-input', 'value'=> TRUE]);?>
				<label class="form-check-label" for="payment">
					<b>Online Payment</b>
				</label>
				<div class="text-danger form-error"><?= form_error('paymentcheck')?></div>
			</div>
			
			<br><div><p>We recommend reading our <a href="<?= base_url()?>Users/terms" target ="_blank" class="text-primary">terms and conditions</a> before making any purchase.</p></div>
			<div class="sub">
            <span><?= form_submit(['name'=> 'submit', 'value'=> 'Subscribe', 'class'=>'btn btn-primary my-btn'])?></span>
    		</div>
		<?= form_close()?>
	</div>
	<div class="col-lg-6">
		<div id="table-header">order summary</div><br>
		<h5>Payments Details</h5>
		<?php
			print "<table class = 'table'>";

			print "<tr>";
			print "<th>Membership Duration</th>";
			print "<td colspan = '2'>".$months." Months</td>";
			print "</tr>";

			print "<tr>";
			
			print "<th>Membership cost</th>";
			print "<td colspan = '2'>RM ".$cost."</td>";
			print "</tr>";

			print "<tr>";

			print "<th>Total cost</th>";
			print "<td colspan = '2'>RM ".$cost."</td>";
			print "</tr>";
			
			print "</table>";
			

			print "</table>";
		?>
	</div>
</div><br>
