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
                    <h1>Change Password</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="<?=base_url()?>">Home</a></li>
                            <li>Change Password</li>
                        </ul>
                    </div><!-- .breadcrumbs -->
                </div>
            </div>
        </div>

        <img class="header-img" src="<?=base_url()?>front/images/news-bg.png" alt="">
    </header>
    <br><br>



 
 

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">



        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
         
            <!-- Amado Nav -->
                  <?php
                    $this->load->view('header/login_sidebar');
                    ?>

         
            <!-- Social Button -->
            
        </header>
        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->
<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                 
                <div class="checkout_details_area">
                    <form action="" method="post">
                <div class="row">
                   
                    <div class="col-12 col-lg-12">
                        <div class="mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Change Password</h2>
                            </div>

                          
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
                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <label>Old Password</label>
                                        <input type="password" class="form-control" name="old_password" id="first_name" value="" placeholder="" required>
                                        <div class="error"><?php echo form_error('old_password'); ?></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" name="new_password" id="last_name" value="" placeholder="" required>
                                        <div class="error"><?php echo form_error('new_password'); ?></div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password" id="company" placeholder="" value="" required>
                                        <div class="error"><?php echo form_error('confirm_password'); ?></div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <button style="float: right;cursor: pointer;margin-right: 0px;" type="submit" class="button gradient-bg">Update</button>
                                    </div>
                                    
                                   
                                </div>
                          
                        </div>
                    </div>
                </div>
                </form>
                </div>
               
            </div>
        </div>
    </div>
    <br><br>
<?php
$this->load->view('header/footer');
?>