<br><div id="table-header">Search results
</div><br>

<?php if(!$books): ?>
	<div><h6 class="text-danger">No E-books found related to your search. Search for ebooks by ISBN, Title or Author.</h6></div>
	<?php else: ?>
	<table class="table table-hover table-responsive borderless">
	<?php foreach($books as $book):?>
			<tr  class='clickable-row' data-href="<?= base_url('Users/book_view/'.$book->id)?>">
			<td>
			<?php print '<img src = "'.strip_tags($book->book_image).'" alt = "" height="170" width = "140">';?>	
			</td>
			<td colspan="1"></td>
			<td>
				<p class="text-info" style="font-size: 18px"><?= htmlentities($book->book_name) ?></p>
				<p id="author">By <?= htmlentities($book->author) ?></p>
				<p id="price">Price: <?= htmlentities($book->price) ?> RM</p>
				<p><?= substr(htmlentities($book->description),0,250)?></p>
			</td>
			</tr>
	<?php endforeach;?>
	</table>
<?php endif; ?>

 