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
            <div class="form-header">Password reset form</div>
            <div class="row">
                <div class="col-lg-3">
                    
                </div>
                <div class="col-lg-6">
                <?= form_open('Users/resetlink');?>
                    <div class="form-group">
                        <label for="email"><b>Your Email</b></label>

                        <?= form_input(['name'=>'email','placeholder'=>'Enter your email','value'=>set_value('email'), 'class'=>'form-control']);?>

                        <?= form_error('email', '<div class="text-danger">','</div>'); ?>
                    </div>

                    <span class="text-info"><i>*If an account associated with your email exists in our record, a link for resetting your password will be sent to your email.</i></span>
                        
                    <br>
                    <br>
                    <div class="form-group text-center">
                        <?= form_submit(['name'=>'submit','value'=>'Reset Password', 'class'=>'btn btn-danger my-btn-res']); ?>&nbsp
                    </div>
                <?= form_close();?>
                </div>
                <!--=== Login with social apps ===-->
                <div class="col-lg-3">
                    <div class="login-with">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
