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
                    <li><a>Dynamic</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Dynamic</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Dynamic</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label"> Country</label>
                                            <div class="col-md-6 col-xs-12">                                          <select class="form-control" name="" id="country">
                                                <option value="">Select Country</option>
                                                <?php
    foreach($country as $row)
    {
     echo '<option value="'.$row->country_id.'">'.$row->country_name.'</option>';
    }
    ?>

                                            </select>  
                                                                                      
                                            </div>
                                        </div>

                                            <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label"> State</label>
                                            <div class="col-md-6 col-xs-12">                                          <select class="form-control" name="" id="state">
                                                <option value="">Select State</option>
                                                
                                            </select>  
                                                                                      
                                            </div>
                                        </div>

                                     

                                       <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label"> City</label>
                                            <div class="col-md-6 col-xs-12">                                          <select class="form-control" name="" id="city">
                                                <option value="">Select City</option>
                                                
                                            </select>  
                                                                                      
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






<script>
$(document).ready(function(){
 $('#country').change(function(){
  var country_id = $('#country').val();
  if(country_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>panel/dynamic/fetch_state",
    method:"POST",
    data:{country_id:country_id},
    success:function(data)
    {
     $('#state').html(data);
     $('#city').html('<option value="">Select City</option>');
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State</option>');
   $('#city').html('<option value="">Select City</option>');
  }
 });

 $('#state').change(function(){
  var state_id = $('#state').val();
  if(state_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>panel/dynamic/fetch_city",
    method:"POST",
    data:{state_id:state_id},
    success:function(data)
    {
     $('#city').html(data);
    }
   });
  }
  else
  {
   $('#city').html('<option value="">Select City</option>');
  }
 });
 
});
</script>
