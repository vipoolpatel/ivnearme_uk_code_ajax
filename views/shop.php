

   
<?php
$this->load->view('header/header');
?>

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
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                <?php
foreach($getProduct as $value) {
                ?>
                <div class="single-products-catagory clearfix">

                    <a href="<?= base_url('detail/'.$value->id);?>">
                        <img src="<?=base_url()?>img/product/<?=$value->id?>/<?=$value->product_image?>" alt="<?=$value->title?>">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From  &pound;<?=$value->price?></p>
                            <h4><?=$value->title?></h4>
                        </div>
                    </a>
                </div>

<?php }
?>

          
                

            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>
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
