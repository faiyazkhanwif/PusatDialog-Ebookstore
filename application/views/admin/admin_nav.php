<div class="admin-nav">
    <div class="user-name"><i class="fas fa-user"></i> <?php print $this->session->userdata('name') ?></div>

    <div class="admin-menu">
        <ul>
            <li><a href="<?= base_url()?>admin"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="<?= base_url()?>admin/allusers"><i class="fas fa-users"></i> Users</a></li>
            <li><a href="<?= base_url()?>admin/category"><i class="far fa-list-alt"></i> Categories</a></li>
            <li><a href="<?= base_url()?>admin/books"><i class="fas fa-book"></i> E-Books for Sell</a></li>
            <li><a href="<?= base_url()?>admin/booksbr"><i class="fas fa-chalkboard-teacher"></i> E-books for Borrow</a></li>
            <li><a href="<?= base_url()?>admin/orders"><i class="fas fa-cart-arrow-down"></i> Orders</a></li>
            
            <li><a href="<?=base_url()?>admin/customize"><i class="fas fa-cog"></i> Customize Website</a></li>
            <li><a href="<?= base_url('admin/editadminprofile/'.$this->session->userdata('id').'')?>"><i class="fas fa-user"></i> Edit Admin Profile</a></li>
            <li><a href="<?= base_url()?>users/logout"><i class="fas fa-power-off"></i> Logout</a></li>
        </ul>
    </div>
</div>
