<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--==== CSS =====-->

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('resource/css/bootstrap.min.css'); ?>">
    <!-- Font-awesome css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('resource/css/all.css'); ?>">
    <!-- My css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('resource/css/style.css'); ?>">

    <title>Login</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('resource/img/pdialogsmall.png'); ?>">
</head>

<body>
    <!--============ Header area ===========-->
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="welcome-tx">Welcome to Pusat Dialog E-Book Shop!</div>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <div class="smallintroicons">
                                <a href="https://um.edu.my/" title="Universiti Malaya">Universiti Malaya</i></a>
                                <a class = "umlogo" href="https://um.edu.my/" title="Universiti Malaya"><img src="<?= base_url('resource/img/umsmall.png');?>"></i></a>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-top-hr">
            <hr>
        </div>
        <div class="header-mid">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-3">
                        <div class="main-title">
                            <a href="<?= base_url()?>home"><span><img src="<?= base_url('resource/img/pdialogsmall.jpg');?>"> Pusat Dialog</span></a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="search-field">
                            <input type="text" name="search_book" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <div class="col">
                        <div class="search-button">
                            <button class="btn btn-outline-info btn-rounded waves-effect" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="ic-cart">
                            <button class="btn btn-outline-info btn-lg btn-rounded waves-effect " type="submit"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>              
                </div>
            </div>
        </div>
        <!--========== Menu Area =========-->
        <div>
            <?php $this->load->view('include/menu'); ?>
        </div>
    </div>
</header>

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
                <li><a href="<?= base_url()?>user-home/sell-books">Sell Books</a></li>
                <li><a href="<?= base_url()?>user-home/myBooks">My books</a></li>
                <li><a href="<?= base_url()?>user-home/my-orders">My orders</a></li>
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
        <?php $this->load->view('include/footer'); ?>
    </div>
