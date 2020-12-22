
<div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="" style="background: #e34724; text-align: center;">
                        <a style="font-size: 22px;" href="<?=base_url()?>nurse/dashboard"><b>Ivnearme</b></a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
					
                    <li class="<?php if (uri_string() == 'nurse/dashboard') echo "active";?>">
                        <a href="<?=base_url()?>nurse/dashboard"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                    </li>
                    
                    <li class="xn-openable <?php if ($this->uri->segment(2) == "order") echo "active";?>">
                        <a href="#"><span class="fa fa-shopping-cart"></span> <span class="xn-text">Order</span></a>
                        <ul>
                            <li class="<?php if ($this->uri->segment(3) == "pending") echo "active";?>"><a href="<?=base_url()?>nurse/order/pending/0">Pending</a></li>                            
                            <li class="<?php if ($this->uri->segment(3) == "processing") echo "active";?>"><a href="<?=base_url()?>nurse/order/processing/1">Processing</a></li>
                            <li class="<?php if ($this->uri->segment(3) == "complete") echo "active";?>"><a href="<?=base_url()?>nurse/order/complete/2">Complete</a></li>                            
                            <li class="<?php if ($this->uri->segment(3) == "cancel") echo "active";?>"><a href="<?=base_url()?>nurse/order/cancel/3">Cancel</a></li>                            
                        </ul>
                    </li>
                    
                    					
                    <li class="<?php if (uri_string() == 'nurse/profile') echo "active";?>">
                        <a href="<?=base_url()?>nurse/profile"><span class="fa fa-user"></span> <span class="xn-text">My Account</span></a>
                    </li>
                    
                
                </ul>
                <!-- END X-NAVIGATION -->
            </div>