<?php
defined('BASEPATH') or exit('No direct script access allowed');
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

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <title>Admin Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('resource/img/pdialogsmall.png'); ?>">
</head>

<body>
    <!--========== Header area ===========-->
    <header class="">
        <div class="header-top animate__animated animate__fadeInDown">
            <div class="container">
                <div class="row header-top ">
                    <div class="col-md-6">
                        <div class="welcome-tx">Welcome to Pusat Dialog E-Book Shop!</div>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <div class="smallintroicons">
                                <a href="https://um.edu.my/" title="Universiti Malaya">Universiti Malaya</i></a>
                                <a class="umlogo" href="https://um.edu.my/" title="Universiti Malaya"><img src="<?= base_url('resource/img/umsmall.png'); ?>"></i></a>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-top-hr animate__animated animate__fadeInDown">
            <hr>
        </div>
        <div class="header-mid">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-3">
                        <div class="main-title">
                            <a href="<?= base_url() ?>home"><span><img src="<?= base_url('resource/img/pdialogsmall.jpg'); ?>"> Pusat Dialog</span></a>
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
        <!-- Custom navbar for admin dashboard -->
        <div class="navbar_area">
            <div class="mainnavbar">
                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #E2F0F9;">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="container">
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                <li class="nav-item" style="margin-right: 10px;">
                                    <a class="nav-link" href="<?= base_url() ?>home"><i class="fas fa-home"></i> Home</a>
                                </li>
                                <li class="nav-item" style="margin-right: 10px;">
                                    <a class="nav-link" href="#"><i class="fas fa-book"></i> Manage E-Books</a>
                                </li>
                                <li class="nav-item" style="margin-right: 10px;">
                                    <a class="nav-link" href="#"><i class="far fa-list-alt"></i> Manage Categories</a>
                                </li>
                                <li class="nav-item" style="margin-right: 10px;">
                                    <a class="nav-link" href="<?= base_url() ?>admin/allusers"><i class="fas fa-users"></i> Manage Users</a>
                                </li>
                                <li class="nav-item" style="margin-right: 10px;">
                                    <a class="nav-link" href="#"><i class="fas fa-cart-arrow-down"></i> Manage Orders</a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                                <?php if ($this->session->userdata('logged_in') == FALSE) : ?>
                                    <button class="btn btn-outline-info mr-sm-2" onclick="location.href='<?= base_url() ?>users/login'" type="button">Login</button>
                                    <button class="btn btn-outline-info my-2 my-sm-0" onclick="location.href='<?= base_url() ?>users/registration'" type="button">Sign Up</button>
                                <?php else : ?>
                                    <!-- #For admin button  -->
                                    <?php if ($this->session->userdata('type') == 'A') : ?>
                                        <button class="btn btn-outline-info mr-sm-2" onclick="location.href='<?= base_url() ?>admin'" type="button"> Admin Dashboard</button>
                                    <?php endif; ?>
                                    <!-- #For user account button  -->
                                    <?php $type = $this->session->userdata('type') ?>
                                    <?php if ($type == 'U') : ?>
                                        <button class="btn btn-outline-info mr-sm-2" onclick="location.href='<?= base_url() ?>user-home'" type="button">My account</button>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <main class="animate__animated animate__fadeIn">
        <div class="container ">
            <div class="section-padding">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="user-heading ">
                            <h4 class="">Welcome, <span class="" style="color: #004477"><?php print $this->session->userdata('name') ?>!</span></h4>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <img style="height: 120px; width: 120px;" src="<?= base_url('resource/img/admintone.png'); ?>">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <?php $this->load->view($admin_view); ?><br>
                    </div>
                    <div class="col-lg-2">
                        <div style="text-align: right;">
                            <a class="btn btn-danger" href="<?= base_url() ?>users/logout"><i class="fas fa-power-off"></i> Logout</a></li>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <img style="height: 100px; width: 100px;" src="<?= base_url('resource/img/adminttwo.png'); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="animate__animated animate__fadeIn">
            <?php $this->load->view('include/footer'); ?>
        </div>
    </footer>
    <!-- Popper JS -->
    <script type="text/javascript" src="<?= base_url('resource/js/jquery-3.2.1.slim.min.js'); ?>"></script>

    <!-- Latest compiled JavaScript -->
    <script src="<?= base_url('resource/js/bootstrap.min.js'); ?>"></script>
    <!-- Popper JS -->
    <script src="<?= base_url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'); ?>"></script>
</body>
</html>