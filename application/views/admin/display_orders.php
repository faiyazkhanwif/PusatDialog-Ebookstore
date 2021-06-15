<!--=== Success msg ===-->
<?php 
if($this->session->flashdata('success'))
{
  print '<div class= "success-msg">'.$this->session->flashdata('success').'</div>';
}
?>
<br>
<div class="container-fluid">
	<div id="table-header">all orders</div>
  <div class="table-responsive-sm">
   <table class="table table-hover">
    <thead class="thead-light">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Book ID</th>
        <th scope="col">Total Price</th>
        <th scope="col">Order Date</th>
        <th scope="col">Action</th>
      </tr>
    </thead>


    <tbody>
     <?php foreach($orders as $order): ?>
      <tr>
        <?php print '<td>'.$order->orderId.'</td>'; ?>
        <?php print '<td>'.$order->bookId.'</td>'; ?>
        <?php print '<td><span>RM '.strip_tags($order->total_price).'</span></td>'; ?>
        <?php print '<td>'.date('h:i a, d-M y', strtotime($order->dateTime)).'</td>'; ?>



        <?php print '<td>';
        print '<a href= "'.base_url().'Admin/order_view/'.$order->orderId.'" title= "View Details" class="btn btn-primary btn-sm">Details</a>&nbsp';
        print '</td>'; 
        ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</div>
