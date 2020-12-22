<link rel="stylesheet" href="<?= base_url() ?>front/css/style_for_login.css">
<?php
$this->load->view('header/header');
?>
<style>
    .error p{
        color: red;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Account</h1>

            <div class="breadcrumbs">
                <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                    <li><a href="#">Home</a></li>
                    <li>Account</li>
                </ul>
            </div>
        </div>
    </div>
</div> 

<img class="header-img" src="<?= base_url() ?>front/images/service-bg2.png" alt=""> 

</header><!-- .site-header -->

<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="services-tabs">
                <div class="tabs">
                    <ul class="tabs-nav d-flex flex-wrap">
                        <li class="tab-nav d-flex justify-content-center align-items-center" data-target="#tab_1">Login</li>
                        <li class="tab-nav d-flex justify-content-center align-items-center clickRegister" data-target="#tab_2">Register</li>

                    </ul>

                    <div class="tabs-container">
                        <div id="tab_1" class="tab-content">

                            <div class="col-6">
                                <div class="appointment-box">
                                    <h2 class="d-flex align-items-center">Login Now</h2>
                                    
                        <?php if (validation_errors()) { ?>
                                    <br />
                            <div class="alert alert-danger alert-dismissable">
                                    <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?> 
                                    
                                    
                                        <?php if ($this->session->flashdata('SUCCESS')) { ?>
                                    <br />
                                        <div role="alert" class="alert alert-success">
                                            <?= $this->session->flashdata('SUCCESS') ?>
                                        </div>
                                    <?php } ?>
                                    
                                    <form  method="post" action="">
                                                
                                        <input type="email" name="email" required="" placeholder="E-mail">

                                        <input type="password" name="password" required="" placeholder="Password">

                                        <p><a href="<?= base_url(); ?>forgot_password">Forgot Password?</a></p>

                                        <input class="button gradient-bg" type="submit" value="Login">
                                    </form>

                                </div>

                            </div>


                        </div>

                        <div id="tab_2" class="tab-content ">

                            <div class="col-6">
                                <div class="appointment-box">
                                    <h2 class="d-flex align-items-center">Register Now</h2>
                                    <form action="<?=base_url()?>login/register" method="post">
                                        <input type="text" placeholder="First Name" name="name" required="" value="<?= set_value('name'); ?>" style="width: 100%;">
                                        <div class="error"><?php echo form_error('name'); ?></div>
                                        <input type="text" placeholder="Last Name" name="lastname" value="<?= set_value('lastname'); ?>" style="width: 100%;">
                                        <div class="error"><?php echo form_error('lastname'); ?></div>
                                        <input type="email" placeholder="Email" name="email" value="<?= set_value('email'); ?>" style="width: 100%;">
                                        <div class="error"><?php echo form_error('email'); ?></div>
                                        <input type="password" placeholder="Password" name="password"  value="<?= set_value('password'); ?>" style="width: 100%;">
                                        <div class="error"><?php echo form_error('password'); ?></div>
                                        
<!--                                        <p><input type="checkbox" class="checkbox"> 
                                            I Agree Terms & Conditions</p>-->
                                        <input class="button gradient-bg" type="submit" value="Register">
                                    </form>
                                </div>

                            </div>
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
<?php
if(!empty($active))
{
?>
<script type="text/javascript">
     (function($) {
         $(document).ready(function(){
             $('.clickRegister').click();
         });
       })(jQuery);
</script>
<?php }
?>
  
