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
                    <li><a>Page</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Page</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Page</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                      <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">First Name</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="id" type="hidden" value="<?= $page_data->id ?>" />
                                                    <input name="first_name" required  type="text" placeholder="First Name" class="form-control" value="<?= set_value('fname',$page_data->fname); ?>" />
                                                    <div class="error"><?php echo form_error('fname'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="last_name" required  type="text" placeholder="Last Name" class="form-control" value="<?= set_value('lname',$page_data->lname); ?>" />
                                                    <div class="error"><?php echo form_error('lname'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Sur Name</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    
                                                    <input name="sur_name" required  type="text" placeholder="Sur Name" class="form-control" value="<?= set_value('sname',$page_data->sname); ?>" />
                                                    <div class="error"><?php echo form_error('sname'); ?></div>
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






