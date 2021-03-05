<div class="text-success">
	<?php 
	if($this->session->flashdata('login_success'))
	{
		print '<div class= "success-msg">'.$this->session->flashdata('login_success').'</div>';
	}
	?>
</div>


<div class="admin-index section-padding" style="min-height: 370px">

	
	<div class="admin-content section-padding">
		<div class="container">
			<div class="row con-flex">
				<div class="col-lg-6">
					<button type="button" class="dashboardbtn1 btn btn-dark shadow"><i class="fas fa-book"></i> <br/> Total <br/>E-books: 56</button>
				</div>
				<div class="col-lg-6">
					<button type="button" onclick="location.href='<?= base_url()?>admin/category'" class="dashboardbtn1 btn btn-info shadow"><i class="fas fa-list"></i> <br/> Total <br/>Categories: <?php 
					$this->load->model('admin_model');
					$count_category = count($this->admin_model->get_category());
					print $count_category;
					?></button>
				</div>
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col-lg-6">
					<button type="button" onclick="location.href='<?= base_url()?>admin/allusers'" class="dashboardbtn2 btn btn-primary shadow"><i class="fas fa-cart-arrow-down"></i> <br/> Total <br/> Users: <?php 
					$this->load->model('admin_model');
					$count_users = count($this->admin_model->get_users());
					print $count_users;
					?> </button>
				</div>
				
				<div class="col-lg-6">
					<button type="button" class="dashboardbtn2 btn btn-success shadow"><i class="fas fa-cart-arrow-down"></i> <br/> Total <br/> Orders: 9</button>
				</div>
			</div>
		</div>
	</div>
</div>