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
    <script src="<?= base_url('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'); ?>"></script>
    <!--==== CSS =====-->

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('resource/css/bootstrap.min.css'); ?>">
    <!-- Font-awesome css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('resource/css/all.css'); ?>">
    <!-- My css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('resource/css/style.css'); ?>">

        <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <title>User</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('resource/img/pdialogsmall.png'); ?>">
</head>

<body>
    <!--=========== Header area =============-->
    <header> 
        <div class="header-top animate__animated animate__fadeInDown">
            <div class="container">
                <div class="row ">
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
            <hr>
        </div>
        <div class="header-top-hr">
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
        <!--========== Navbar Menu Area =========-->
        <div>
            <?php $this->load->view('include/menu'); ?>
        </div>
        </div>
    </header>
    <main>
        <!--============ Content-area ===========-->
        <div class="container animate__animated animate__fadeIn">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12" style="min-height: 500px">
                    <?php $this->load->view($user_view); ?>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <!--============== Footer Area ==============-->
        <div>
            <?php $this->load->view('include/footer'); ?>
        </div>
    </footer>

    <script type="text/javascript" src="<?= base_url('resource/js/jquery-3.2.1.slim.min.js'); ?>"></script>

    <!-- Latest compiled JavaScript -->
    <script src="<?= base_url('resource/js/bootstrap.min.js'); ?>"></script>
    <!-- Popper JS -->
    <script src="<?= base_url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'); ?>"></script>


</body>

</html>