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
       <h3>Welcome, <span class = "text-info"><?php print $user_details->name ?></span></h3>

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
            <p style="font-family: Tahoma;"><i class="fas fa-history"></i> Account created on: <?= htmlentities(date('Y-m-d', strtotime($user_details->createdate))) ?></p>
            </span>
            <p style="font-family: Tahoma;"><i class="fa fa-user-plus"></i> Membership Status: <?= htmlentities($user_details->membershipstatus) ?></p>
            </span>
            <?php
                if ($user_details->membershipstatus=="pro") {
                    print '<p style="font-family: Tahoma;"><i class="fas fa-clock"></i> Pro Membership Expire Date: '.htmlentities($mem_details->expiredate) .'</p>';
                }
            ?>
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
                    $this->load->model('User_model');
                    $count = count($this->User_model->myboughtbooks());
                    print "<b>Orders: </b>You have bought ".$count." books till now.";
                    ?>
                </div>
            </span>
            <span>
                <div class="user-reviews">
                    <?php 
                    $this->load->model('User_model');
                    $count = count($this->User_model->my_reviews());
                    print "<b>Reviews: </b>You have written ".$count." reviews of books.";
                    ?>
                </div>
            </span>
            <span>

            </span>
        </div>
    </div>
</div>
