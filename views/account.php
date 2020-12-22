<?php
$this->load->view('header/header');
?>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>My Profile</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="<?=base_url()?>">Home</a></li>
                            <li>My Profile</li>
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
                                <h2>My Profile</h2>
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

                                    <div class="col-md-6 mb-3">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="name" id="first_name" value="<?=$patient->name?>" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="lname" id="last_name" value="<?=$patient->lname?>" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label>Company</label>
                                        <input type="text" class="form-control" name="company" id="company" placeholder="Company Name" value="<?=$patient->company?>" >
                                    </div>
                                    
                                    <div class="col-6 mb-3">
                                        <label>Email</label>
                                        <input type="email" readonly="" class="form-control" name="email" id="email" placeholder="Email" value="<?=$patient->email?>" required>
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <label>Address</label>
                                        <input type="text" class="form-control mb-3" name="street_address" id="street_address" placeholder="Address" value="<?=$patient->street_address?>" >
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label>Country</label>
                                        <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?=$patient->country?>" >
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label>Town</label>
                                        <input type="text" class="form-control" name="city" id="city" placeholder="Town" value="<?=$patient->city?>" >
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Post Code</label>
                                        <input type="text" class="form-control" name="zipcode" id="zipCode" placeholder="Post Code" value="<?=$patient->zipcode?>" >
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone_number" placeholder="Phone Number" value="<?=$patient->phone?>" >
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label>Comment</label>
                                        <textarea name="comment" class="form-control w-100" name="comment" id="comment" cols="30" rows="10" placeholder="Leave a comment about your order"><?=$patient->comment?></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button style="float: right;cursor: pointer;margin-right: 0px;" type="submit" class="button gradient-bg">Save</button>
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