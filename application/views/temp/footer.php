<div class="footer-area-home">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="widget">
                        <div class="brand-name">
                            <div class="lname"><a href=""><span>Pusat Dialog E-bookshop</span></a></div>
                            <p>This e-book shop is operated by Pusat Dialog for publishing their own content. No third part vendors are affliated with this e-book store other than Pusat Dialog, University of Malaya.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget">
                        <h3>Our Services</h3>

                        <ul>
                            <li><a href="<?= base_url('users/all_books')?>">Buy E-Books</a></li>
                            <li><a href="<?= base_url('users/all_ebooks')?>">Borrow E-books</a></li>
                            <li><a href="<?= base_url('users/terms')?>">Terms and conditions</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#aboutModal">About Us</a></li>
                            <?php
                            #Load about model 
                            $this->load->view('temp/about_modal')
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget">
                        <div id="">
                            <span><a href="https://um.edu.my"><img src="<?= base_url('tool/img/pdialogsmall.png'); ?>"></a></span>
                            <span><a href="https://um.edu.my"><img src="<?= base_url('tool/img/umbig.png'); ?>"></a></span>
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
