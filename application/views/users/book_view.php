<br>
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-xs-12" id="book-detail">
			<div id="table-header">E-Book Detail</div>
			<div class="row">
				<div class="col-sm-4" id="book-img"><?php print '<img src = "'.strip_tags($book_detail->book_image).'" alt = "">';?></div>
				<div class="col-sm-8">
					<div class="book-info">
						<div >Book Name: <span class="text-info" style="font-weight: bold;"><?= strip_tags($book_detail->book_name)?></span></div>
						<div>Author: <?= strip_tags($book_detail->author)?></div>
						<div>Publisher: <?= strip_tags($book_detail->publisher)?></div>

						<br>
						<div>Category: <?= strip_tags($book_detail->category)?></div>
						<br>

						<div>Price: <?= strip_tags($book_detail->price)?> RM</div>
					</div>
					<br>
					<br>
					<div>
						<?php print '<a href= "'.base_url().'user-home/readbook/'.$book_detail->id.'" title= "Read" class="btn btn-success btn-lg">Read</a>';?>
					</div>
				</div>
			</div>

			<br>
			<div class="book-description"><h5>Book description</h5><hr>
				<p><?= nl2br(strip_tags($book_detail->description)) ?></p>
			</div>
			<hr>
		  <?php if($this->session->userdata('logged_in'))
		  {
			$this->load->view("users/review");
		  }
		  else
		  {
		  	print '<div><p>Please log in to write a review. <a href="'.base_url('users/login').'" class = "btn-login">Login</a></p></div>';
		  }
		  ?>

		</div>
		<div class="col-lg-4 col-md-3">
			
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<?php $this->load->view("users/review_display"); ?>
		</div>
	</div>
	</div>
</div>
<br>