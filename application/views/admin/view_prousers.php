<!--=== Success msg ===-->
<?php 
if($this->session->flashdata('success'))
{
  print '<div class= "success-msg">'.$this->session->flashdata('success').'</div>';
}
?>

<br>
<br>
<div class="container">
	<div id="table-header">Current Pro Members</div>
  <br>
	<table class="table table-hover">
    <thead class="thead-light">
      <tr>
        <th scope="col">Membership ID</th>
        <th scope="col">User ID</th>
        <th scope="col">User Name</th>
        <th scope="col">User Contact</th>
        <th scope="col">User Email</th>
        <th scope="col">Subscription Length (Months)</th>
        <th scope="col">Fee paid</th>
        <th scope="col">Payment Method</th>
        <th scope="col">Transaction Date</th>
        <th scope="col">Expire Date</th>
      </tr>
    </thead>


    <tbody>
     <?php foreach($users_data as $udata): ?>
      <tr>
        <?php print '<td>'.htmlentities($udata->memtranID).'</td>'; ?>
        <?php 
        print '<td class= "text-info">'.htmlentities($udata->userId).'</td>'; 
        $extradetails = $this->Admin_model->get_user_details($udata->userId);
        print '<td class= "text-info">'.htmlentities($extradetails->name).'</td>';
        print '<td class= "">'.htmlentities($extradetails->contact).'</td>';
        print '<td class= "">'.htmlentities($extradetails->email).'</td>';
        ?>
        <?php print '<td>'.htmlentities($udata->months).'</td>'; ?>
        <?php  print '<td>'.htmlentities($udata->subscriptionfee).'</td>'; ?>
        <?php 
        $paymenttype = "null";
        if ($udata->paymentcheck==1) {
          $paymenttype = "Online Payment";
        }

        print '<td>'.htmlentities($paymenttype).'</td>'; 
        ?>
        <?php print '<td>'.htmlentities($udata->transactiondate).'</td>'; ?>
        <?php  print '<td>'.htmlentities($udata->expiredate).'</td>'; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>