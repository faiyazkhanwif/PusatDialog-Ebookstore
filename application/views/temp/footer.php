<div class="footer-area-home">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="widget">
                    <div class="brand-name">
                        <div class="logo">
                            
                                <div class="lname"><a href="<?= base_url() ?>home"><span>     
                                <?php foreach($names as $name): ?>

                                    <?php print $name->orgname;?>

                                    <?php endforeach; ?> E-bookshop</span> </a></div>
                                
                            </div>
                            <p><?php foreach($dscs as $dsc): ?>

                                    <?php print $dsc->footerdsc;?>

                                    <?php endforeach; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget">
                        <h3>Our Services</h3>

                        <ul>
                            <li><a href="<?= base_url('Users/all_books')?>">Buy E-Books</a></li>
                            <li><a href="<?= base_url()?>Users/showpromempromo">Read Books for Free <i class="fas fa-arrow-alt-circle-right"></i></a></li>
                            <li><a href="<?= base_url('Users/terms')?>">Terms and conditions</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#aboutModal">About Us</a></li>
                            <?php
                            #Load about model 
                            $this->load->view('temp/about_modal')
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget">
                        <div class="brand-name">
                            <div class="logo">
                                <?php foreach($logos as $logo):?>
                                <span class="lname">
                                    <span><a href="https://dialogue.um.edu.my"><?php print '<img src = "'.strip_tags($logo->logoimg).'" alt = "">';?> </a></span>
                                </span>
                                <?php endforeach;?>
                                <span><a href="https://um.edu.my"><img src="<?= base_url('tool/img/umbig.png'); ?>"></a></span>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="copy-right">
                <p><i class="fas fa-copyright"></i> 2021 faiyazkhanwif.inc. <br>All rights reserved</p>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="<?= base_url('tool/js/popper-1.12.9.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('tool/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('tool/js/all.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('tool/js/owl.carousel.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('tool/js/main.js'); ?>"></script>
</body>

</html>
