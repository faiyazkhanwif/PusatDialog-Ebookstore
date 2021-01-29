<!--=== Success msg ===-->
<?php
if ($this->session->flashdata('login_success')) {
    print '<div class= "success-msg">' . $this->session->flashdata('login_success') . '</div>';
}
if ($this->session->flashdata('success')) {
    print '<div class= "success-msg">' . $this->session->flashdata('success') . '</div>';
}
?>


<div class="section-padding">
    <div class="row">
        <div class="col-lg-6">
            <div class="user-heading ">
                <h3 class="display-4">Welcome, <span class=" display-4" style="color: #004477"><?= htmlentities($user_details->name) ?>!</span></h3>
            </div>
        </div>
        <div class="col-lg-6">
            <br>
            <div style="text-align: right;">
                <a class="btn btn-danger" href="<?= base_url() ?>users/logout"><i class="fas fa-power-off"></i> Logout</a></li>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="jumbotron shadow">
            <h3 class="" style="color: #004477">Profile details</h3>
            <hr>
            <br>
            <span>
                <h4 style="font-family: Tahoma ;">Name: <span class="text-info"><?= htmlentities($user_details->name) ?></span></h4>
            </span>
            <br>
            <span>
                <p style="font-family: Tahoma;"><i class="fas fa-envelope"></i> Email:&nbsp&nbsp&nbsp&nbsp<span> <?= htmlentities($user_details->email) ?></span></p>
            </span>
            <span>
                <p style="font-family: Tahoma;"><i class="fas fa-mobile-alt"></i> Phone:&nbsp&nbsp&nbsp&nbsp<span> <?= htmlentities($user_details->contact) ?></span></p>
            </span>
            <p style="font-family: Tahoma;"><i class="fas fa-map-marker-alt"></i> <?= htmlentities($user_details->address) ?>.</p>
            <p style="font-family: Tahoma;"><i class="fas fa-city"></i> <?= htmlentities($user_details->city) ?></p>
            <p style="font-family: Tahoma;"><i class="fas fa-history"></i> Account created on: <?= htmlentities(date('d-M, y', strtotime($user_details->createdate))) ?></p>
        </div>

    </div>

    <div class="col-lg-6">
        <div class="jumbotron shadow">
            <h3 class="" style="color: #004477">Your Activities</h3>
            <hr>
            <br>
            <span>
                <h5>Total E-books purchased: <span class="text-info">5 E-books.</span></h5>
            </span>
            <br>
            <span>
                <h5>Total E-books borrowed: <span class="text-info">2 E-books.</span></h5>
            </span>
            <br>
            <span>
                <h5>Total reviews given: <span class="text-info">3 reviews.</span></h5>
            </span>

        </div>
        <br>
        <p class="lead">
        <div style="text-align: center;">
            <a class="btn btn-primary btn-lg" style="box-shadow: 2px 2px #7DAECC;border-radius: 15px;padding: 5px 30px;" href="<?= base_url('user-home/edit-profile/' . $this->session->userdata('id') . '') ?>" role="button">Edit Profile</a>
        </div>
        </p>

    </div>
</div>