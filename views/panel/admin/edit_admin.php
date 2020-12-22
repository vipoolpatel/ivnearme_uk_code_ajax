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
                    <li><a >Admin</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Admin</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Admin</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Name <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="id" type="hidden" value="<?= $admin->user_id ?>" />
                                                    <input name="name" required  type="text" placeholder="Name" class="form-control" value="<?= set_value('name',$admin->account_name); ?>" />
                                                    <div class="error"><?php echo form_error('name'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Email <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="email" required  type="email" readonly="" placeholder="Email" class="form-control" value="<?= set_value('email',$admin->email); ?>" />
                                                    <div class="error"><?php echo form_error('email'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Status <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <select name="user_status" class="form-control">
                                                        <option <?=($admin->user_status == '1')?'selected':''?> value="1">Active</option>
                                                        <option <?=($admin->user_status == '0')?'selected':''?> value="0">Inactive</option>
                                                    </select>
                                                </div>                                            
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Password </label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="password"   type="password" placeholder="Password" class="form-control"  />
                                                    
                                                    <p style="margin-top: 5px;">(Leave blank if you are not changing the password) </p>
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






