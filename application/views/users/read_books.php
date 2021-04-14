<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--==== CSS =====-->

	<!-- Bootstrap css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('tool/css/bootstrap.min.css'); ?>">
	<!-- Font-awesome css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('tool/css/all.css'); ?>">
	<!-- Owl-carousel css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('tool/css/owl.carousel.min.css'); ?>">
	<!-- My css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('tool/css/style.css'); ?>">

	<!-- jQuery min js -->
	<script type="text/javascript" src="<?= base_url('tool/js/jquery-3.2.1.slim.min.js'); ?>"></script>

	<title>Pusat Dialog E-Bookstore</title>
	<?php foreach($logos as $logo):?>
		<link rel="shortcut icon" type="image/png" href="<?php print strip_tags($logo->logoimg)?>">
	<?php endforeach;?>
</head>
<body>
	<div class="container">
		<div class="text-center">
			<?php 
      //-- normal code without protection
        //print '<a href= "'.strip_tags($book->book_file).'" title= "Download" class="btn btn-primary btn-sm">View</a>&nbsp';

      //-- Testing protection using google doc
			$link = str_replace("view","preview","https://drive.google.com/file/d/1lwO_tNwDYzCwdQa8uUWCtcNKr667HIPJ/view?usp=sharing&embedded=true");
			$finallink = str_replace("drive","docs",$link);
			print '<iframe id="iframe" src= "'.strip_tags($finallink).'" width="100%" height="800" frameborder="0" sandbox="allow-scripts allow-same-origin"></iframe>';

			?>
		</div>

	</div>
</body>