 <?php
$this->load->view('panel/header/header');
?>
    <body>
        <div class="page-container">
            <?php
            $this->load->view('panel/header/sidebar');
            ?>
            <div class="page-content">
                <?php
                $this->load->view('panel/header/top_header');
                ?>
                <ul class="breadcrumb">
                    <li><a >Patient</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Patient</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Patient</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">First Name <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="name" required  type="text" placeholder="First Name" class="form-control" value="<?= set_value('name'); ?>" />
                                                    <div class="error"><?php echo form_error('name'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Last Name </label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="lname" type="text" placeholder="Last Name" class="form-control" value="<?= set_value('lname'); ?>" />
                                                    <div class="error"><?php echo form_error('lname'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Email <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="email" required  type="email" placeholder="Email" class="form-control" value="<?= set_value('email'); ?>" />
                                                    <div class="error"><?php echo form_error('email'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Phone </label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="phone"   type="text" placeholder="Phone" class="form-control" value="<?= set_value('phone'); ?>" />
                                                    <div class="error"><?php echo form_error('phone'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                   

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Company Name</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="company" type="text" placeholder="Company Name" class="form-control" value="<?= set_value('company'); ?>" />
                                                    <div class="error"><?php echo form_error('company'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Country Name </label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="country" type="text" placeholder="Country Name" class="form-control" value="<?= set_value('country'); ?>" />
                                                    <div class="error"><?php echo form_error('country'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label"> Address</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <textarea name="street_address" type="text" placeholder="Address" class="form-control"><?= set_value('street_address'); ?></textarea> 
                                                    <div class="error"><?php echo form_error('street_address'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">City Name </label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="city" type="text" placeholder="City Name" class="form-control" value="<?= set_value('city'); ?>" />
                                                    <div class="error"><?php echo form_error('city'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Zip Code </label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="zipcode" type="text" placeholder="Zip Code" class="form-control" value="<?= set_value('zipcode'); ?>" />
                                                    <div class="error"><?php echo form_error('zipcode'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Comment </label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <textarea name="comment" type="text" placeholder="Comment" class="form-control"><?= set_value('comment'); ?></textarea>
                                                    <div class="error"><?php echo form_error('comment'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Status <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <select name="user_status" class="form-control">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>                                            
                                            </div>
                                        </div>

                                        

                                    </div>
                                    <div class="panel-footer">
                                        <button class="btn btn-primary pull-right">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>                    

                </div>  
            </div>            
        </div>
<?php
$this->load->view('panel/header/footer');
?>     

    </body>
</html>






