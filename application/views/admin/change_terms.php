
<div class="container">
    <div class="my-form">
        <div id="form-header">Change Terms and Conditions</div>
        <?php
        if($this->session->flashdata('danger'))
        {
            print '<div class= "alert-danger">'.$this->session->flashdata('danger').'</div>';
        }
        ?>
        <?= form_open_multipart("Admin/changeterms")?>
        <div class="form-group row">
            <label for="org-name" class="col-sm-2 col-form-label">Terms and Conditions</label>
            <div class="col-sm-6">
                <?php foreach($termsdscs as $terms): ?>
                    <?= form_textarea(['name'=>'terms_dsc', 'placeholder'=> 'Terms and Conditions', 'value'=>set_value('terms_dsc',  $terms->termsdsc), 'class'=>'form-control'])?>
                <?php endforeach; ?>
            </div>
            <div class="col-md-4">
                <div class="text-danger form-error"><?= form_error('org_name')?></div>
            </div>
        </div>

        <div class="sub">
            <span><?= form_submit(['name'=> 'submit', 'value'=> 'Update', 'class'=>'btn btn-primary btn-sm my-btn'])?></span>
            <span><?= form_reset(['name'=> 'reset', 'value'=> 'Reset', 'class'=>'btn btn-danger btn-sm my-btn-res'])?></span>
        </div>
    </div>
</div>