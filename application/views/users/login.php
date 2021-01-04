<!--=== Error msg ===-->
<?php 
if($this->session->flashdata('login_fail'))
{
    print '<div class= "error-msg">'.$this->session->flashdata('login_fail').'</div>';
}

if($this->session->flashdata('no_access'))
{
    print '<div class= "error-msg">'.$this->session->flashdata('no_access').'</div>';
}
?>
<!--=== Success msg ===-->
<?php 
if($this->session->flashdata('reg_success'))
{
    print '<div class= "success-msg">'.$this->session->flashdata('reg_success').'</div>';
}
?>

<div class="login-form-area">
    <div class="container">
        <div class="login-form">
            <div class="form-header section-title" style="padding-top: 20px; border-bottom: .2px solid #BDC5CA;"><h4>Welcome to Pusat Dialog! Please login.
            </h4></div>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <img style="height: 300px; width: 300px;" src="<?= base_url('resource/img/logintwo.png');?>">
                </div>
                <div class="col-lg-4">
                    <?= form_open('users/login');?>
                    <div class="form-group">
                        <label for="email" class="section-title" style="font-family: Helvetica; font-size: 15px;"><b>Your Email</b></label>

                        <?= form_input(['name'=>'email','placeholder'=>'Enter your email','value'=>set_value('email'), 'class'=>'form-control']);?>

                        <?= form_error('email', '<div class="text-danger">','</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password" class="section-title" style="font-family: Helvetica; font-size: 15px;"><b>Password</b></label>

                        <?= form_password(['name'=>'password','placeholder'=>'Enter your password','value'=> '', 'class'=>'form-control']);?>
                        <small><a href="#">Forgot password</a></small>

                        <?= form_error('password', '<div class="text-danger">','</div>'); ?>

                    </div>

                    <div class="form-check">
                        <?=form_checkbox('checkbox', 'accept', False, ['class'=>'form-check-input']);?>
                        <label class="form-check-label" >Remember me</label>
                    </div>
                    <div class="form-group" style="text-align: center;">
                        <?= form_submit(['name'=>'submit','value'=>'Login', 'class'=>'btn btn-success my-btn']); ?>&nbsp
                        <?= form_reset(['name'=> 'reset', 'value'=> 'Reset', 'class'=>'btn my-btn-res'])?>
                    </div>
                    <br>
                    <div class="form-group" style="text-align: center;" id="acc">
                        <span>Don’t have an account?</span>
                        <a href="<?= base_url() ?>users/registration" class= "text-info">Register now</a>
                    </div>  
                    <?= form_close();?>
                </div>
                <div class="col-lg-4">
                    <img style="height: 300px; width: 300px;" src="<?= base_url('resource/img/loginpone.png');?>">
                </div>
            </div>
        </div>
    </div>
</div>
