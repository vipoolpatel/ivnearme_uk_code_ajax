 <!DOCTYPE html>
<html lang="en">
<head>
    <title>IV Near Me | You can reach us on 02039517322</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shourtcut icon" type="image/png" href="<?=base_url()?>front/images/favicon.png">
    <link rel="stylesheet" href="<?=base_url()?>front/css/core-style.css"> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url()?>front/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="<?=base_url()?>front/css/swiper.min.css">
        <!-- shop -->

    <!-- contact -->
    
  

    <!-- Styles -->
    <link rel="stylesheet" href="<?=base_url()?>front/style.css">
    <script src="<?=base_url()?>front/<?=base_url()?>front/js/custom.js"></script>
</head>
<body class="<?=!empty($singlepage)?$singlepage:''?>">
    <header class="site-header">

        <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                        <div class="site-branding d-flex align-items-center">
                           <a class="d-block" href="<?=base_url()?>" rel="home"><img class="d-block" src="<?=base_url()?>front/images/logo.png" alt="logo"></a>
                        </div><!-- .site-branding -->

                        <nav class="site-navigation d-flex justify-content-end align-items-center">
                            <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-items-center">
                                <li class="<?php if ($this->uri->segment(1) == "") echo "current-menu-item";?>"><a href="<?=base_url()?>">Home</a></li>
                                <li class="<?php if ($this->uri->segment(1) == "about") echo "current-menu-item";?>"><a href="<?=base_url()?>about">About us</a></li>
                                <li class="<?php if ($this->uri->segment(1) == "services") echo "current-menu-item";?>"><a href="<?=base_url()?>services">Services</a></li>
                                <li class="<?php if ($this->uri->segment(1) == "shop") echo "current-menu-item";?>"><a href="<?=base_url()?>shop">Shop</a></li>
                                <li class="<?php if ($this->uri->segment(1) == "cart") echo "current-menu-item";?>"><a href="<?=base_url()?>cart">Cart <i class="fa fa-shopping-cart"></i></a></li>
                                <li class="<?php if ($this->uri->segment(1) == "contact") echo "current-menu-item";?>"><a href="<?=base_url()?>contact">Contact</a></li>
                                <?php
                                if(!empty($this->session->userdata('patient_logged_in')))
                                { ?>
                                <li class="<?php if ($this->uri->segment(1) == "account") echo "current-menu-item";?>"><a href="<?=base_url()?>account"><i class="fa fa-user"></i> <?=$this->session->userdata('patient_account_name')?></a></li>
                               <?php }
                                else
                                { ?>
                                    <li class="<?php if ($this->uri->segment(1) == "login") echo "current-menu-item";?>"><a href="<?=base_url()?>login">Login</a></li>
                               <?php }
                                ?>
                                

                                <li class="call-btn button gradient-bg mt-3 mt-md-0">
                                    <a class="d-flex justify-content-center align-items-center" href="tel:02039517322"><img src="<?=base_url()?>front/images/emergency-call.png"> 0203 951 7322</a>
                                </li>
                            </ul>
                        </nav><!-- .site-navigation -->

                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- .hamburger-menu -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .nav-bar -->
