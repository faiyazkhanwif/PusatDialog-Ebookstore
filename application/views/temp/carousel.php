<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img style = "-webkit-filter: brightness(50%);" class="d-block w-100" src="<?= base_url('tool/img/researchslide.jpg" alt="First slide'); ?>">
      <div class="carousel-caption d-none d-md-block">
       <h2 style="color: white;"><?php foreach($names as $name): ?>

                            <?php print $name->orgname;?>

                            <?php endforeach; ?> provides your favourite E-Books</h2>
       <p><i class="fas fa-quote-left fq"></i> I must say I find television very educational. The minute somebody turns it on, I go to the library and read a good book.</p>
       <i>- Groucho Marx</i>
       <div><a href="<?= base_url()?>users/all_books" class="btn-buy btn btn-sm">Explore <i class="fas fa-arrow-circle-right"></i></a></div>
       <br>
     </div>
   </div>
   <div class="carousel-item">
    <img style = "-webkit-filter: brightness(50%);" class="d-block w-100" src="<?= base_url('tool/img/lawslide.jpg" alt="Second slide'); ?>">
    <div class="carousel-caption d-none d-md-block">
      <h2 style="color: white;">Read your favourite books for free!</h2>
      <p><i class="fas fa-quote-left fq"></i> Keep reading books, but remember that a book is only a book, and you should learn to think for yourself.</p>
      <i>– Maxim Gorky</i>
      <div><a href="<?= base_url()?>users/showpromempromo" class="btn-buy">Pro Membership <i class="fas fa-arrow-circle-right"></i></a></div>
      <br>
    </div>
  </div>
  <div class="carousel-item">
    <img style = "-webkit-filter: brightness(50%);" class="d-block w-100" src="<?= base_url('tool/img/borrowbook.jpg'); ?>" alt="Third slide">
    <div class="carousel-caption d-none d-md-block">
      <h2 style="color: white;"><?php foreach($names as $name): ?>

                            <?php print $name->orgname;?>

                            <?php endforeach; ?> offers variety of E-books of different genres</h2>
     <p><i class="fas fa-quote-left fq"></i> Whenever you read a good book, somewhere in the world a door opens to allow in more light.</p>
     <i>– Vera Nazarian</i>
     <div><a href="<?= base_url()?>users/all_books" class="btn-buy">Buy now <i class="fas fa-arrow-circle-right"></i></a></div>
     <br>
   </div>
 </div>
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>