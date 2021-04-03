
<div class="container">
    <div class="my-form">
        <div id="form-header">Change logo and name of the Organization</div>
        <?= form_open_multipart("admin/add_books")?>
        <div class="form-group row">
            <label for="book-name" class="col-sm-2 col-form-label">Name of the organization</label>
            <div class="col-sm-6">
                <?= form_input(['name'=>'org_name', 'placeholder'=> 'Organization Name', 'value'=>set_value('org_name'), 'class'=>'form-control'])?>
            </div>
            <div class="col-md-4">
                <div class="text-danger form-error"><?= form_error('org_name')?></div>
            </div>
        </div>

        <div class="form-group row">
            <label for="book_image" class="col-sm-2 col-form-label">Logo</label>
            <div class="col-sm-6">
                <?= form_upload(['name'=>'userfile', 'class'=>'form-control', 'id' => 'logo_image'])?>
                <div class="text-secondary">* Upload PNG, JPG format.</div>
            </div>
            <?php if (isset($upload_errors)) { ?>
                <div class="col-sm-4">
                   <div class="text-danger form-error"><?php echo $upload_errors; ?></div>    
               </div>
           <?php } ?>
       </div>

 <div class="sub">
    <span><?= form_submit(['name'=> 'submit', 'value'=> 'Add Book', 'class'=>'btn btn-primary btn-sm my-btn'])?></span>
    <span><?= form_reset(['name'=> 'reset', 'value'=> 'Reset', 'class'=>'btn btn-danger btn-sm my-btn-res'])?></span>
</div>
</div>
</div>