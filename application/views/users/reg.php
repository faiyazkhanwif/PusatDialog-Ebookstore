<!--=== Success msg ===-->
<?php 
    if($this->session->flashdata('reg_success'))
    {
        print '<div class= "success-msg">'.$this->session->flashdata('reg_success').'</div>';
    }
?>

<div class="login-form-area">
    <div class="container">
        <div class="reg-form">
            <div class="form-header">Registration Form</div>

           <?= form_open('Users/registration')?>

                <div class="form-group">
                    <label for="name">Name</label>
                    <?= form_input(['name'=>'name', 'placeholder'=>'Your name', 'value'=>set_value('name'), 'class'=>'form-control'])?>

                    <div class="text-danger form-error"><?= form_error('name')?></div>
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <?= form_input(['name'=>'contact', 'placeholder'=>'Phone number', 'value'=>set_value('contact'), 'class'=>'form-control'])?>

                   <div class="text-danger form-error"><?= form_error('contact')?></div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <?= form_input(['name'=>'email', 'placeholder'=>'Your email address', 'value'=>set_value('email'), 'class'=>'form-control'])?>

                    <div class="text-danger form-error"><?= form_error('email')?></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <?= form_password(['name'=>'password', 'placeholder'=>'Password','class'=>'form-control'])?>

                      <div class="text-danger form-error"><?= form_error('password')?></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="repassword">Confirm Password</label>
                        <?= form_password(['name'=>'repassword', 'placeholder'=>'Re-type Password','class'=>'form-control'])?>

                    <div class="text-danger form-error"><?= form_error('repassword')?></div>
                    </div>
                    <div class="text-secondary text-info"><i>*Password should be of 5-32 characters consisting of numbers, capital letters and special characters.</i></div>
                </div>
                <br>
                <div class="form-group">
                    <div class="form-check">
                      <?= form_checkbox(['name'=>'conditionBox', 'class'=>'form-check-input', 'value'=> TRUE]);?>
                      <label class="form-check-label" for="term">
                        I have agreed to Pusat Dialog's <a href="<?= base_url()?>Users/terms" target ="_blank" class="text-primary">terms and conditions</a>. 
                      </label>
                    </div>
                    <div class="text-danger form-error"><?= form_error('conditionBox')?></div>
                </div>
                <div class="form-group text-center">
                <?= form_submit(['name'=>'submit','value'=>'Sign Up', 'class'=>'btn btn-primary btn-lg my-btn']); ?>
                </div>
                <div class="form-group" id="acc">
                    <span>Already have an account?</span>
                    <a href="<?= base_url()?>Users/login">Login now</a>
                </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
