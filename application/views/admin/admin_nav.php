<div class="admin-nav">
    <div class="user-name"><i class="fas fa-user"></i> <?php print $this->session->userdata('name') ?></div>

    <div class="admin-menu">
        <ul>
            <li><a href="<?= base_url()?>Admin"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="<?= base_url()?>Admin/allusers"><i class="fas fa-users"></i> Manage Users</a></li>
            <li><a href="<?= base_url()?>Admin/category"><i class="far fa-list-alt"></i> Manage Categories</a></li>
            <li><a href="<?= base_url()?>Admin/books"><i class="fas fa-book"></i> Manage E-Books</a></li>
            <li><a href="<?= base_url()?>Admin/currentpromembers"><i class="fas fa-user-shield"></i> Current Pro Members</a></li>
            <li><a href="<?= base_url()?>Admin/orders"><i class="fas fa-cart-arrow-down"></i> E-Book purchases</a></li>
            
            <li><a href="<?=base_url()?>Admin/customize"><i class="fas fa-cog"></i> Customize Website</a></li>
            <li><a href="<?= base_url('Admin/editadminprofile/'.$this->session->userdata('id').'')?>"><i class="fas fa-user"></i> Edit Admin Profile</a></li>
            <li><a href="<?= base_url('Admin/change_password/'.$this->session->userdata('id').'')?>"><i class="fas fa-key"></i> Change Admin Password</a></li>
            <li><a class="btn-danger" href="<?= base_url()?>Users/logout"><i class="fas fa-power-off"></i> Logout</a></li>
        </ul>
    </div>
</div>
