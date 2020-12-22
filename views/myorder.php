
<?php
$this->load->view('header/header');
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>My Order</h1>

            <div class="breadcrumbs">
                <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                    <li><a href="<?=base_url()?>">Home</a></li>
                    <li>My Order</li>
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
<div class="section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="cart-title mt-50">
                    <h2>My Order</h2>
                </div>

                <div class="cart-table clearfix">
                    <?php
                    if(!empty($getOrder))
                    { 
                    ?>

                        <table class="table table-responsive" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Total Payment</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($getOrder as $value) 
                            {
                            ?>
                            <tr>
                                <td><?=$value->id?></td>
                                <td><?=$value->total?></td>
                                <td><?=$value->created_date?></td>
                                <td><?php
                                    if($value->status  == '0')
                                    {
                                        echo "Pending";
                                    }
                                    else if($value->status  == '1')
                                    {
                                        echo "Processing";
                                    }
                                    else if($value->status  == '2')
                                    {
                                        echo "Complete";
                                    }
                                    else if($value->status  == '3')
                                    {
                                        echo "Cancel";
                                    }
                                ?></td>
                                <td>
                                    <a href="<?=base_url()?>myorder/orderdetail/<?=$value->id?>" style="color:#fff;" class="btn btn-primary" >Detail</a>
                                </td>
                            </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                   
                   
                <?php }
                else { ?>
                        No any order found!
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
