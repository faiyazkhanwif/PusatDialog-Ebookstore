<div class="text-success">
	<?php 
	if($this->session->flashdata('login_success'))
	{
		print '<div class= "success-msg">'.$this->session->flashdata('login_success').'</div>';
	}
	?>
</div>


<div class="admin-index section-padding" style="min-height: 500px">
	<div class="text-center">
		<h3>Admin Dashboard</h3>
		<p>Welcome, <a href="#" class="text-primary"><?= $this->session->userdata('name') ?></a>. You have logged in as an admin. Now you can monitor the full application</p>
	</div>
	
	<div class="admin-content section-padding">
		<div class="container">
			<div class="row con-flex">
				<div class="col-lg-2 col-md-3 col-sm-4">
					<div class="col-admin bg-secondary clickable-div" data-href="<?= base_url('admin/allusers')?>">
						<div>
							<i class="fas fa-users"></i>
							<h6>Total Users</h6>
						</div>
						
						<?php 
						$this->load->model('admin_model');
						$count_users = count($this->admin_model->get_users());
						print $count_users;
						?> 
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-4">
					<div class="col-admin bg-primary clickable-div" data-href="<?= base_url('admin/category')?>">
						<div>
							<i class="fas fa-list"></i>
							<h6>Total Category</h6>
						</div>
						<?php 
						$this->load->model('admin_model');
						$count_category = count($this->admin_model->get_category());
						print $count_category;
						?> 
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-4">
					<div class="col-admin bg-success clickable-div" data-href="<?= base_url('admin/books')?>">
						<div>
							<i class="fas fa-book"></i>
							<h6>Total E-Books for Sell</h6>
						</div>
						<?php 
						$this->load->model('admin_model');
						$count_books = count($this->admin_model->count_total_books());
						print $count_books;
						?> 
					</div>
				</div>

				<div class="col-lg-2 col-md-3 col-sm-4">
					<div class="col-admin bg-info clickable-div" data-href="<?= base_url('admin/booksbr')?>">
						<div>
							<i class="fas fa-desktop"></i>
							<h6>Total E-books for Borrow</h6>
						</div>
						<?php 
						$this->load->model('admin_model');
						$count_booksbr = count($this->admin_model->count_total_booksbr());
						print $count_booksbr;
						?> 
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-4">
					<div class="col-admin bg-danger clickable-div" data-href="<?= base_url('admin/orders')?>">
						<div>
							<i class="fas fa-shopping-cart"></i>
							<h6>Total orders</h6>
						</div>
						<?php 
						$this->load->model('admin_model');
						$count_orders = count($this->admin_model->get_orders());
						print $count_orders;
						?> 
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-4">
					<div class="col-admin bg-dark clickable-div" data-href="<?= base_url('#')?>">
						<div>
							<i class="fas fa-cog"></i>
							<h6>Customize Website</h6>
						</div>
						<?php 
						$this->load->model('admin_model');
						?> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>