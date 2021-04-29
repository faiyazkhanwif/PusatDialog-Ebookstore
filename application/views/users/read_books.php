
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
	<script type="text/javascript">
		document.addEventListener('contextmenu', event => event.preventDefault());
	</script>
	<script type="text/javascript">
		eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(3(){(3 a(){8{(3 b(2){7((\'\'+(2/2)).6!==1||2%5===0){(3(){}).9(\'4\')()}c{4}b(++2)})(0)}d(e){g(a,f)}})()})();',17,17,'||i|function|debugger|20|length|if|try|constructor|||else|catch||5000|setTimeout'.split('|'),0,{}));
		document.onkeydown=function(e){return 123!=e.keyCode&&((!e.ctrlKey||!e.shiftKey||e.keyCode!="I".charCodeAt(0))&&((!e.ctrlKey||!e.shiftKey||e.keyCode!="J".charCodeAt(0))&&((!e.ctrlKey||e.keyCode!="U".charCodeAt(0))&&((!e.ctrlKey||!e.shiftKey||e.keyCode!="C".charCodeAt(0))&&void 0))))};

	</script>


	<?php foreach($names as $name): ?>

		<title><?php print $name->orgname;?></title>

	<?php endforeach; ?>
	<?php foreach($logos as $logo):?>
		<link rel="shortcut icon" type="image/png" href="<?php print strip_tags($logo->logoimg)?>">
	<?php endforeach;?>
</head>





<body oncontextmenu="return false;">
	<div class="container">
		<?php 
		for($i=0;$i<100000;$i++){
		echo "<div></div>";
		} 
		?>
		<div class="text-center">
			<?php 
      //-- normal code without protection
        //print '<a href= "'.strip_tags($book->book_file).'" title= "Download" class="btn btn-primary btn-sm">View</a>&nbsp';
		//	print $book_detail;
		//print '<iframe id="iframe" src= "'.strip_tags($book_detail->book_file).'" width="100%" height="750" frameborder="0" sandbox="allow-scripts allow-same-origin"></iframe>';




      //-- Testing protection using google doc
			$link = str_replace("view","preview",$book_detail->book_file);
			$finallink = str_replace("drive","docs",$link);
			function ascii2hex($finallink) {
				$hex = '';
				for ($i = 0; $i < strlen($finallink); $i++) {
					$byte = strtoupper(dechex(ord($finallink[$i])));
					$byte = str_repeat('0', 2 - strlen($byte)).$byte;
					$hex.=$byte." ";
				}
				return $hex;
			}
			$hexlink = ascii2hex($finallink);
			$manipulated = str_replace(" ", "%", $hexlink);
			//print '<iframe id="iframe" src= "<script>unescape('.strip_tags($manipulated).')</script>&embedded=true" width="100%" height="750" frameborder="0" sandbox="allow-scripts allow-same-origin"></iframe>';
			?>
			<div style='position:relative;'>
				<div style='background-color: white; height: 54px; position: absolute; right: 11.5px; top:0px; width: 50px;z-index: 2147483647;'>
					 <?php foreach($logos as $logo):?>
					<span class="lname">
						<span><?php print '<img src = "'.strip_tags($logo->logoimg).'" alt = "">';?></span>
					</span>
					<?php endforeach;?>
			    </div>
				<?php
				print '<iframe id="iframe" security="restricted" src= "'.strip_tags($finallink).'&embedded=true" width="100%" height="750" frameborder="0" sandbox="allow-scripts allow-same-origin"></iframe>';


				?>
			</div>
		</div>

	</div>
	<?php 
		for($i=0;$i<100000;$i++){
	echo "<div></div>";
		} 
	?>
</body>