
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
    <link rel="stylesheet" type="text/css" href="resource/css/bootstrap.min.css">
    <!-- Font-awesome css -->
    <link rel="stylesheet" type="text/css" href="resource/css/all.css">
    <!-- My css -->
    <link rel="stylesheet" type="text/css" href="resource/css/style.css">

    <title>Pusat Dialog E-bookshop</title>
    <link rel="shortcut icon" type="image/png" href="resource/img/pdialogsmall.png">
</head>

<body>
<!--========== Header Area ===========-->
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
                            <a href=""><span><img src="<?= base_url('resource/img//pdialogsmall.jpg');?>"> Pusat Dialog</span></a>
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
</header>
<!--============ Slider Area ===========-->
<div>
    <?php $this->load->view('temp/slider'); ?>
</div>
<!--==== Recent Books ====-->
<div class="section-padding after-slider">
    <div class="container">
        <div class="section-title"><a href="<?= base_url()?>users/all-books">recent Books</a></div>
        <div><?php $this->load->view('temp/recent_books') ?></div> 
    </div>   
</div>
<!--==== CSE Books ====-->
<div class="section-padding">
    <div class="container">
        <div class="section-title"><a href="<?= base_url()?>users/all-books/?ctg=CSE">Computer science and engineering Books</a></div>
        <div><?php $this->load->view('temp/cse_books') ?></div> 
    </div>   
</div>

<!--============ Footer Area ============-->
<div class="footer-area-home">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="widget">
                    <div class="brand-name">
                        <div class="lname"><a href=""><span>Bookshop</span></a></div>
                        <p>This is a online books market place, it allows you to sell & buy your favourite books. You can also find here different types of e-books, which you can download for free.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget">
                    <h3>Our Services</h3>

                    <ul>
                        <li><a href="<?= base_url('users/all_books')?>">Buy Books</a></li>
                        <li><a href="<?= base_url('users/all_ebooks')?>">Find E-books</a></li>
                        <li><a href="<?= base_url('user_home/sell_books')?>">Sell your books</a></li>
                        <li><a href="<?= base_url('users/terms')?>">Terms and conditions</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget">
                    <h3>Stay connected</h3>
                    <p>Communication is very much important for building good customer relationship. You can connected with us through the social media. If you have any types of quiries fell free to ask. You are always welcome.</p>
                    <div id="social-icon">
                        <span><a href="https://www.facebook.com/iamTahmid.ni7" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></span>
                        <span><a href="https://github.com/tahmid-ni7" title="Github" target="_blank"><i class="fab fa-github"></i></a></span>
                        <span><a href="https://www.instagram.com/tahmid_ni7/" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <p><i class="fas fa-copyright"></i> 2019 Tahmid Nishat, Inc. <br>All right reserved</p>
        </div>
    </div>
</div>


    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="resource/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="resource/js/jquery-3.2.1.slim.min.js"></script>

</body>

</html>
