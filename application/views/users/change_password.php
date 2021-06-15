<div class="row animate__animated animate__bounceInLeft">
    <div class="col">
        
    </div>

    <div class="col-6">
        <?php
        if($this->session->flashdata('danger'))
        {
            print '<div class= "alert-danger">'.$this->session->flashdata('danger').'</div>';
        }
        ?>
        <?= form_open('User_home/change_password/'.$this->uri->segment(3))?>
        <div id="form-header">Change Your Password</div><br>

        <div class="form-group">
            <label for="oldpassword">Current Password</label>
            <?= form_password(['name'=>'oldpassword', 'placeholder'=>'','class'=>'form-control'])?>

            <div class="text-danger form-error"><?= form_error('oldpassword')?></div>
        </div>
        <div class="form-row">
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
        </div>
        

        <br>
        <div class="form-group">
            <?= form_submit(['name'=>'submit','value'=>'Update Password', 'class'=>'btn btn-primary btn-sm my-btn']); ?>
            <?= form_reset(['name'=>'reset', 'value'=> 'Reset', 'class'=>'btn btn-danger btn-sm my-btn-res'])?>
        </div>

        <?= form_close() ?>
    </div>
    <div class="col">
        
    </div>
</div>
<br>
