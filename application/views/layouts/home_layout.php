
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

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">

    <!-- My css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('tool/css/style.css'); ?>">
    
    <!-- jQuery min js -->
    <script type="text/javascript" src="<?= base_url('tool/js/jquery-3.2.1.slim.min.js'); ?>"></script>

    <title>Pusat-Dialog E-bookstore</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('tool/img/pdialogsmall.png'); ?>">
</head>

<body>
    <!--========== Header Area ===========-->
    <div class="header-area">
        <div class="hearder-top animate__animated animate__fadeInDown">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="welcome-tx">Welcome to Pusat-Dialog E-book Shop !</div>
                    </div>
                    <div class="col-md-6">
                        <div class="social-icon">
                            <a style="color: white;" href="https://um.edu.my/" title="Universiti Malaya">University of Malaya</i></a>
                            <a class="umlogo" href="https://um.edu.my/" title="Universiti Malaya"><img src="<?= base_url('tool/img/umsmall.png'); ?>"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-mid">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="logo">
                            <div class="lname"><a href="<?= base_url() ?>home"><span><img src="<?= base_url('tool/img/pdialogsmall.jpg')?>"> Pusat Dialog</span> </a></div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-9 text-center">
                                <?php if($this->session->userdata('logged_in') == FALSE): ?>

                                    <a href="<?= base_url()?>users/login" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login</a>
                                    <a href="<?= base_url()?>users/registration" class="btn-login"><i class="fas fa-user-cog"></i> Register</a>

                                    <?php else: ?>

                                      <div class="admin-search">
                                        <?= form_open('users/search', ['id'=>'user-search'])?>
                                        <input type="text" name="search_book" class="form-control" placeholder="Search any book">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                        <?= form_close()?>
                                    </div>


                                <?php endif; ?>
                            </div>
                            <div class="col-md-3">
                                <div class="ic-cart"><a href="<?= base_url()?>cart"><i class="fas fa-shopping-cart"></i> Cart</a></div>
                                <!--=== cart item count ===-->
                                <?php if($this->cart->contents()): ?>
                                    <div class="cart-count">
                                        <div><?php $rows = count($this->cart->contents());
                                        print $rows; ?></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--========== Menu Area =========-->
        <div>
            <?php $this->load->view('temp/menu'); ?>
        </div>
    </div>
    <!--=== Success msg ===-->
    <?php 
    if($this->session->flashdata('login_success'))
    {
        print '<div class= "success-msg">';
        print '<div class = "container">'.$this->session->flashdata('login_success').'</div>';
        print '<div class="cross"><a href="" class="text-success"><i class="fas fa-times"></i></a></div>';
        print '</div>';
    }
    ?>

    <!--============ Slider Area ===========-->
    <div>
        <?php $this->load->view('temp/slider'); ?>
    </div>
    <!--==== Recent Books ====-->
    <div class="section-padding after-slider">
        <div class="container">
            <div class="section-title"><a style="color: black; text-shadow: 2px 2px #7DAECC;" href="<?= base_url()?>users/all-books">Recently Added</a></div>
            <div><?php $this->load->view('temp/recent_books') ?></div> 
        </div>   
    </div>
    

    <!--============ Footer Area ============-->
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
