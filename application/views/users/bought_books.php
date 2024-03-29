<!--=== Success msg ===-->
<?php 
    if($this->session->flashdata('success'))
    {
        print '<div class= "success-msg">'.$this->session->flashdata('success').'</div>';
    }
?>

<div class="container-fluid animate__animated animate__bounceInLeft">
	<div id="table-header">Bought Books</div>
	<table class="table table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">ISBN</th>
      <th scope="col">Book Name</th>
      <th scope="col">Author</th>
      <th scope="col">Price</th>
      <th scope="col">Book Cover</th>
      <th scope="col">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAction</th>
    </tr>
  </thead>


  <tbody>
        <?php foreach($books as $book): ?>
    <tr>
      <?php print '<td>'.$book->book_isbn.'</td>'; ?>
      <?php print '<td><a href = "'.base_url().'User-home/book_view/'.$book->book_Id.'" title="" class= "text-info">'.strip_tags(ucwords($book->book_name)).'</a></td>'; ?>

      <?php print '<td><b>'.strip_tags($book->book_author).'</b></td>'; ?>
      <?php print '<td>RM '.strip_tags($book->book_price).'</td>'; ?>
      <?php print '<td><img src = "'.strip_tags($book->book_image).'" alt = "" width="50" height="70" </td>';?>


      <?php print '<td>';
      //-- normal code without protection
        //print '<a href= "'.strip_tags($book->book_file).'" title= "Download" class="btn btn-primary btn-sm">View</a>&nbsp';

      //-- Testing protection using google doc
      //$link = str_replace("view","preview","https://drive.google.com/file/d/1lwO_tNwDYzCwdQa8uUWCtcNKr667HIPJ/view?usp=sharing&embedded=true");
      //$finallink = str_replace("drive","docs",$link);
      //  print '<a href= "'.strip_tags($finallink).'" title= "Read" class="btn btn-primary btn-sm">Read</a>&nbsp';

      print '<a href= "'.base_url().'User-home/readbook/'.$book->book_Id.'" title= "Read" class="btn btn-success btn-sm">Read</a>&nbsp&nbsp&nbsp';
      print '<a href= "'.base_url().'User-home/book_view/'.$book->book_Id.'" title= "Details" class="btn btn-primary btn-sm">Details</a>&nbsp';

        print '</td>'; 
      ?>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>


</div>
