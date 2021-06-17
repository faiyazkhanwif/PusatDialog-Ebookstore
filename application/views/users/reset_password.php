
<div class="row animate__animated animate__bounceInLeft">
    <div class="col">

    </div>

    <div class="col-6 login-form-area">

        <?= form_open('Users/resetpassword')?>
        <div id="form-header">Reset Your Password</div><br>
        <?php
        if($this->session->flashdata('danger'))
        {
            print '<div class= "alert-danger">'.$this->session->flashdata('danger').'</div>';
            print '<br>';
        }
        ?>
        <?php 
        $email = $data['email'];
        $email_hash = $data['email_hash'];
        $email_code = $data['email_code'];
        if (isset($email_hash,$email_code)) {
            ?>
            <input type="hidden" value="<?php echo $email_hash ?>" name="email_hash"/>
            <input type="hidden" value="<?php echo $email_code ?>" name="email_code"/>
        <?php } ?>
        <input type="hidden" value="<?php echo (isset($email)) ? $email : ''; ?>" name="email"/>
        <div class="form-row">
            <!-- < ?php echo $email ?>
            //< ?php echo $email_hash ?>
            //< ?php echo $email_code ?>-->
            <div class="form-group col-md-6">
                <label for="password">New Password</label>
                <?= form_password(['name'=>'newpassword', 'placeholder'=>'','class'=>'form-control'])?>

                <div class="text-danger form-error"><?= form_error('newpassword')?></div>
            </div>
            <div class="form-group col-md-6">
                <label for="repassword">Confirm Password</label>
                <?= form_password(['name'=>'repassword', 'placeholder'=>'','class'=>'form-control'])?>

                <div class="text-danger form-error"><?= form_error('repassword')?></div>
            </div>
            <div class="text-secondary text-info"><i>*Password should be of 5-32 characters consisting of numbers, capital letters and special characters.</i></div>
        </div>
        

        <br>
        <div class="form-group">
            <?= form_submit(['name'=>'submit','value'=>'Set New Password', 'class'=>'btn btn-primary btn-sm my-btn']); ?>

        </div>

        <?= form_close() ?>
    </div>
    <div class="col">

    </div>
</div>
<br>
