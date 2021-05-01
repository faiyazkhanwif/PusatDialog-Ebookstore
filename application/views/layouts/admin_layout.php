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

    <?php foreach($names as $name): ?>

        <title><?php print $name->orgname;?></title>

    <?php endforeach; ?>
    <?php foreach($logos as $logo):?>
        <link rel="shortcut icon" type="image/png" href="<?php print strip_tags($logo->logoimg)?>">
    <?php endforeach;?>
</head>

<body>
    <!--========== Header area ===========-->
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
                            <div class="col-md-6">
                                <div class="logo">
                                    <?php foreach($logos as $logo):?>
                                        <div class="lname"><a href="<?= base_url() ?>home"><span><?php print '<img src = "'.strip_tags($logo->logoimg).'" alt = "">';?>     
                                        <?php foreach($names as $name): ?>

                                            <?php print $name->orgname;?>

                                            <?php endforeach; ?></span> </a></div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-8">
                                <!--<a href="" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login</a>
                                    <a href="" class="btn-login"><i class="fas fa-user-cog"></i> Register</a>-->
                                </div>
                                <div class="col-md-4">
                                    <div class="ic-cart"><a href="<?= base_url()?>/cart"><i class="fas fa-shopping-cart"></i> Cart</a></div>
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
        </div>
        <!-- =========== single header ==========-->
        <div class="single-header-a">
            <div class="container">
                <span><a href="<?= base_url() ?>home"><i class="fas fa-home"></i> Home</a> / 
                    <a href="<?= base_url()?>admin">Admin Dashboard</a></span>
                </div>
            </div>
            <!--========== Content-area ==========-->
            <div class="admin-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2 col-sm-3 admin-nav">
                            <?php $this->load->view('admin/admin_nav'); ?>
                        </div>
                        <div class="col-md-10 col-sm-9">
                            <?php $this->load->view($admin_view); ?><br>

                            <!--============ Footer Area ============-->
                            <div>
                                <?php $this->load->view('temp/footer'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>