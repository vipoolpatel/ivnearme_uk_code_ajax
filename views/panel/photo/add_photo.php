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
                    <li><a >Product</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Product</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Product</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Title <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="title" required  type="text" placeholder="Title" class="form-control" value="<?= set_value('title'); ?>" />
                                                    <div class="error"><?php echo form_error('name'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>


                                      
                                   
                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Product Image <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">  
                                              <div class="">
                                                <input type="file" required="" name="product_image">
                                           
                                                    <div class="error"><?php echo form_error('product_image'); ?></div>
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






