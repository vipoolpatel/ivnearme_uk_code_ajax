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
                    <li><a>Edit Image Ajax</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Image Ajax</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" id="update_form" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Patient</h3>
                                    </div>

                                    <div class="panel-body">  
                                    
                                    <input name="id" id="edit_form_id" type="hidden" value="<?= $get_r->id ?>" /> 
                                    
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">First Name <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="first_name" required  type="text" placeholder="First Name" class="form-control" value="<?= $get_r->first_name?>" />
                                                    <div class="error"><?php echo form_error('first_name'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Last Name <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="last_name" required  type="text" placeholder="Last Name" class="form-control" value="<?= $get_r->last_name ?>" />
                                                    <div class="error"><?php echo form_error('last_name'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">City Name </label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <select class="form-control" name="city_name">
                                                      
                                                        <option <?=($get_r->city_name == 'Bhavnagar')? 'selected' : ''?> value="Bhavnagar">Bhavnagar</option>
                                                        <option <?=($get_r->city_name == 'Surat')? 'selected' : ''?> value="Surat">Surat</option>
                                                        <option <?=($get_r->city_name == 'Dhola')? 'selected' : ''?> value="Dhola">Dhola</option>
                                                        <option <?=($get_r->city_name == 'Umrala')? 'selected' : ''?> value="Umrala">Umrala</option>
                                                    </select>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="panel-footer">
                                        <button type="submit" class="btn btn-primary pull-right">Update</button>
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
            url:'<?=base_url()?>panel/image_ajax/image_ajax_update',  
            type:'POST',
            data:new FormData(this),
            //data:$('#update_form').serialize(),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success:function(data){
                // console.log(data);
                window.location.href = "<?=base_url()?>panel/image_ajax/image_ajax_list";
            }
        });
       });
    });
</script>

    </body>
</html>






