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
                    <li><a>Pic Ajax</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Pic Ajax</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" id="submit_form" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Pic Ajax</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Name <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="f_name" required  type="text" placeholder="First Name" class="form-control" value="<?= set_value('f_name'); ?>" />
                                                    <div class="error"><?php echo form_error('f_name'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Address </label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <textarea class="form-control" name="address" placeholder="Address"><?= set_value('address'); ?></textarea>
                                                    <div class="error"><?php echo form_error('address'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Pic Image <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input class="form-control" type="file" name="file">
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
<script type="text/javascript">
    $(document).ready(function(){
        $("form").on( "submit", function( event ) {
        event.preventDefault();
            // alert('Heello');
            // die();
            $.ajax({
                url:'<?=base_url()?>panel/pic_ajax/pic_ajax_insert',
                type:'POST',
                // data:$('#submit_form').serialize(),  
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success:function(data){
                    // control.log(data)
                    window.location.href = "<?=base_url()?>panel/pic_ajax/pic_ajax_list";
                }
            });
        });
    });
</script>

    </body>
</html>






