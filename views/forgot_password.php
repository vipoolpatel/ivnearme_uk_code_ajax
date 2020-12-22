<link rel="stylesheet" href="<?=base_url()?>front/css/style_for_login.css">
<?php
$this->load->view('header/header');
?>
          
      
    
        <img class="header-img" src="<?=base_url()?>front/images/service-bg2.png" alt=""> 
    </header><!-- .site-header -->

    <div class="quality-services-forgot">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Change Your Password</h2>                
                    
                </div>
            </div>
        </div>
    </div> 

            <div class="container">
        <div class="row">
            <div class="col-12">

<!-- --------------------------------------------------Fogot password banner--------------------------------------------------- -->   


    <div class="forgot_banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <form method="post" action="">
                        <p>Enter your registered e-mail. We will send recovery link soon on!</p>
                        <?php if ($this->session->flashdata('ERROR')) { ?>
                                        <div role="alert" class="alert alert-danger">
                                            <?= $this->session->flashdata('ERROR') ?>
                                        </div>
                                    <?php } ?>
                          
                                         <?php if ($this->session->flashdata('SUCCESS')) { ?>
                                        <div role="alert" class="alert alert-success">
                                            <?= $this->session->flashdata('SUCCESS') ?>
                                        </div>
                                    <?php } ?>
                        <input type="email" name="email" placeholder="E-mail address" required=""> 
                        <input class="button gradient-bg" type="submit" value="Send Me Recovery Link">
                    </form>
                </div>
            </div>
        </div>
    </div>


            </div>
        </div>
    </div>
<br><br>
   
   <?php
$this->load->view('header/footer');
?>
