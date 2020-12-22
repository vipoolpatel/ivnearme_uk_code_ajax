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
                            <form class="form-horizontal" method="post" id="update_form" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Pic Ajax</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Name <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input text="text" id="edit_form_id" name="id" value="<?=$getRow->id?>">
                                                    <input name="f_name" required  type="text" placeholder="First Name" class="form-control" value="<?=$getRow->first_name?>" />
                                                    <div class="error"><?php echo form_error('f_name'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Address </label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <textarea class="form-control" name="address" placeholder="Address"><?=$getRow->address?></textarea>
                                                    <div class="error"><?php echo form_error('address'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Pic Image <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                
                                                    <input class="form-control" type="file" name="file">
                                                    <input type="hidden" value="<?=$getRow->profile_pic?>" name="old_image_file" id="old_image_file">
                                                    <?php
                                                       if(!empty($getRow->profile_pic)){
                                                    ?>

                                                    <img src="<?=base_url()?>img/ajax_img/<?=$getRow->profile_pic?>" height="100px;" weight="100px;"/>
                                                    <?php
                                                      }
                                                    ?>
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
    $( document ).ready(function() {
       //console.log( "ready!" );

       //$('body').delegate('#insertRecoard', 'submit', function(event) {
        $( "form" ).on( "submit", function( event ) {
        event.preventDefault();
        //  alert('Heello');
        //  die();
        var edit_id = $("#edit_form_id").val();
        // alert(edit_id);
        // die();
        // var name = $('#name').val();  
        $.ajax({
            url:'<?=base_url()?>panel/pic_ajax/pic_ajax_update/',  
            type:'POST',
            data:new FormData(this),
            //data:$('#update_form').serialize(),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success:function(data){
                // console.log(data);
                window.location.href = "<?=base_url()?>panel/pic_ajax/pic_ajax_list";
            }
        });
       });
    });
</script>

    </body>
</html>






