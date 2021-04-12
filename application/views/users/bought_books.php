<!--=== Success msg ===-->
<?php 
    if($this->session->flashdata('success'))
    {
        print '<div class= "success-msg">'.$this->session->flashdata('success').'</div>';
    }
?>

<div class="container-fluid">
	<div id="table-header">Bought Books</div>
	<table class="table table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Book Name</th>
      <th scope="col">Author</th>
      <th scope="col">Price</th>
      <th scope="col">Book Cover</th>
      <th scope="col">Action</th>
    </tr>
  </thead>


  <tbody>
        <?php foreach($books as $book): ?>
    <tr>
      <?php print '<td>'.$book->book_Id.'</td>'; ?>
      <?php print '<td><a href = "'.base_url().'#" title="" class= "text-info">'.strip_tags(ucwords($book->book_name)).'</a></td>'; ?>

      <?php print '<td><b>'.strip_tags($book->book_author).'</b></td>'; ?>
      <?php print '<td>RM '.strip_tags($book->book_price).'</td>'; ?>
      <?php print '<td><img src = "'.strip_tags($book->book_image).'" alt = "" width="50" hieght="80" </td>';?>


      <?php print '<td>';
        print '<a href= "'.strip_tags($book->book_file).'" title= "Download" class="btn btn-primary btn-sm">View</a>&nbsp';

        print '</td>'; 
      ?>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>


</div>
