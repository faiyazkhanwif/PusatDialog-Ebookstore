<div class="container">
    <div class="my-form">
        <br>
        <br>
    <div id="form-header"><h4 style="font-family: Trebuchet MS; font-weight: bold;">Add Category</h4></div>
    <br>
    <?= form_open('admin/add_category')?>
        <div class="form-group row">
            <label for="category-name" class="col-sm-3 col-form-label">Category Name</label>
            <div class="col-sm-9">
            <?= form_input(['name'=>'category', 'value'=>set_value('category'), 'placeholder'=> 'Category name', 'class'=>'form-control'])?>
            </div>
            <div class="col-md-4">
                <div class="text-danger form-error"><?= form_error('category')?></div>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9">
            <?= form_textarea(['name'=>'description', 'placeholder'=>'Category description','value'=>set_value('description'), 'class'=>'form-control','rows'=>'5',])?>
            </div>
            <div class="col-md-4">
                <div class="text-danger form-error"><?= form_error('description')?></div>
            </div>
        </div>
        <div class="form-group row">
            <label for="category-tag" class="col-sm-3 col-form-label">Tag</label>
            <div class="col-sm-9">
            <?= form_input(['name'=>'tag', 'value'=>set_value('tag'), 'placeholder'=> 'Category tag', 'class'=>'form-control'])?>
            </div>
            <div class="col-md-4">
                <div class="text-danger form-error"><?= form_error('tag')?></div>
            </div>
        </div>
        
<br>
        <div class="sub text-center">
            <span><?= form_submit(['name'=>'submit', 'value'=>'Save', 'class'=>'btn btn-primary btn-sm my-btn'])?></span>
            <span>&nbsp&nbsp</span>
            <span><?= form_reset(['name'=>'reset', 'value'=>'Reset', 'class'=>'btn btn-danger btn-sm my-btn-res'])?></span>
        </div>
    <?= form_close()?>
</div>

</div>