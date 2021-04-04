
<div class="container">
    <div class="my-form">
        <div id="form-header">Change footer description</div>
        <?= form_open_multipart("admin/changeftdsc")?>
        <div class="form-group row">
            <label for="org-name" class="col-sm-2 col-form-label">Footer Description</label>
            <div class="col-sm-6">
                <?= form_textarea(['name'=>'ft_dsc', 'placeholder'=> 'Footer description', 'value'=>set_value('ft_dsc'), 'class'=>'form-control'])?>
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