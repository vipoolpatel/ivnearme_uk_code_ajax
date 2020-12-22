<?php
$this->load->view('header/header');
?>
        <div class="swiper-container hero-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide hero-content-wrap" style="background-image: url('<?=base_url()?>front/images/hero size (2) Gradient.png')">
                    <div class="hero-content-overlay position-absolute w-100 h-100">
                        <div class="container h-100">
                            <div class="row h-100">
                                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-start">
                                    <header class="entry-header">
                                        <h1>IV Therapies</h1>
                                    </header><!-- .entry-header -->

                                    <div class="entry-content mt-4">
                                        <p>24/7 IV treatments. Wherever you are, let your IV come to you...</p>
                                    </div><!-- .entry-content -->

                                    <footer class="entry-footer d-flex flex-wrap align-items-center mt-4">
                                        <a href="#intro" class="button gradient-bg">Learn More</a>
                                    </footer><!-- .entry-footer -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div><!-- .container -->
                    </div><!-- .hero-content-overlay -->
                </div><!-- .hero-content-wrap -->

                <div class="swiper-slide hero-content-wrap" style="background-image: url('<?=base_url()?>front/images/hero size (1) Gradient.png')">
                    <div class="hero-content-overlay position-absolute w-100 h-100">
                        <div class="container h-100">
                            <div class="row h-100">
                                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-start">
                                    <header class="entry-header">
                                        <h1>IV Treatments</h1>
                                    </header><!-- .entry-header -->

                                    <div class="entry-content mt-4">
                                        <p>Excellent IV Treatments.</p>
                                    </div><!-- .entry-content -->

                                    <footer class="entry-footer d-flex flex-wrap align-items-center mt-4">
                                        <a href="#intro" class="button gradient-bg">Read More</a>
                                    </footer><!-- .entry-footer -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div><!-- .container -->
                    </div><!-- .hero-content-overlay -->
                </div><!-- .hero-content-wrap -->

                <div class="swiper-slide hero-content-wrap" style="background-image: url('<?=base_url()?>front/images/hero size (2) Gradient.png')">
                    <div class="hero-content-overlay position-absolute w-100 h-100">
                        <div class="container h-100">
                            <div class="row h-100">
                                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-start">
                                    <header class="entry-header">
                                        <h1>IV Vitamins</h1>
                                    </header><!-- .entry-header -->

                                    <div class="entry-content mt-4">
                                        <p>Energy boosts on the go.</p>
                                    </div><!-- .entry-content -->

                                    <footer class="entry-footer d-flex flex-wrap align-items-center mt-4">
                                        <a href="#intro" class="button gradient-bg">Read More</a>
                                    </footer><!-- .entry-footer -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div><!-- .container -->
                    </div><!-- .hero-content-overlay -->
                </div><!-- .hero-content-wrap -->
            </div><!-- .swiper-wrapper -->

            <div class="pagination-wrap position-absolute w-100">
                <div class="swiper-pagination d-flex flex-row flex-md-column"></div>
            </div><!-- .pagination-wrap -->
        </div><!-- .hero-slider -->
    </header><!-- .site-header -->

    <div class="homepage-boxes" id="intro">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="opening-hours">
                        <h2 class="d-flex align-items-center">Opening Hours</h2>

                        <ul class="p-0 m-0">
                            <li>Monday - Friday <span>10:00 - 18:00</span></li>
                            <li>Saturday <span>10:00 - 15:00</span></li>
                            <li>Sunday <span>By Appointment Only</span></li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                    <div class="emergency-box">
                        <h2 class="d-flex align-items-center">Emergency</h2>

                        <div class="call-btn button gradient-bg">
                            <a class="d-flex justify-content-center align-items-center" href="tel:02039517322"><img src="<?=base_url()?>front/images/emergency-call.png"> +442039517322</a>
                        </div>

                        <p>Call for Emergency</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 mt-5 mt-lg-0">
                    <div class="appointment-box">
                        <h2 class="d-flex align-items-center">Make an Appointment</h2>
<?php if ($this->session->flashdata('SUCCESS')) { ?>
                    <div role="alert" class="alert alert-success">
                        <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?=$this->config->item('Close')?></span></button>
                        <?= $this->session->flashdata('SUCCESS') ?>
                    </div>
                <?php } ?>
                        <form class="d-flex flex-wrap justify-content-between" action="<?=base_url()?>home/appointment_insert" method="POST">

                            <select class="select-department" name="department" required="">
                                <option>Customer Support</option>
                                <option>IV Treatments</option>
                                <option>Vitamins</option>
                            </select>

                            <select class="select-doctor" name="doctor" required="">
                                <option>Nurse Maria</option>
                                <option>Doctor Mohammed</option>
                                </select>

                            <input type="text" placeholder="Name" name="name" required="">

                            <input type="number" placeholder="Phone No" name="phone" required="">

                            <input class="button gradient-bg" name="submit" type="submit" value="Book Appoitnment">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="our-departments">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="our-departments-wrap">
                        <h2>Our Departments</h2>

                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="our-departments-cont">
                                    <header class="entry-header d-flex flex-wrap align-items-center">
                                        <img src="<?=base_url()?>front/images/cardiogram.png" alt="">

                                        <h3>IV Therapies</h3>
                                    </header>

                                    <div class="entry-content">
                                        <p>More information coming soon...</p>
                                    </div>

                                    <footer class="entry-footer">
                                        <!-- <a href="#">read more</a> -->
                                    </footer>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="our-departments-cont">
                                    <header class="entry-header d-flex flex-wrap align-items-center">
                                        <img src="<?=base_url()?>front/images/stomach-2.png" alt="">

                                        <h3>IV Treatments</h3>
                                    </header>

                                    <div class="entry-content">
                                        <p>More information coming soon...</p>
                                    </div>

                                    <footer class="entry-footer">
                                        <!-- <a href="#">read more</a> -->
                                    </footer>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="our-departments-cont">
                                    <header class="entry-header d-flex flex-wrap align-items-center">
                                        <img src="<?=base_url()?>front/images/blood-sample-2.png" alt="">

                                        <h3>IV Vitamins</h3>
                                    </header>

                                    <div class="entry-content">
                                        <p>Vitamin boosts on the go.</p>
                                    </div>

                                    <footer class="entry-footer"></footer>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Patient's Testimonials</h2>
                </div>
            </div>
        </div>

        <!-- Swiper -->
        <div class="testimonial-slider">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9">
                        <div class="testimonial-bg-shape">
                            <div class="swiper-container testimonial-slider-wrap">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="entry-content">
                                            <p>Happy Customer 1.</p>
                                        </div><!-- .entry-content -->

                                        <div class="entry-footer">
                                            <figure class="user-avatar">
                                                <img src="<?=base_url()?>front/images/user-1.jpg" alt="">
                                            </figure><!-- .user-avatar -->

                                            <h3 class="testimonial-user">Russell Stephens <span>University in UK</span></h3>
                                        </div><!-- .entry-footer -->
                                    </div><!-- .swiper-slide -->

                                    <div class="swiper-slide">
                                        <div class="entry-content">
                                            <p>Happy Customer 2</p>
                                        </div><!-- .entry-content -->

                                        <div class="entry-footer">
                                            <figure class="user-avatar">
                                                <img src="<?=base_url()?>front/images/user-2.jpg" alt="">
                                            </figure><!-- .user-avatar -->

                                            <h3 class="testimonial-user">Russell Stephens <span>University in UK</span></h3>
                                        </div><!-- .entry-footer -->
                                    </div><!-- .swiper-slide -->

                                    <div class="swiper-slide">
                                        <div class="entry-content">
                                            <p>Happy Customer 3.</p>
                                        </div><!-- .entry-content -->

                                        <div class="entry-footer">
                                            <figure class="user-avatar">
                                                <img src="<?=base_url()?>front/images/user-3.jpg" alt="">
                                            </figure><!-- .user-avatar -->

                                            <h3 class="testimonial-user">Russell Stephens <span>University in UK</span></h3>
                                        </div><!-- .entry-footer -->
                                    </div><!-- .swiper-slide -->

                                    <div class="swiper-slide">
                                        <div class="entry-content">
                                            <p>Happy Customer 4</p>
                                        </div><!-- .entry-content -->

                                        <div class="entry-footer">
                                            <figure class="user-avatar">
                                                <img src="<?=base_url()?>front/images/user-4.jpg" alt="">
                                            </figure><!-- .user-avatar -->

                                            <h3 class="testimonial-user">Russell Stephens <span>University in UK</span></h3>
                                        </div><!-- .entry-footer -->
                                    </div><!-- .swiper-slide -->
                                </div><!-- .swiper-wrapper -->

                                <div class="swiper-pagination-wrap">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="swiper-pagination position-relative flex justify-content-center align-items-center"></div>
                                            </div><!-- .col -->
                                        </div><!-- .row -->
                                    </div><!-- .container -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .testimonial-slider -->
    </section><!-- .testimonial-section -->

    <div class="the-news">
            <div class="container">
        <div class="row">
            <div class="col-12">
            	<h2>Services</h2>
                <div class="services-tabs">
                    <div class="tabs">
                        <ul class="tabs-nav d-flex flex-wrap">
                            <li class="tab-nav d-flex justify-content-center align-items-center" data-target="#tab_1">Service 1</li>
                            <li class="tab-nav d-flex justify-content-center align-items-center" data-target="#tab_2">Service 2</li>
                            <li class="tab-nav d-flex justify-content-center align-items-center" data-target="#tab_3">Service 3</li>
                            <!-- <li class="tab-nav d-flex justify-content-center align-items-center" data-target="#tab_4">CMauris tortor</li>
                            <li class="tab-nav d-flex justify-content-center align-items-center" data-target="#tab_5">Phasellus sit amet</li> -->
                        </ul>

                        <div class="tabs-container">
                            <div id="tab_1" class="tab-content">
                                <img src="<?=base_url()?>front/images/service-tab-img.png" alt="">

                                <h4>IV Treatments </h4>

                                <p>IV Treatments.</p>
                            </div>

                            <div id="tab_2" class="tab-content">
                                <img src="<?=base_url()?>front/images/service-tab-img.png" alt="">

                                <h4>IV Therapies </h4>

                                <p>IV Therapies.</p>
                            </div>

                            <div id="tab_3" class="tab-content">
                                <img src="<?=base_url()?>front/images/service-tab-img.png" alt="">

                                <h4>IV Vitamins </h4>

                                <p>IV Vitamins.</p>
                            </div>

                    

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('header/footer');
?>

  