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
                    <li><a>Ajax Add</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Ajax</h2>
                </div>                                              
                
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="insertRecoard" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Ajax</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">First Name</label>
                                            <div class="col-md-6 col-xs-12">    
                                                <div class="">
                                                    <input name="f_name" type="text" placeholder="First Name" class="form-control" />
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
                                            <label class="col-md-3 col-xs-12 control-label">Image Logo</label>
                                            <div class="col-md-6 col-xs-12">    
                                                <div class="">
                                                    <input name="image_logo" type="file">
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="panel-footer">
                                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
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

<script type="text/javascript">
    $(document).ready(function(){
        $('body').delegate('#insertRecoard', 'submit', function(e){
            e.preventDefault();
            
            $.ajax({
                url:"<?=base_url();?>panel/modal_ajax/ajax_insert",
                type:"POST",
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(data)
                {
                    //console.log(data);
                    window.location.href="<?php echo base_url() ?>panel/modal_ajax/ajax_list";
                }

            });
        });
    });
</script>





