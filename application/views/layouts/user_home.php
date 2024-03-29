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
    <!--============ Header area ===========-->
    <div class="header-area">
        <div class="header-top">
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


                                              <div class="admin-search">
                                                <?= form_open('Users/search', ['id'=>'user-search'])?>
                                                <input type="text" name="search_book" class="form-control" placeholder="Search for ebooks by ISBN, Title or Author">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                                <?= form_close()?>
                                            </div>

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

            <div class="user-menu-area">
                <div class="container">
                    <div class="user-menu">
                        <ul>
                            <li><a href="<?= base_url()?>User-home/boughtbooks">Bought Books</a></li>
                            <li><a href="<?= base_url()?>User-home/myreviews">My Reviews</a></li>
                            <li><a href="<?= base_url('User-home/edit-profile/')?>">Edit profile</a></li>
                            <li><a class="text-danger" href="<?= base_url()?>Users/logout"><i class="fas fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <br>
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