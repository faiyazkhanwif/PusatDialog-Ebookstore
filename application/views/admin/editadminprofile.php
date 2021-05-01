<div class="row">
    <div class="col">
        
    </div>
    <div class="col-lg-5">

           <?= form_open('admin/editadminprofile/'.$this->uri->segment(3))?>
            <div id="form-header">Edit Admin info</div><br>

                <div class="form-group">
                    <label for="name">Name</label>
                    <?= form_input(['name'=>'name', 'placeholder'=>'Your name', 'value'=>set_value('name', $user_details->name), 'class'=>'form-control'])?>

                    <div class="text-danger form-error"><?= form_error('name')?></div>
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <?= form_input(['name'=>'contact', 'placeholder'=>'Phone number', 'value'=>set_value('contact', $user_details->contact), 'class'=>'form-control'])?>

                   <div class="text-danger form-error"><?= form_error('contact')?></div>
                </div>
    
                <br>
                <div class="form-group">
                <?= form_submit(['name'=>'submit','value'=>'Update', 'class'=>'btn btn-primary btn-sm my-btn']); ?>
                <?= form_reset(['name'=>'reset', 'value'=> 'Reset', 'class'=>'btn btn-danger btn-sm my-btn-res'])?>
                </div>

            <?= form_close() ?>
    </div>
    <div class="col">
        
    </div>
</div>
<br>
