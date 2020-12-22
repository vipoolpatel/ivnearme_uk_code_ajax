
<?php
$this->load->view('header/header');
?>
 
    <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Shop</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="<?=base_url()?>front/#">Home</a></li>
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
<div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(<?=base_url()?>img/product/<?=$getProduct->id?>/<?=$getProduct->product_image?>);">
                                    </li>
                                </ol>
                                <div class="carousel-inner">

                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="<?=base_url()?>img/product/<?=$getProduct->id?>/<?=$getProduct->product_image?>">
                                            <img class="d-block w-100" src="<?=base_url()?>img/product/<?=$getProduct->id?>/<?=$getProduct->product_image?>" alt="First slide">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">  &pound;<?=$getProduct->price?></p>
                                
                                    <h2><?=$getProduct->title?></h2>
                                
                                
                                <!-- Avaiable -->
                                <!--<p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>-->
                            </div>

                            <div class="short_overview my-5">
                                <?=$getProduct->description?>
                            </div>

                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" action="<?=base_url()?>home/add_to_cart" method="post">

                                <input type="hidden" name="price" value="<?=$getProduct->price?>">
                                <input type="hidden" name="id" value="<?=$getProduct->id?>">

                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" readonly="" class="qty-text" id="qty" step="1" min="1" max="300" name="qty" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <button style="cursor: pointer;" type="submit" class="button gradient-bg">Add to cart</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    <!-- ##### Main Content Wrapper End ##### -->
    <br><br>


<?php
$this->load->view('header/footer');
?>
 <script src="<?=base_url()?>front/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?=base_url()?>front/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?=base_url()?>front/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="<?=base_url()?>front/js/plugins.js"></script>
    <!-- Active js -->
    <script src="<?=base_url()?>front/js/active.js"></script>