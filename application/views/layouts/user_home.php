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
    <link rel="shortcut icon" type="image/png" href="<?= base_url('tool/img/pdialogsmall.png'); ?>">
</head>

<body>
    <!--============ Header area ===========-->
    <div class="header-area">
       <div class="hearder-top animate__animated animate__fadeInDown">
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
                                <?php foreach($logos as $logo):?>
                                    <div class="lname"><a href="<?= base_url() ?>home"><span><?php print '<img src = "'.strip_tags($logo->logoimg).'" alt = "">';?>     
                                    <?php foreach($names as $name): ?>

                                        <?php print $name->orgname;?>

                                        <?php endforeach; ?></span> </a></div>
                                    <?php endforeach;?>
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
                <!--============= Menu Area ============-->
                <div>
                    <?php $this->load->view('temp/menu'); ?>
                </div>
            </div>
            <!-- =============== single header ===========-->
            <div class="single-header-u">
                <div class="container">
                    <span><a href="<?= base_url()?>home"><i class="fas fa-home"></i> Home</a></span>
                </div>
            </div>
            <div class="user-menu-area">
                <div class="container">
                    <div class="user-menu">
                        <ul>
                            <li><a href="<?= base_url()?>user-home/myBooks">Borrowed Books</a></li>
                            <li><a href="<?= base_url()?>user-home/my-orders">Bought Books</a></li>
                            <li><a href="<?= base_url('user-home/edit-profile/'.$this->session->userdata('id').'')?>">Edit profile</a></li>
                            <li><a href="<?= base_url()?>users/logout"><i class="fas fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--=========== Content-area ==========-->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="min-height: 500px">
                        <?php $this->load->view($user_view); ?>
                    </div>
                </div>
            </div>



            <!--============ Footer Area ============-->
            <div>
                <?php $this->load->view('temp/footer'); ?>
            </div>