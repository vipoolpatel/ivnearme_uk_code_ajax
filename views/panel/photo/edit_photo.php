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
                    <li><a >photo</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit photo</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit photo</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                      <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Title <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="id" type="hidden" value="<?= $photo->id ?>" />
                                                    <input name="title" required  type="text" placeholder="Name" class="form-control" value="<?= set_value('title',$photo->title); ?>" />
                                                    <div class="error"><?php echo form_error('title'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                         
                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">product_image<span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">  
                                              <div class="">
                                                
                                                <input type="file" class="btn btn-primary" name="product_image">
                                                            <img  width="70" height="70"  src="<?= base_url() ?>img/<?= $photo->product_image ?>">
                                                            <input type="hidden" value="<?= $photo->product_image ?>" name="old_imagename">
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






