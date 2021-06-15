<div class="container">
<div class="my-form">
    <div id="form-header">Add new user</div>

           <?= form_open('Admin/add_users')?>

                <div class="form-group">
                    <label for="name">Name</label>
                    <?= form_input(['name'=>'name', 'placeholder'=>'Name of the account holder', 'value'=>set_value('name'), 'class'=>'form-control'])?>

                    <div class="text-danger form-error"><?= form_error('name')?></div>
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <?= form_input(['name'=>'contact', 'placeholder'=>'Phone number', 'value'=>set_value('contact'), 'class'=>'form-control'])?>

                   <div class="text-danger form-error"><?= form_error('contact')?></div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <?= form_input(['name'=>'email', 'placeholder'=>'Valid email', 'value'=>set_value('email'), 'class'=>'form-control'])?>

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
                </div>
                <div class="form-group">
                <label for="type">Type</label>
                <div class="form-group">
                    <?php $options = array(
                            '' => 'Choose one from below:',
                            'U'=> 'User',
                            'A'=> 'Admin'
                        );
                    print form_dropdown('type', $options, 'A', ['class' => 'form-control']);
                    ?>
                 <div><?= form_error('type', '<div class="text-danger">','</div>'); ?></div>
                </div>
              	</div>
                <br>


                <div class="form-group">
                <?= form_submit(['name'=>'submit','value'=>'Save', 'class'=>'btn btn-primary btn-sm my-btn']); ?>
                <?= form_reset(['name'=>'reset', 'value'=> 'Reset', 'class'=>'btn btn-danger btn-sm my-btn-res'])?>
                </div>

            <?= form_close() ?>
        </div>
    </div>
