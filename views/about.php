
<?php
$this->load->view('header/header');
?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>About us</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="<?=base_url()?>front/#">Home</a></li>
                            <li>About Us</li>
                        </ul>
                    </div><!-- .breadcrumbs -->

                </div>
            </div>
        </div>

        <img class="header-img" src="<?=base_url()?>front/images/about-bg2.png" alt="">
    </header><!-- .site-header -->

    <div class="med-history">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-lg-6">
                    <h2>IVNearMe</h2>
                     <h4>Our Approach</h4>
                    <p>You could also call this heading "Our philosophy" or "Our vision." This is the place to talk about what drives you and your business and what's unique about your process. What you write here should be something distinct and interesting about your business that sets it apart from others in the same industry. </p>
                    <br>
                    <h4>Our Story</h4>
                    <p>Every business has a beginning, and this is where you talk about yours. People want to know what opportunity you saw or how your passion led to the creation of something new. Talk about your roots--people wanna know you have some. </p>

                    <a class="d-inline-block button gradient-bg" href="<?=base_url()?>front/#faq">Read More</a>
                </div>

                <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                    <img class="responsive" src="<?=base_url()?>front/images/about.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="faq-stuff">
        <div class="container" id="faq">
            <div class="row">
                <div class="col-12">
                    <h2>Faq & Stuff</h2>
                </div>

                <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                    <div class="accordion-wrap type-accordion">
                        <h3 class="entry-title d-flex justify-content-between align-items-center active">FAQ 1<span class="arrow-r"></span></h3>

                        <div class="entry-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris.</p>
                        </div>

                        <h3 class="entry-title d-flex justify-content-between align-items-center">FAQ 2 <span class="arrow-r"></span></h3>

                        <div class="entry-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris.</p>
                        </div>

                        <h3 class="entry-title d-flex justify-content-between align-items-center">FAQ 3<span class="arrow-r"></span></h3>

                        <div class="entry-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="professional-box">
                                <h2 class="d-flex align-items-center">Professional</h2>

                                <img src="<?=base_url()?>front/images/cardiogram-2.png" alt="">

                                <p>Lorem ipsum dolor sit amet, cons ectetur adipiscing elit. Donec males uada lorem.</p>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="quality-box">
                                <h2 class="d-flex align-items-center">Quality</h2>

                                <img src="<?=base_url()?>front/images/hospital.png" alt="">

                                <p>Lorem ipsum dolor sit amet, cons ectetur adipiscing elit. Donec males uada lorem.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="medical-team">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Meet Our Team</h2>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="medical-team-wrap">
                        <img src="<?=base_url()?>front/images/about-us-headshot-1-square.jpg" alt="">

                        <h4>Regan McCook</h4>
                        <h5>Founder & CEO</h5>
                        <p>Include a short bio with an interesting fact about the person.</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                    <div class="medical-team-wrap">
                        <img src="<?=base_url()?>front/images/about-us-headshot-2-square.jpg" alt="">

                        <h4>Eric Teagan</h4>
                        <h5>Vice President</h5>
                        <p>Include a short bio with an interesting fact about the person.</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                    <div class="medical-team-wrap">
                        <img src="<?=base_url()?>front/images/about-us-headshot-3-square.jpg" alt="">

                        <h4>Timothy Barrett</h4>
                        <h5>CFO</h5>
                        <p>Include a short bio with an interesting fact about the person.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

   <?php
$this->load->view('header/footer');
?>
