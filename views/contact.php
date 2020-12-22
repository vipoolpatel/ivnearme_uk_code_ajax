

   
<?php
$this->load->view('header/header');
?>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Contact</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="#">Home</a></li>
                            <li>Contact</li>
                        </ul>
                    </div><!-- .breadcrumbs -->

                </div>
            </div>
        </div>

        <img class="header-img" src="<?=base_url()?>front/images/contact-bg2.png" alt="">
    </header><!-- .site-header -->

    <div class="contact-page-short-boxes">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="contact-info h-100">
                        <h2 class="d-flex align-items-center">Contact Info</h2>

                        <ul class="p-0 m-0">
                            <li><span>Addtress:</span>Mitlton Str. 26-27 London UK</li>
                            <li><span>Phone:</span>+53 345 7953 32453</li>
                            <li><span>Email:</span>yourmail@gmail.com</li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-md-4 mt-5 mt-lg-0">
                    <div class="opening-hours h-100">
                        <h2 class="d-flex align-items-center">Opening Hours</h2>

                        <ul class="p-0 m-0">
                            <li>Monday - Thursday <span>8.00 - 19.00</span></li>
                            <li>Friday <span>8.00 - 18.30</span></li>
                            <li>Saturday <span>9.30 - 17.00</span></li>
                            <li>Sunday <span>9.30 - 15.00</span></li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-md-4 mt-5 mt-lg-0">
                    <div class="emergency-box h-100">
                        <h2 class="d-flex align-items-center">Emergency</h2>

                        <div class="call-btn text-center">
                            <a class="d-flex justify-content-center align-items-center button gradient-bg" href="#"><img src="<?=base_url()?>front/images/emergency-call.png"> +34 586 778 8892</a>
                        </div>

                        <p>Lorem ipsum dolor sit amet, cons ectetur adipiscing elit. Donec males uada lorem maximus mauris sceler isque, at rutrum nulla.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<form class="form-horizontal" action="<?=base_url()?>home/contact_insert" method="POST">
  
    <div class="contact-form">
        <div class="container">
            <?php if ($this->session->flashdata('SUCCESS')) { ?>
                    <div role="alert" class="alert alert-success">
                        <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?=$this->config->item('Close')?></span></button>
                        <?= $this->session->flashdata('SUCCESS') ?>
                    </div>
                <?php } ?>
            <div class="row">
                
 
                <div class="col-12">
                    <h2>Get in Touch</h2>
                </div>
                
                <div class="col-12  col-md-4">
                    <input type="text" placeholder="Name" name="name">
                </div><!-- col-4 -->

                <div class="col-12 col-md-4">
                    <input type="email" placeholder="E-mail" name="email">
                </div><!-- col-6 -->

                <div class="col-12 col-md-4">
                    <input type="text" placeholder="Subject" name="subject">
                </div>

                <div class="col-12">
                    <textarea name="message" rows="12" cols="80" placeholder="Message"></textarea>
                </div>

                <div class="col-12">
                     <button type="submit" name="submit" class="button gradient-bg">Send Message</button>
                    
                </div>
              
            </div><!-- row -->
        </div>
    </div><!-- contact-form -->
  </form>


<!-- foorer start -->


  <div class="subscribe-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <h2>Subscribe to our newsletter</h2>
                    <form method="post" id="SubmitSubscribe">
                        <input type="email" placeholder="E-mail address" id="clear-email" name="email" required="">
                        <input class="button gradient-bg" type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>


<div class="map-content">
    <div class="">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.1162657216605!2d72.81312421493595!3d21.227237685891197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f0be2c889c5%3A0x35c3ba3eb9fafee3!2sMaruti+Residency!5e0!3m2!1sen!2sin!4v1562478512142!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>


    <footer class="site-footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="foot-about">
                            <h2><a href="#"><img src="<?=base_url()?>front/images/logo.png" alt=""></a></h2>

                            <p>We believe that wherever you are, your IV should come to you. Our registered nurses are on handto deliver your therapy to you.</p>                           
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | IV Near Me LTD 
                        </div><!-- .foot-about -->
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-lg-4 mt-5 mt-md-0">
                        <div class="foot-contact">
                            <h2>Contact</h2>

                            <ul class="p-0 m-0">
                                <li><span>Address:</span>22-25 Portman Close London, W1H 6BS United Kingdom</li>
                                <li><span>Phone:</span>+442039517322</li>
                                <li><span>Email:</span>info@ivnearme.co.uk</li>
                            </ul>
                        </div>
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-lg-4 mt-5 mt-md-0">
                        <div class="foot-links">
                            <h2>Useful Links</h2>

                            <ul class="p-0 m-0">
                                <li><a href="<?=base_url()?>">Home</a></li>
                                <li><a href="<?=base_url()?>about">About us</a></li>
                                <li><a href="<?=base_url()?>login">Login</a></li>
                                <li><a href="<?=base_url()?>services">Services</a></li>
                                <li><a href="<?=base_url()?>shop">Shop</a></li>
                                <li><a href="<?=base_url()?>contact">Contact</a></li>
                            </ul>
                        </div><!-- .foot-links -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .footer-widgets -->
    </footer><!-- .site-footer -->

    <script type='text/javascript' src='<?=base_url()?>front/js/jquery.js'></script>
    <script type='text/javascript' src='<?=base_url()?>front/js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='<?=base_url()?>front/js/swiper.min.js'></script>
    <script type='text/javascript' src='<?=base_url()?>front/js/jquery.countdown.min.js'></script>
    <script type='text/javascript' src='<?=base_url()?>front/js/circle-progress.min.js'></script>
    <script type='text/javascript' src='<?=base_url()?>front/js/jquery.countTo.min.js'></script>
    <script type='text/javascript' src='<?=base_url()?>front/js/jquery.barfiller.js'></script>
    <script type='text/javascript' src='<?=base_url()?>front/js/custom.js'></script>
    
    <script type="text/javascript">
        (function($) {
            
            $('#SubmitSubscribe').submit(function(e){
                e.preventDefault();
                var formData = new FormData();
                var contact = $(this).serializeArray();
                $.each(contact, function (key, input) {
                        formData.append(input.name, input.value);
                });
                
                $.ajax({
                    type:'POST',
                    url:"<?=base_url();?>home/subscribe",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'JSON',
                    success:function(data){
                        $('#clear-email').val('');
                        alert('Email successfully subscribed!');
                        
                    }
        });
            });
            
        })(jQuery);
    </script>
        
</body>
</html>
<!-- foorer end -->