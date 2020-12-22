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
                    <li><a>Modal Form</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Modal Form</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
<div class="col-md-12">
<form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Edit Modal Form</h3>
</div>

<div class="panel-body">  
    <!-- hidden start -->
 <input name="id" type="hidden" value="<?= $vipul->id ?>" />
<!-- Hideen end -->
<div class="form-group">
<label class="col-md-3 col-xs-12 control-label">First Name <span style="color: #ff0000">*</span></label>
<div class="col-md-6 col-xs-12">                                            
<div class="">
   
    <input name="first_name" required  type="text" placeholder="First Name" class="form-control" value="<?= set_value('first_name',$vipul->first_name); ?>" />
    <div class="error"><?php echo form_error('first_name'); ?></div>
</div>                                            
</div>
</div>

<div class="form-group">
<label class="col-md-3 col-xs-12 control-label">Last Name </label>
<div class="col-md-6 col-xs-12">                                            
<div class="">
    <input name="last_name" type="text" placeholder="Last Name" class="form-control" value="<?= set_value('last_name',$vipul->last_name); ?>" />
    <div class="error"><?php echo form_error('last_name'); ?></div>
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






