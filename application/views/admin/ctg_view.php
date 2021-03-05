<br>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-xs-7" style="min-height: 500px">
			<div id="table-header" class="text-center"><h4 style="font-family: Trebuchet MS; font-weight: bold;">Category</h4></div>
			<br>
			<h5>Category Name: <?= strip_tags($ctg_detail->category) ?></h5>
			<p><?= strip_tags($ctg_detail->description) ?></p>
			<b>Tag: <?= strip_tags($ctg_detail->tag) ?></b>
			<br>
			<hr>
			<br>
			<div class="text-center">
				<?php print '<td>';
				print '<a href= "'.base_url().'admin/ctg_edit/'.$ctg_detail->id.'" title= "Edit" class="btn btn-success btn-sm"> <i class= "fas fa-wrench"></i> Update</a>&nbsp';
				print '<a href= "'.base_url().'admin/ctg_delete/'.$ctg_detail->id.'" title= "Delete" class="btn btn-danger btn-sm delete" data-confirm = "Are you sure to delete this category? If it deleted user can not find the books from this category."> <i class= "fas fa-trash"></i> Delete</a>&nbsp';

				print '</td>'; 
				?>
			</div>

		</div>
		<div class="col-sm-6 col-xs-5">
			
		</div>
	</div>
</div>