<!--=== Success msg ===-->
<?php
if ($this->session->flashdata('success')) {
  print '<div class= "success-msg">' . $this->session->flashdata('success') . '</div>';
}
?>
<br>
<br>
<div class="row">
  <div class="col-lg-6">
    <div class="text-left">
      <h4 style="font-family: Trebuchet MS; font-weight: bold;">&nbsp&nbspAll users list</h4>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="text-right">
      <button style="font-family: Trebuchet MS" onclick="location.href='<?= base_url() ?>admin/add_users'" class="btn btn-dark">Add new user <i class="fas fa-plus-circle"></i></button>
    </div>
  </div>
</div>


<br>
<div class="container">

  <table class="table table-hover jumbotron shadow">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Contact</th>
        <th scope="col">Email</th>
        <th scope="col">Type</th>
        <th scope="col">Address</th>
        <th scope="col">City</th>
        <th scope="col">Remove</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($users_data as $udata) : ?>
        <tr scope="row">
        <?php print '<td>';
          print '<a href= "' . base_url() . 'admin/user_delete/' . $udata->id . '" title= "Delete" class="btn btn-outline-danger btn-sm delete" data-confirm = "Are you sure to delete this User?"><i class="fas fa-times"></i></a>';

          print '</td>';
          ?>
          <?php print '<td>' . htmlentities($udata->id) . '</td>'; ?>
          <?php print '<td class= "text-info">' . htmlentities($udata->name) . '</td>'; ?>
          <?php print '<td>' . htmlentities($udata->contact) . '</td>'; ?>
          <?php print '<td>' . htmlentities($udata->email) . '</td>'; ?>
          <?php print '<td>' . htmlentities($udata->type) . '</td>'; ?>
          <?php print '<td>' . substr(strip_tags($udata->address), 0, 80) . '</td>'; ?>
          <?php print '<td>' . htmlentities($udata->city) . '</td>'; ?>


        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>