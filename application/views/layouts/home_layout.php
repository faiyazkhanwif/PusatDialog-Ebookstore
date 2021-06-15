
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

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">

    <!-- My css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('tool/css/style.css'); ?>">

    <!-- jQuery min js -->
    <script type="text/javascript" src="<?= base_url('tool/js/jquery-3.2.1.slim.min.js'); ?>"></script>

    <?php foreach($names as $name): ?>

        <title><?php print $name->orgname;?></title>

    <?php endforeach; ?>


    <?php foreach($logos as $logo):?>
        <link rel="shortcut icon" type="image/png" href="<?php print strip_tags($logo->logoimg)?>">
    <?php endforeach;?>
</head>

<body>

    <!--========== Header Area ===========-->
    <div class="header-area">
        <div class="header-top animate__animated animate__fadeInDown">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="welcome-tx">Welcome to 
                            <?php foreach($names as $name): ?>

                                <?php print $name->orgname;?>

                                <?php endforeach; ?> E-book Shop !</div>
                            </div>
                            <div class="col-md-6">
                                <div class="social-icon">
                                    <a style="color: white;" href="https://um.edu.my" title="Universiti Malaya">University of Malaya</i></a>
                                    <a class="umlogo" href="https://um.edu.my/" title="Universiti Malaya"><img src="<?= base_url('tool/img/umsmall.png'); ?>"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="header-mid animate__animated animate__fadeInDown">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="logo animate__animated animate__headShake animate__delay-2s">
                                    <?php foreach($logos as $logo):?>
                                        <div class="lname"><a href="<?= base_url() ?>Home"><span><?php print '<img src = "'.strip_tags($logo->logoimg).'" alt = "">';?>     
                                        <?php foreach($names as $name): ?>

                                            <?php print $name->orgname;?>

                                            <?php endforeach; ?></span> </a></div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-9 text-center">


                                          <div class="admin-search">
                                            <?= form_open('Users/search', ['id'=>'user-search'])?>
                                            <input type="text" name="search_book" class="form-control" placeholder="Search for ebooks by ISBN, Title or Author">
                                            <button type="submit"><i class="fas fa-search"></i></button>
                                            <?= form_close()?>
                                        </div>



                                    </div>
                                    <div class="col-md-3">
                                        <div class="ic-cart"><a href="<?= base_url()?>Cart"><i class="fas fa-shopping-cart"></i> Cart</a></div>
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
                <div class="">
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
            <div class="animate__animated animate__fadeInRight">
                <?php $this->load->view('temp/carousel'); ?>
            </div>
            <br>
            <!--==== Recent Books ====-->
            <div class="animate__animated animate__slideInLeft section-padding after-slider">
                <div class="container">
                    <div class="section-title"><a style="color: black; text-shadow: 2px 2px #7DAECC;" href="<?= base_url()?>Users/all-books">Recently Added</a></div>
                    <div><?php $this->load->view('temp/recent_books') ?></div> 
                </div>   
            </div>


            <!--============ Footer Area ============-->
            <div class="footer-area-home animate__animated animate__fadeInDown">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="widget">
                                <div class="brand-name">
                                    <div class="lname"><a href=""><span><?php foreach($names as $name): ?>

                                    <?php print $name->orgname;?>

                                    <?php endforeach; ?> E-bookshop</span></a></div>
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
