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