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
                    <li><a>Image Ajax</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Image Ajax</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" id="submit_form" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Patient</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">First Name <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="first_name" required  type="text" placeholder="First Name" class="form-control" value="<?= set_value('first_name'); ?>" />
                                                    <div class="error"><?php echo form_error('first_name'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Last Name <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="last_name" required  type="text" placeholder="Last Name" class="form-control" value="<?= set_value('last_name'); ?>" />
                                                    <div class="error"><?php echo form_error('last_name'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">City Name </label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <select class="form-control" name="city_name">
                                                        <option value="">Select City Name</option>
                                                        <option value="Bhavnagar">Bhavnagar</option>
                                                        <option value="Surat">Surat</option>
                                                        <option value="Dhola">Dhola</option>
                                                        <option value="Umrala">Umrala</option>
                                                    </select>
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
        // alert('Heello');
        // die();
        $.ajax({
            url:'<?=base_url()?>panel/image_ajax/image_ajax_insert',
            type:'POST',
         // data:new FormData(this),
            data:$('#submit_form').serialize(),  
            dataType: "json",
            processData:false,
            success:function(data){
                // control.log(data);
                window.location.href = "<?=base_url()?>panel/image_ajax/image_ajax_list";
            }
        });
       });
    });
</script>

    </body>
</html>






