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
                    <h1>Shop</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="#">Home</a></li>
                            <li>Shop</li>
                        </ul>
                    </div><!-- .breadcrumbs -->
                </div>
            </div>
        </div>

        <img class="header-img" src="<?=base_url()?>front/images/news-bg.png" alt="">
    </header><!-- .site-header -->
    <br><br>



       <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="<?=base_url()?>front/img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

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
                    $this->load->view('header/sidebar');
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
                   
                    <div class="col-12 col-lg-8">
                        <div class="mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Checkout</h2>
                            </div>

                          
                                    <?php if ($this->session->flashdata('ERROR')) { ?>
                                        <div role="alert" class="alert alert-danger">
                                            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?=$this->config->item('Close')?></span></button>
                                            <?= $this->session->flashdata('ERROR') ?>
                                        </div>
                                    <?php } ?>
                          
                                         <?php if ($this->session->flashdata('SUCCESS')) { ?>
                                        <div role="alert" class="alert alert-success">
                                            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?=$this->config->item('Close')?></span></button>
                                            <?= $this->session->flashdata('SUCCESS') ?>
                                        </div>
                                    <?php } ?>
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="name" id="first_name" value="<?= set_value('name',!empty($patient->name)?$patient->name:''); ?>" placeholder="First Name" required>
                                        <div class="error"><?php echo form_error('name'); ?></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="lname" id="last_name" value="<?= set_value('lname',!empty($patient->lname)?$patient->lname:''); ?>" placeholder="Last Name" required>
                                        <div class="error"><?php echo form_error('lname'); ?></div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="company" id="company" placeholder="Company Name" value="<?= set_value('company',!empty($patient->company)?$patient->company:''); ?>" >
                                        <div class="error"><?php echo form_error('company'); ?></div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" <?=!empty($patient->email)?'readonly':''?> name="email" id="email" placeholder="Email" value="<?= set_value('email',!empty($patient->email)?$patient->email:''); ?>" required>
                                        <div class="error"><?php echo form_error('email'); ?></div>
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" name="street_address" id="street_address" placeholder="Address" value="<?= set_value('street_address',!empty($patient->street_address)?$patient->street_address:''); ?>" required>
                                        <div class="error"><?php echo form_error('street_address'); ?></div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?= set_value('country',!empty($patient->country)?$patient->country:''); ?>" required>
                                        <div class="error"><?php echo form_error('country'); ?></div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <input type="text" class="form-control" name="city" id="city" placeholder="Town" value="<?= set_value('city',!empty($patient->city)?$patient->city:''); ?>" required>
                                        <div class="error"><?php echo form_error('city'); ?></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="zipcode" id="zipCode" placeholder="Post Code" value="<?= set_value('zipcode',!empty($patient->zipcode)?$patient->zipcode:''); ?>" required>
                                        <div class="error"><?php echo form_error('zipcode'); ?></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="phone" id="phone_number" placeholder="Phone Number" value="<?= set_value('phone',!empty($patient->phone)?$patient->phone:''); ?>" required>
                                        <div class="error"><?php echo form_error('phone'); ?></div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" name="comment" id="comment" cols="30" rows="10" placeholder="Leave a comment about your order"><?= set_value('comment',!empty($patient->comment)?$patient->comment:''); ?></textarea>
                                        <div class="error"><?php echo form_error('comment'); ?></div>
                                    </div>
                                </div>
                          
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>&pound;<?=$this->cart->total()?></span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li>
                                    <span style="width:100%;"><input placeholder="Company Code" type="text" name="company_code" class="form-control" id="getDiscountCode" style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;height: 39px;"></span>
                                    <span><button type="button" id="" class="btn btn-primary ApplyDiscount">Apply</button></span>
                                </li>
                                <li><span>total:</span> <span id="">&pound;<?=$this->cart->total()?></span></li>
                            </ul>

                            <div class="payment-method">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="radio"  name="payment_type" required="" class="custom-control-input" value="cash" id="cod" checked="" >
                                    <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="radio" name="payment_type" required="" class="custom-control-input" value="paypal" id="paypal" >
                                    <label class="custom-control-label" for="paypal">Paypal <img class="ml-15" src="<?=base_url()?>front/images/paypal.png" alt=""></label>
                                </div>
                            </div>

                            <div class="cart-btn mt-100">
                                <button type="submit" style="cursor: pointer;" name="submit" class="button gradient-bg">Checkout</button>
                                
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

<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('.ApplyDiscount').click(function(){
        var discount = jQuery('#getDiscountCode').val();
        var price = jQuery(this).attr('id');
        if(discount != '')
        {
            jQuery.ajax({
                type:'POST',
                url:"<?=base_url()?>home/getDiscountCode",
                data: {discount: discount,price: price},
                dataType: 'JSON',
                success:function(data){
                    if(data.company_price != ""){
                        jQuery('#company_type').val(data.company_type);
                        jQuery('#company_price').val(data.company_price);
                        jQuery('#totaldiscountamount').val(data.totaldiscountamount);
                        jQuery('#payable_price').val(data.payaple_price);
                        jQuery('#getAmountPay').html('&pound;'+data.payaple_price);
                        jQuery('#getDiscountCode').prop('readonly',true);
                        jQuery('.ApplyDiscount').html('Applied');
                        jQuery('.ApplyDiscount').prop('disabled',true);
                    }
                    else{
                        jQuery('#company_type').val('');
                        jQuery('#company_price').val('');
                        jQuery('#totaldiscountamount').val('');
                        jQuery('#getAmountPay').html('&pound;'+data.payaple_price);
                        alert('Company code invalid')
                    }
                }
            });
        }else{
            alert('Enter Company Code.');
        }
    })
  });
</script>