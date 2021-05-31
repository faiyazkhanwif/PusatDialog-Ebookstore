<div class="row">
    <div class="col">
        
    </div>
    <div class="col-lg-8">

           <?= form_open('user-home/editreview/'.$this->uri->segment(3))?>
            <div id="form-header">Edit Review</div><br>

                <div class="form-group">
                    <label for="name">Name</label>
                    <?= form_input(['name'=>'review', 'placeholder'=>'Current Review', 'value'=>set_value('review', $review->review), 'class'=>'form-control'])?>

                    <div class="text-danger form-error"><?= form_error('name')?></div>
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
