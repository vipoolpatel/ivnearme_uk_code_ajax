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
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Product</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Product</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                      <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Title <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="id" type="hidden" value="<?= $product->id ?>" />
                                                    <input name="title" required  type="text" placeholder="Name" class="form-control" value="<?= set_value('title',$product->title); ?>" />
                                                    <div class="error"><?php echo form_error('title'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Price <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">  
                                              <div class="">
                                                    <input name="price" required  type="text" placeholder="Price" class="form-control" value="<?= set_value('price',$product->price); ?>" />
                                                    <div class="error"><?php echo form_error('price'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Description <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">  
                                              <div class="">
                                                    <textarea name="description" required  type="text" placeholder="Description" class="form-control" value="" /><?= set_value('description',$product->description); ?></textarea>
                                                    <div class="error"><?php echo form_error('description'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Qty <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">  
                                              <div class="">
                                                    <input name="qty" required  type="text" placeholder="Qty" class="form-control" value="<?= set_value('qty',$product->qty); ?>" />
                                                    <div class="error"><?php echo form_error('qty'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Product Image <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">  
                                              <div class="">
                                                 <input type="file" name="product_image">
                                                 <img style="height: 100px;" src="<?=base_url()?>img/product/<?=$product->id?>/<?=$product->product_image?>" alt="">
                                                 <input type="hidden" value="<?= set_value('product_image',$product->product_image); ?>" name="old_imagename1">
                                                    <div class="error"><?php echo form_error('qty'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Status <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <select name="status" class="form-control">
                                                        <option <?=($product->status == '1')?'selected':''?> value="1">Active</option>
                                                        <option <?=($product->status == '0')?'selected':''?> value="0">Inactive</option>
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






