<!--=== Success msg ===-->
<?php 
if($this->session->flashdata('success'))
{
	print '<div class= "success-msg">'.$this->session->flashdata('success').'</div>';
}
?>

<br>
<div class="container">
	<div class="row">
		<div class="col-lg-8">
			<div id="table-header">Order Details</div><br>
			<h5>Detailed information of Order number <?= $order_detail->orderId ?></h5>
			<table class="table">
				<tr>
					<th>Order placed by</th>
					<td colspan="1"><b><?= strip_tags($order_detail->name) ?></b></td>
				</tr>
				<tr>
					<th>Contact</th>
					<td colspan="1"><?= strip_tags($order_detail->contact) ?></td>
				</tr>
				<tr>
					<th>Total price</th>
					<td colspan="1">RM <?= strip_tags($order_detail->total_price) ?></td>
				</tr>
				<tr>
					<?php
					if($order_detail->paymentcheck == 1)
					{
						$order_detail->paymentcheck = "Online payment";
					}
					else
					{
						$order_detail->paymentcheck = "Bank payment";
					}
					print '<th>Payment Type</th>';
					print '<td colspan="1">'.strip_tags($order_detail->paymentcheck).'</td>';
					?>
				</tr>
				<tr>
					<th>Order Date</th>
					<td colspan="1"><?= date('h:i a, d-M y', strtotime($order_detail->dateTime)) ?></td>
				</tr>
				<tr>
					<th>Order Books id</th>
					<td colspan="1"><?= strip_tags($order_detail->bookId) ?></td>
				</tr>

			</table>

		</div>
		<div class="col-lg-4"></div>
	</div>
</div>