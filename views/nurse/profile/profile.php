 <?php
$this->load->view('nurse/header/header');
?>
    <body>
        <div class="page-container">
            <?php
            $this->load->view('nurse/header/sidebar');
            ?>
            <div class="page-content">
                <?php
                $this->load->view('nurse/header/top_header');
                ?>
                  <ul class="breadcrumb">
                    <li><a >Profile</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Profile</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                               <?php if ($this->session->flashdata('SUCCESS')) { ?>
                                <div role="alert" class="alert alert-success">
                                    <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?=$this->config->item('Close')?></span></button>
                                    <?= $this->session->flashdata('SUCCESS') ?>
                                </div>
                            <?php } ?>
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Profile</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Name <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="name" required  type="text" placeholder="Name" class="form-control" value="<?= set_value('name',$nurse->name); ?>" />
                                                    <div class="error"><?php echo form_error('name'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Email <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="email" required  type="email" readonly="" placeholder="Email" class="form-control" value="<?= set_value('email',$nurse->email); ?>" />
                                                    <div class="error"><?php echo form_error('email'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Phone </label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="phone"   type="text" placeholder="Phone" class="form-control" value="<?= set_value('phone',$nurse->phone); ?>" />
                                                    <div class="error"><?php echo form_error('phone'); ?></div>
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
                                        <button class="btn btn-primary pull-right">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>                    

                </div>
            </div>            
        </div>
<?php
$this->load->view('nurse/header/footer');
?>     
 
    </body>
</html>






