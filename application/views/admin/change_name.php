
<div class="container">
    <div class="my-form">
        <div id="form-header">Change Name of the Organization</div>
        <?= form_open_multipart("admin/changename")?>
        <div class="form-group row">
            <label for="org-name" class="col-sm-2 col-form-label">Name of the organization</label>
            <div class="col-sm-6">
                <?php foreach($names as $name): ?>
                    <?= form_input(['name'=>'org_name', 'placeholder'=> 'Organization Name', 'value'=>set_value('org_name', $name->orgname), 'class'=>'form-control'])?>
                <?php endforeach; ?>
            </div>
            <div class="col-md-4">
                <div class="text-danger form-error"><?= form_error('org_name')?></div>
            </div>
        </div>

        <div class="sub">
            <span><?= form_submit(['name'=> 'submit', 'value'=> 'Update Name', 'class'=>'btn btn-primary btn-sm my-btn'])?></span>
            <span><?= form_reset(['name'=> 'reset', 'value'=> 'Reset', 'class'=>'btn btn-danger btn-sm my-btn-res'])?></span>
        </div>
    </div>
</div>