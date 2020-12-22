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
                    <li><a>Ajax Image</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Ajax Image</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal"  id="submit" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Ajax Image</h3>
                                    </div>

                                    <div class="panel-body">
                                    
                                    <div class="form-group">
                                       <label class="col-md-3 col-xs-12 control-label">Title Name <span style="color: #ff0000">*</span></label>
                                         <div class="col-md-6 col-xs-12">
                                             <div class="">
                                                    <input name="title"  type="text" class="form-control cleartext">
                                            </div>
                                        </div>
                                    </div>

                                
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Ajax Image Name <span style="color: #ff0000">*</span></label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="">
                                                <input name="file"  type="file" class="cleartext">
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


<script type="text/javascript">
   $(document).ready(function(){
    $('#submit').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:"<?=base_url();?>panel/company/ajax_upload",
            type:"post",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function(data){

                $('#uploaded_image').html(data); 
                 // $('.clear')[0].reset();
                $(".cleartext").val("");

            }       
        });

    });
  });
</script>






