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
                    <li><a>Company</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Company</h2>
                </div>                                              
                
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Company</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Company Code</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="company_code" type="text" placeholder="Company Code" class="form-control" value="<?= set_value('company_code'); ?>" />
                                                    <div class="error"><?php echo form_error('company_code'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Type</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <select class="form-control" name="type">
                                                        <option value="0">Percentage</option>
                                                        <option value="1">Amount</option>
                                                    </select>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Discount</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="company_price" type="text" placeholder="Discount" class="form-control" value="<?= set_value('company_price'); ?>" />
                                                    <div class="error"><?php echo form_error('company_price'); ?></div>
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






