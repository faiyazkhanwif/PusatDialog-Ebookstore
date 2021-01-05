<!--=== Success msg ===-->
<?php
if ($this->session->flashdata('reg_success')) {
    print '<div class= "success-msg">' . $this->session->flashdata('reg_success') . '</div>';
}
?>

<div class="login-form-area">
    <div class="container">
        <div class="reg-form">
            <div class="form-header section-title" style="padding-top: 20px; border-bottom: .2px solid #BDC5CA;">
                <h4>Welcome to Pusat Dialog! Please fill up the registration form to sign up.</h4>
            </div>

            <?= form_open('users/registration') ?>
            <br>
            <div class="row">
                <div class="col-lg-3">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <img style="height: 280px; width: 280px;" src="<?= base_url('resource/img/regtwo.png'); ?>">
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name" class="section-title" style="font-family: Helvetica; font-size: 15px; font-weight: bold">Full Name</label>
                        <?= form_input(['name' => 'name', 'placeholder' => 'Your name', 'value' => set_value('name'), 'class' => 'form-control']) ?>

                        <div class="text-danger form-error"><?= form_error('name') ?></div>
                    </div>
                    <div class="form-group">
                        <label for="contact" class="section-title" style="font-family: Helvetica; font-size: 15px; font-weight: bold">Contact</label>
                        <?= form_input(['name' => 'contact', 'placeholder' => 'Phone number', 'value' => set_value('contact'), 'class' => 'form-control']) ?>

                        <div class="text-danger form-error"><?= form_error('contact') ?></div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="section-title" style="font-family: Helvetica; font-size: 15px; font-weight: bold">E-mail</label>
                        <?= form_input(['name' => 'email', 'placeholder' => 'Your email', 'value' => set_value('email'), 'class' => 'form-control']) ?>

                        <div class="text-danger form-error"><?= form_error('email') ?></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password" class="section-title" style="font-family: Helvetica; font-size: 15px; font-weight: bold">Password</label>
                            <?= form_password(['name' => 'password', 'placeholder' => 'Password', 'class' => 'form-control']) ?>

                            <div class="text-danger form-error"><?= form_error('password') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="repassword" class="section-title" style="font-family: Helvetica; font-size: 15px; font-weight: bold">Confirm Password</label>
                            <?= form_password(['name' => 'repassword', 'placeholder' => 'Re-type Password', 'class' => 'form-control']) ?>

                            <div class="text-danger form-error"><?= form_error('repassword') ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="section-title" style="font-family: Helvetica; font-size: 15px; font-weight: bold">Address</label>
                        <?= form_input(['name' => 'address', 'placeholder' => 'Your address', 'value' => set_value('address'), 'class' => 'form-control']) ?>

                        <div class="text-danger form-error"><?= form_error('address') ?></div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="section-title" style="font-family: Helvetica; font-size: 15px; font-weight: bold;">City</label>
                        <?= form_input(['name' => 'city', 'placeholder' => 'Your city', 'value' => set_value('city'), 'class' => 'form-control']) ?>

                        <div class="text-danger form-error"><?= form_error('city') ?></div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <?= form_checkbox(['name' => 'conditionBox', 'class' => 'form-check-input', 'value' => TRUE]); ?>
                            <label class="form-check-label" for="term">
                                I declare that all the information given above are true and valid.
                            </label>
                        </div>
                        <div class="text-danger form-error"><?= form_error('conditionBox') ?></div>
                    </div>


                    <div class="form-group" style="text-align: center;">
                        <?= form_submit(['name' => 'submit', 'value' => 'Sign Up', 'class' => 'btn btn-primary btn-lg']); ?>
                    </div>
                    <div class="form-group" id="acc" style="text-align: center;">
                        <span>Already have an account?</span>
                        <a href="<?= base_url() ?>users/login">Click here to log in.</a>
                    </div>
                    <?= form_close() ?>
                </div>
                <div class="col-lg-3">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <img style="height: 200px; width: 250px;" src="<?= base_url('resource/img/regone.png'); ?>">
                </div>
            </div>


        </div>
    </div>
</div>