
<?php
$this->load->view('header/header');
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Shopping Cart</h1>

            <div class="breadcrumbs">
                <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                    <li><a href="<?=base_url()?>">Home</a></li>
                    <li>Cart</li>
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
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2>Shopping Cart</h2>
                </div>

                <div class="cart-table clearfix">
                    <?php
                    if(!empty($this->cart->contents()))
                    { 
                    ?>
                    <form action="<?=base_url()?>home/update_cart" method="post">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($this->cart->contents() as $items) 
                            {
                                echo form_hidden('cart[' . $items['id'] . '][id]', $items['id']);
                                echo form_hidden('cart[' . $items['id'] . '][rowid]', $items['rowid']);
                                echo form_hidden('cart[' . $items['id'] . '][price]', $items['price']);
                                
                                
                                $getProduct  = $this->db->where('id',$items['id']);
                                $getProduct  = $this->db->get('product')->row();                                
                            ?>
                            <tr>
                                <td class="cart_product_img">
                                    <a href="<?=base_url()?>detail/<?=$items['id']?>"><img src="<?=base_url()?>img/product/<?=$getProduct->id?>/<?=$getProduct->product_image?>"></a>
                                </td>
                                <td class="cart_product_desc">
                                    <h5><?=$getProduct->title?></h5>
                                    <span>Price: &pound<?=$items['price']?></span>
                                </td>
                             
                                <td class="qty">
                                    <div class="qty-btn d-flex">
                                        <p>Qty</p>
                                        <div class="quantity">
                                            <span class="qty-minus" onclick="var effect = document.getElementById('qty<?=$getProduct->id?>'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                            <input type="number" readonly="" class="qty-text" id="qty<?=$getProduct->id?>" step="1" min="1" max="300" name="cart[<?=$items['id']?>][qty]" value="<?=$items['qty']?>">
                                            <span class="qty-plus" onclick="var effect = document.getElementById('qty<?=$getProduct->id?>'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </td>
                                  <td class="price">
                                    <span>&pound<?=$items['subtotal']?></span>
                                    <a href="<?= base_url().'home/remove_cart'?>/<?=$items['rowid']?>" style="color: red;font-size: 16px;float: right;"><i class="fa fa-trash" ></i></a>

                                </td>
                            </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                    <button style="float: right;cursor: pointer;" type="submit" class="button gradient-bg">Update Cart</button>
                    </form>
                <?php }
                else { ?>
                            Your shopping cart empty
               <?php }
                ?>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="cart-summary">
                    <h5>Cart Total</h5>
                    <ul class="summary-table">
                         <li><span>subtotal:</span> <span>&pound;<?=$this->cart->total()?></span></li>
                         <li><span>total:</span> <span>&pound;<?=$this->cart->total()?></span></li>
                    </ul>
                        <?php
                    if(!empty($this->cart->contents()))
                    { 
                    ?>
                    <div class="cart-btn mt-100">
                        <a href="<?=base_url('checkout')?>" class="button gradient-bg">Checkout</a>
                    </div>
                <?php }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->
<br><br>
<?php
$this->load->view('header/footer');
?>
