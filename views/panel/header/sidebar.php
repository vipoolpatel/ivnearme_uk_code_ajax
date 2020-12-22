
<div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="" style="background: #e34724; text-align: center;">
                        <a style="font-size: 22px;" href="<?=base_url()?>panel/dashboard"><b>Ivnearme</b></a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
					
                    <li class="<?php if (uri_string() == 'panel/dashboard') echo "active";?>">
                        <a href="<?=base_url()?>panel/dashboard"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                    </li>
                    
                    <li class="xn-openable <?php if ($this->uri->segment(2) == "shipping") echo "active";?>">
                        <a href="#"><span class="fa fa-plane"></span><span class="">Shipping</span></a>
                        <ul>
                            <li class="<?php if ($this->uri->segment(3) == "hold") echo "active"; ?>"><a href="<?=base_url('panel/shipping/hold/0')?>"><span class="fa fa-stop"></span>Hold</a></li>
                            <li class="<?php if ($this->uri->segment(3) == "denied") echo "active"; ?>"><a href="<?=base_url('panel/shipping/denied')?>"><span class="fa fa-ban"></span>Denied</a></li>
                            <li class="<?php if ($this->uri->segment(3) == "expired") echo "active"; ?>"><a href="<?=base_url('panel/shipping/expired')?>"><span class="fa fa-warning"></span>Expired</a></li>
                            <li class="<?php if ($this->uri->segment(3) == "failed") echo "active";?>"><a href="<?=base_url('panel/shipping/failed')?>"><span class="fa fa-times-circle"></span>Failed</a></li>
                        </ul>
                    </li>

                    <li class="<?php if ($this->uri->segment(2) == 'nurse') echo "active";?>">
                        <a href="<?=base_url()?>panel/nurse/nurse_list"><span class="fa fa-user"></span> <span class="xn-text">Nurse</span></a>
                    </li>
                    
                    <li class="<?php if ($this->uri->segment(2) == 'patient') echo "active";?>">
                        <a href="<?=base_url()?>panel/patient/patient_list"><span class="fa fa-user"></span> <span class="xn-text">Patient</span></a>
                    </li>

                    <li class="<?php if ($this->uri->segment(2) == 'image_ajax') echo "active";?>">
                        <a href="<?=base_url()?>panel/image_ajax/image_ajax_list"><span class="fa fa-user"></span><span class="xn-text">Image Ajax</span></a>
                    </li>

                    <li class="<?php if ($this->uri->segment(2) == 'pic_ajax') echo "active";?>">
                        <a href="<?=base_url()?>panel/pic_ajax/pic_ajax_list"><span class="fa fa-user"></span><span class="xn-text">Pic Ajax</span></a>
                    </li>

                    <li class="<?php if ($this->uri->segment(2) == 'modal_ajax') echo "active;"?>">
                        <a href="<?=base_url()?>panel/modal_ajax/ajax_list"><span class="fa fa-user"></span><span class="xn-text">Ajax</span></a>
                    </li>


                  <li class="<?php if ($this->uri->segment(2) == 'multiple_gallery') echo "active;"?>">
                        <a href="<?=base_url()?>panel/multiple_gallery/multiple_gallery_list"><span class="fa fa-user"></span><span class="xn-text">Multiple Gallery</span></a>
                    </li>

                   
                    <li class="<?php if ($this->uri->segment(2) == 'modal_ajax') echo "active";?>">
                        <a href="<?=base_url()?>panel/modal_ajax/modal_ajax_list"><span class="fa fa-user"></span> <span class="xn-text">Modal Ajax</span></a>
                    </li>
                      <li class="<?php if ($this->uri->segment(2) == 'excel_import') echo "active"; ?>">
                        <a href="<?= base_url(); ?>panel/excel_import/excel_import_list"><span class="fa fa-user"></span><span class="xn-text">Excel Import</span></a>
                    </li>

                    <li class="<?php if ($this->uri->segment(2) == 'registration_login') echo 'active';?>">
                        <a href="<?=base_url()?>panel/registration_login/registration_login_list"><span class="fa fa-user"></span> <span class="xn-text">Registration Login Ajax</span></a>
                    </li>

                    <li class="<?php if ($this->uri->segment(2) == 'employee_ajax') echo "active"; ?>">
                        <a href="<?= base_url(); ?>panel/employee_ajax/employee_ajax_list"><span class="fa fa-user"></span><span class="xn-text">Employee Ajax</span></a>
                    </li>

                  

                    <li class="<?php if ($this->uri->segment(2) == 'upload_ajax') echo "active"; ?>">
                        <a href="<?= base_url(); ?>panel/upload_ajax/upload_ajax_list"><span class="fa fa-upload"></span><span class="xn-text">Upload Ajax</span></a>
                        
                    </li>

                    
                    <li class="<?php if ($this->uri->segment(2) == 'page') echo "active";?>">
                        <a href="<?=base_url()?>panel/page/page_list"><span class="fa fa-file"></span><span class="xn-text">Page Ajax</span></a>
                    </li>

                    <li class="<?php if ($this->uri->segment(2) == 'simpleform') echo "active"; ?>">
                        <a href="<?=base_url()?>panel/simpleform/simple_form_list"><span class="fa fa-file"></span><span class="xn-text">Simple Form</span></a>
                    </li>
                    
                    <li class="xn-openable <?php if ($this->uri->segment(2) == "order") echo "active";?>">
                        <a href="#"><span class="fa fa-shopping-cart"></span> <span class="xn-text">Order</span></a>
                        <ul>
                            <li class="<?php if ($this->uri->segment(3) == "pending") echo "active";?>"><a href="<?=base_url()?>panel/order/pending/0">Pending</a></li>                            
                            <li class="<?php if ($this->uri->segment(3) == "processing") echo "active";?>"><a href="<?=base_url()?>panel/order/processing/1">Processing</a></li>
                            <li class="<?php if ($this->uri->segment(3) == "complete") echo "active";?>"><a href="<?=base_url()?>panel/order/complete/2">Complete</a></li>                            
                            <li class="<?php if ($this->uri->segment(3) == "cancel") echo "active";?>"><a href="<?=base_url()?>panel/order/cancel/3">Cancel</a></li>                            
                        </ul>
                    </li>

                    <li class="<?php if ($this->uri->segment(2) == "company") echo "active"?>">
                        <a href="<?=base_url()?>panel/company/company_list" title=""><span class="fa fa-building-o"></span><span class="xn-text">Company Code</span></a> 
                    </li>
                     <li class="<?php if ($this->uri->segment(2) == "dynamic") echo "active"?>">
                        <a href="<?=base_url()?>panel/dynamic/dynamic_list" title=""><span class="fa fa-question-circle"></span><span class="xn-text">Dynamic Dependent</span></a> 
                    </li>
                    
                    <li class="<?php if ($this->uri->segment(2) == "product") echo "active";?>">
                        <a href="<?=base_url()?>panel/product/product_list"><span class="fa fa-user"></span> <span class="xn-text">Product</span></a>
                    </li>

                    <li class="<?php if ($this->uri->segment(2) == "photo") echo "active";?>">
                        <a href="<?=base_url()?>panel/photo/photo_list"><span class="fa fa-picture-o"></span> <span class="xn-text">Photo</span></a>
                    </li>
                    

                    <li class="<?php if ($this->uri->segment(2) == "subscribe") echo "active";?>">
                        <a href="<?=base_url()?>panel/subscribe/subscribe_list"><span class="fa fa-user"></span> <span class="xn-text">Subscribe</span></a>
                    </li>

                    <li class="<?php if ($this->uri->segment(2) == "table") echo "active";?>">
                        <a href="<?=base_url()?>panel/table/table_list"><span class="fa fa-table"></span> <span class="xn-text">Table Joint</span></a>
                    </li>

                    <li class="<?php if ($this->uri->segment(2) == "modalform") echo "active";?>">
                        <a href="<?=base_url()?>panel/modalform/modal_form_list"><span class="fa fa-table"></span><span class="xn-text">Modal Form</span></a>
                        
                    </li>

                    

                    <li class="<?php if ($this->uri->segment(2) == "person") echo "active";?>">
                    <a href="<?=base_url()?>panel/person/person_list"><span class="fa fa-user"></span><span class="xn-text">Person</span></a>
                    </li>

                     <li class="<?php if ($this->uri->segment(2) == "contact") echo "active";?>">
                        <a href="<?=base_url()?>panel/contact/contact_list"><span class="fa fa-phone"></span> <span class="xn-text">Contact</span></a>
                    </li>
                    
                    <li class="<?php if ($this->uri->segment(2) == "admin") echo "active";?>">
                        <a href="<?=base_url()?>panel/admin/admin_list"><span class="fa fa-user"></span> <span class="xn-text">Admin</span></a>
                    </li>
                   
                    <li class="<?php if ($this->uri->segment(2) == "appointment") echo "active";?>">
                        <a href="<?=base_url()?>panel/appointment/appointment_list"><span class="fa fa-calendar"></span> <span class="xn-text">Appointment</span></a>
                    </li>
                    <li class="<?php if ($this->uri->segment(2) == "support") echo "active";?>">
                        <a href="<?=base_url()?>panel/support/support_list"><span class="fa fa-support"></span><span class="xn-text">Support</span></a>
                    </li>
                    <li class="<?php if ($this->uri->segment(2) == "question") echo "active"?>">
                        <a href="<?=base_url()?>panel/question/question_list" title=""><span class="fa fa-question-circle"></span><span class="xn-text">Question</span></a> 
                    </li>

               
                
                </ul>
                <!-- END X-NAVIGATION -->
            </div>

 