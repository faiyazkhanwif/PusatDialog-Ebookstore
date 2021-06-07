
<div class="container">
    <div class="my-form">
        <div id="form-header">Change logo of the Organization</div>
        <?php
        if($this->session->flashdata('danger'))
        {
            print '<div class= "alert-danger">'.$this->session->flashdata('danger').'</div>';
        }
        ?>
        <?= form_open_multipart("admin/changelogo")?>

        <div class="form-group row">
            <label for="logo_image" class="col-sm-2 col-form-label">Main Logo</label>
            <div class="col-sm-6">
                <?= form_upload(['name'=>'userfile', 'class'=>'form-control', 'id' => 'logo_image'])?>
                <div class="text-secondary">* Upload PNG, JPG or JPEG format.</div>
            </div>
            <?php if (isset($upload_errors)) { ?>
                <div class="col-sm-4">
                   <div class="text-danger form-error"><?php echo $upload_errors; ?></div>    
               </div>
           <?php } ?>
       </div>

       <div class="sub">
        <span><?= form_submit(['name'=> 'submit', 'value'=> 'Update Logo', 'class'=>'btn btn-primary btn-sm my-btn'])?></span>

    </div>
</div>
</div>