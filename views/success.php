

   
<?php
$this->load->view('header/header');
?>
         <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Order Complete</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="#">Home</a></li>
                            <li>Order Success</li>
                        </ul>
                    </div><!-- .breadcrumbs -->
                </div>
            </div>
        </div>
        <img class="header-img" src="<?=base_url()?>front/images/news-bg.png" alt="">
    </header><!-- .site-header -->

    <div class="quality-services">
        <div class="container">
            <div class="row">
                <div class="col-12" align="center">
                    
                    <img  src="<?=base_url()?>front/images/thankyou.png" class="img-fluid" alt="Responsive image" >

                    <div class="row">
                        <div class="col-12">
                            <p style="text-align: center; ">That's all done for you.</p>
                            <p style="text-align: center; ">Have a minute? Help us share the message. Follow us on Twitter and Like us on Facebook to keep you up to date with all our news and announcements. </p>
                            <p style="text-align: center; ">If you need any assistance, please feel free to get in touch.</p>
                            <hr>
                        </div>
                    </div>
                    <div class="w-100 text-center mt-5">
                        <a class="button gradient-bg" href="<?=base_url()?>contact">Get In Touch</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


   <?php
$this->load->view('header/footer');
?>
