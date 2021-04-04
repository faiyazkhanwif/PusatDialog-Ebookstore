<div class="text-success">
	<?php 
    if($this->session->flashdata('success'))
    {
        print '<div class= "success-msg">'.$this->session->flashdata('success').'</div>';
    }
	?>
</div>


<div class="admin-index section-padding" style="min-height: 500px">
	<div class="text-center">
		<h3>Customize Your Website</h3>
	</div>
	
	<div class="admin-content section-padding">
		<div class="container">
			<div class="row con-flex">
				<div class="col-lg-2 col-md-3 col-sm-4">
					<div class="col-admin bg-secondary clickable-div" data-href="<?= base_url('admin/changelogo')?>">
						<div>
							<i class="far fa-image"></i>
							<h6>Change main logo</h6>
						</div>
						
						<?php 
						//$this->load->model('admin_model');
						//$count_users = count($this->admin_model->get_users());
						//print $count_users;
						?> 
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-4">
					<div class="col-admin bg-primary clickable-div" data-href="<?= base_url('admin/changename')?>">
						<div>
							<i class="fas fa-signature"></i>
							<h6>Edit name of the organization</h6>
						</div>
						<?php 
						//$this->load->model('admin_model');
						//$count_category = count($this->admin_model->get_category());
						//print $count_category;
						?> 
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-4">
					<div class="col-admin bg-success clickable-div" data-href="<?= base_url('admin/changeftdsc')?>">
						<div>
							<i class="fas fa-list"></i>
							<h6>Edit footer content</h6>
						</div>
						<?php 
						//$this->load->model('admin_model');
						//$count_books = count($this->admin_model->count_total_books());
						//print $count_books;
						?> 
					</div>
				</div>

				<div class="col-lg-2 col-md-3 col-sm-4">
					<div class="col-admin bg-info clickable-div" data-href="<?= base_url('admin/booksbr')?>">
						<div>
							<i class="fas fa-phone"></i>
							<h6>Edit contact us page</h6>
						</div>
						<?php 
						//$this->load->model('admin_model');
						//$count_booksbr = count($this->admin_model->count_total_booksbr());
						//print $count_booksbr;
						?> 
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-4">
					<div class="col-admin bg-danger clickable-div" data-href="<?= base_url('admin/orders')?>">
						<div>
							<i class="fas fa-address-card"></i>
							<h6>Edit about us page</h6>
						</div>
						<?php 
						//$this->load->model('admin_model');
						//$count_orders = count($this->admin_model->get_orders());
						//print $count_orders;
						?> 
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-4">
					<div class="col-admin bg-dark clickable-div" data-href="<?= base_url('admin/customize')?>">
						<div>
							<i class="fas fa-exclamation-circle"></i>
							<h6>Edit terms and conditions</h6>
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