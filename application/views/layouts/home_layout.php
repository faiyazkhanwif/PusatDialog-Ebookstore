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
    <link rel="stylesheet" type="text/css" href="resource/css/bootstrap.min.css">
    <!-- Font-awesome css -->
    <link rel="stylesheet" type="text/css" href="resource/css/all.css">
    <!-- My css -->
    <link rel="stylesheet" type="text/css" href="resource/css/style.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">

    <title>Pusat Dialog E-bookshop</title>
    <link rel="shortcut icon" type="image/png" href="resource/img/pdialogsmall.png">
</head>

<body>
    <!--========== Header Area ===========-->
    <header class="">
        <div class="header-top animate__animated animate__fadeInDown">
            <div class="container">
                <div class="row">
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
            <hr class="header-top-hr">
        </div>
        <div class="header-mid">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-3">
                        <div class="main-title">
                            <a href=""><span><img src="<?= base_url('resource/img//pdialogsmall.jpg'); ?>"> Pusat Dialog</span></a>
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
        <div class="">
            <?php $this->load->view('include/menu'); ?>
        </div>
        </div>
        <!--=== Success msg ===-->
        <?php
        if ($this->session->flashdata('login_success')) {
            print '<div class= "loginsuccess animate__animated animate__fadeIn animate__delay-1s">';
            print '<div class = "container">' . $this->session->flashdata('login_success') . '</div>';
            print '<div class="cross"><a href="" class="text-success"><i class="fas fa-times"></i></a></div>';
            print '</div>';
        }
        ?>
    </header>
    <main class="animate__animated animate__fadeIn">
        <!-- Carousel -->
        <div>
            <?php $this->load->view('include/carousel') ?>
        </div>
        <!-- Featured Books -->
        <div class="section-padding">
            <div class="container">
                <div class="section-title">
                    <h4>Featured Books</h4>
                </div>
                <div class="featuredbooks"><?php $this->load->view('bookviews/featuredbooks') ?></div>
            </div>
        </div>
    </main>
    <!--============ Footer Area ============-->
    <footer class="animate__animated animate__fadeIn">
        <?php $this->load->view('include/footer') ?>
    </footer>


    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="resource/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="resource/js/jquery-3.2.1.slim.min.js"></script>

</body>

</html>