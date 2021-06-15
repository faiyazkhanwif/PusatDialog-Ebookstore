<!--=== Success msg ===-->
<?php 
    if($this->session->flashdata('success'))
    {
        print '<div class= "success-msg">'.$this->session->flashdata('success').'</div>';
    }
?>

<div class="container-fluid animate__animated animate__bounceInLeft">
	<div id="table-header">My Reviews</div>
	<table class="table table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">Book Name</th>
      <th scope="col">Review</th>
      <th scope="col">&nbsp&nbsp&nbsp&nbsp&nbspAction</th>
    </tr>
  </thead>


  <tbody>
        <?php foreach($reviews as $review): ?>
    <tr>
      <?php print '<td><a href = "'.base_url().'#" title="" class= "text-info">'.strip_tags(ucwords($review->bookname)).'</a></td>'; ?>

      <?php print '<td>'.strip_tags($review->review).'</td>'; ?>

      


      <?php print '<td>';
      //-- normal code without protection
        //print '<a href= "'.strip_tags($book->book_file).'" title= "Download" class="btn btn-primary btn-sm">View</a>&nbsp';

      //-- Testing protection using google doc
      //$link = str_replace("view","preview","https://drive.google.com/file/d/1lwO_tNwDYzCwdQa8uUWCtcNKr667HIPJ/view?usp=sharing&embedded=true");
      //$finallink = str_replace("drive","docs",$link);
      //  print '<a href= "'.strip_tags($finallink).'" title= "Read" class="btn btn-primary btn-sm">Read</a>&nbsp';

      print '<a href= "'.base_url().'User-home/editreview/'.$review->id.'" title= "Edit" class="btn btn-primary btn-sm">Edit</a>&nbsp';
      print '<a href= "'.base_url().'User-home/reviewdelete/'.$review->id.'" title= "Delete" class="btn btn-danger btn-sm delete" data-confirm = "Are you sure to delete this review?"><i class="fas fa-times"></i></a>';


        print '</td>'; 
      ?>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>


</div>
