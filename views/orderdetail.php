
<?php
$this->load->view('header/header');
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Order Detail</h1>

            <div class="breadcrumbs">
                <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                    <li><a href="<?=base_url()?>">Home</a></li>
                    <li>Order</li>
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
$this->load->view('header/login_sidebar');
?>

 
    <!-- Social Button -->
    
</header>
<!-- Header Area End -->

<!-- Product Catagories Area Start -->
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="cart-title mt-50">
                    <h2>Order Detail</h2>
                </div>

                <div class="cart-table clearfix">
                    <?php
                    if(!empty($getOrderDetail))
                    { 
                    ?>
                   
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
                            foreach ($getOrderDetail as $getProduct) 
                            {
                            ?>
                            <tr>
                                <td class="cart_product_img">
                                    <a href="<?=base_url()?>detail/<?=$getProduct->product_id?>"><img style="height: 150px;" src="<?=base_url()?>img/product/<?=$getProduct->product_id?>/<?=$getProduct->product_image?>"></a>
                                </td>
                                <td class="cart_product_desc">
                                    <h5><?=$getProduct->title?></h5>
                                    <hr />
                                    <?=$getProduct->description?>
                                    <hr />
                                    <p>Price: &pound<?=$getProduct->price?></p>
                                </td>
                                <td class="qty">
                                   <?=$getProduct->qty?>
                                </td>
                                  <td class="price">
                                    <span>&pound<?=$getProduct->subtotal?></span>
                                </td>
                            </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                 
                <?php }
                else { ?>
                           Item not found!
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
