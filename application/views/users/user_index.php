<!--=== Success msg ===-->
<?php 
if($this->session->flashdata('login_success'))
{
    print '<div class= "success-msg">'.$this->session->flashdata('login_success').'</div>';
}
if($this->session->flashdata('success'))
{
    print '<div class= "success-msg">'.$this->session->flashdata('success').'</div>';
}
?>


<div class="admin-index section-padding animate__animated animate__bounceInLeft">
	<div class="user-heading text-center">
       <h3>Welcome, <span class = "text-info"><?php print $this->session->userdata('name') ?></span></h3>

   </div>
</div>

<div class="row animate__animated animate__jackInTheBox animate__delay-1s">
    <div class="col-lg-6">
        <div class="jumbotron shadow">
            <h5 class="" style="color: #004477">Profile details</h5>
            <hr>
            <br>
            <span>
                <p style="font-family: Tahoma ;">Name: <span class="text-info"><?= htmlentities($user_details->name) ?></span></p>
            </span>
            <span>
                <p style="font-family: Tahoma;"><i class="fas fa-envelope"></i> Email:&nbsp&nbsp&nbsp&nbsp<span> <?= htmlentities($user_details->email) ?></span></p>
            </span>
            <span>
                <p style="font-family: Tahoma;"><i class="fas fa-mobile-alt"></i> Phone:&nbsp&nbsp&nbsp&nbsp<span> <?= htmlentities($user_details->contact) ?></span></p>
            </span>
            <span>
            <p style="font-family: Tahoma;"><i class="fas fa-history"></i> Account created on: <?= htmlentities(date('d-M, y', strtotime($user_details->createdate))) ?></p>
            </span>
        </div>

    </div>
    <div class="col-lg-6">
        <div class="jumbotron shadow ">
            <h5 class="" style="color: #004477">Your Activities</h5>
            <hr>
            <br>
            <span>
                <div class="user-orders">
                    <?php 
                    $this->load->model('user_model');
                    $count = count($this->user_model->myboughtbooks());
                    print "<b>Orders: </b>You have bought ".$count." books till now.";
                    ?>
                </div>
            </span>
            <span>
                <div class="user-reviews">
                    <?php 
                    $this->load->model('user_model');
                    $count = count($this->user_model->my_reviews());
                    print "<b>Reviews: </b>You have written ".$count." reviews of books.";
                    ?>
                </div>
            </span>
            <span>

            </span>
        </div>
    </div>
</div>
