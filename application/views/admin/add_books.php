<!--=== Book Menu ===-->
<?php 
if($this->session->flashdata('danger'))
{
    print '<div class= "alert-danger">'.$this->session->flashdata('danger').'</div>';
}
?>
<div class="container-fluid">
    <div class="books-menu">
      <ul>
        <li><a href="<?= base_url()?>admin/books"><i class="fas fa-book"></i> All E-books for sell</a></li>
        <li><a href="<?= base_url()?>admin/add_books"><i class="fas fa-plus-circle"></i> Add new E-book for sell</a></li>

        
        
    </ul>
</div>
</div>

<div class="container">
    <div class="my-form">
        <div id="form-header">Add new E-books for sell</div>
        <?= form_open_multipart("admin/add_books")?>
        <div class="form-group row">
            <label for="book-name" class="col-sm-2 col-form-label">Book Name</label>
            <div class="col-sm-6">
                <?= form_input(['name'=>'book_name', 'placeholder'=> 'Book Name', 'value'=>set_value('book_name'), 'class'=>'form-control'])?>
            </div>
            <div class="col-md-4">
                <div class="text-danger form-error"><?= form_error('book_name')?></div>
            </div>
        </div>
        <div class="form-group row">
            <label for="book-isbn" class="col-sm-2 col-form-label">ISBN</label>
            <div class="col-sm-6">
                <?= form_input(['name'=>'book_isbn', 'placeholder'=> 'Book ISBN', 'value'=>set_value('book_isbn'), 'class'=>'form-control'])?>
            </div>
            <div class="col-md-4">
                <div class="text-danger form-error"><?= form_error('book_name')?></div>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-6">
                <?= form_textarea(['name'=>'description', 'placeholder'=>'Book Description',  'value'=>set_value('description'), 'class'=>'form-control', 'rows'=>'5'])?>
            </div>
            <div class="col-md-4">
                <div class="text-danger form-error"><?= form_error('description')?></div>
            </div>
        </div>
        <div class="form-group row">
            <label for="author" class="col-sm-2 col-form-label">Author</label>
            <div class="col-sm-6">
               <?= form_input(['name'=>'author', 'placeholder'=> 'Author Name', 'value'=>set_value('author'), 'class'=>'form-control'])?>
           </div>
           <div class="col-md-4">
            <div class="text-danger form-error"><?= form_error('author')?></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
        <div class="col-sm-6">
           <?= form_input(['name'=>'publisher', 'placeholder'=> 'Publisher Name', 'value'=>set_value('publisher'), 'class'=>'form-control'])?>

       </div>
       <div class="col-md-4">
        <div class="text-danger form-error"><?= form_error('publisher')?></div>
    </div>
</div>
<div class="form-group row">
    <label for="price" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-6">
        <?= form_input(['name'=>'price', 'placeholder'=> 'Book price', 'value'=>set_value('price'), 'class'=>'form-control'])?>
    </div>
    <div class="col-md-4">
        <div class="text-danger form-error"><?= form_error('price')?></div>
    </div>
</div>


<div class="form-group row">
    <label for="category" class="col-sm-2 col-form-label">Category</label>
    <div class="col-sm-6">
        <select name="categoryId" class="form-control">
            <option value="">Choose...</option>
            <?php foreach($category as $ctg): ?>
                <?php print '<option value="'.$ctg->id.'">'.$ctg->category.'</option>'; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-sm-4">
        <div class="text-danger form-error"><?= form_error('categoryId')?></div>
    </div>
</div>

<div class="form-group row">
    <label for="book_image" class="col-sm-2 col-form-label">E-Book Cover</label>
    <div class="col-sm-6">
        <?= form_upload(['name'=>'userfile', 'class'=>'form-control', 'id' => 'book_image'])?>
        <div class="text-secondary">* Upload PNG, JPG format. Image should not be more than 100MB</div>
    </div>
    <?php if (isset($upload_errors)) { ?>
        <div class="col-sm-4">
         <div class="text-danger form-error"><?php echo $upload_errors; ?></div>    
     </div>
 <?php } ?>
</div>
<div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">E-Book File Link</label>
    <div class="col-sm-6">
        <?= form_textarea(['name'=>'userfile2', 'placeholder'=>'File link from host server',  'value'=>set_value('userfile2'), 'class'=>'form-control', 'rows'=>'3'])?>
    </div>
    <div class="col-md-4">
        <div class="text-danger form-error"><?= form_error('userfile2')?></div>
    </div>
</div>
<!--
<div class="form-group row">
    <label for="book_file" class="col-sm-2 col-form-label">E-Book File</label>
    <div class="col-sm-6">
        // //form_upload(['name'=>'userfile2', 'class'=>'form-control'])?>
        <div class="text-secondary">* Upload pdf format. file should not be more than 5MB</div>
    </div>
    <div class="col-sm-4">
     <div class="text-danger form-error"></div>    
 </div>
</div>
-->
<div class="sub">
    <span><?= form_submit(['name'=> 'submit', 'value'=> 'Add Book', 'class'=>'btn btn-primary btn-sm my-btn'])?></span>
    <span><?= form_reset(['name'=> 'reset', 'value'=> 'Reset', 'class'=>'btn btn-danger btn-sm my-btn-res'])?></span>
</div>
</form>
</div>
</div>

