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
                    <li><a>Multiple Gallery</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Multiple Gallery</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Create Multiple Gallery</h3>
                                </div>
                               
                                <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
                                    <div class="panel-body">  
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Multiple Gallery Upload <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">    
                                                <div class="">
                                                    <input name="upload_Files[]" multiple required  type="file">
                                                </div>                                            
                                            </div>
                                        </div>

                                    </div>
                                  
                                    <div class="panel-footer">
                                            <input type="submit" class="btn btn-primary pull-right" name="submitForm" id="submitForm" value="Upload" />   
                                    </div>
                                </form>
                        
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Multiple Image Pic</th>
                                            <th>Create Date</th>
                                            <th>Modified Date</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                

                                        <?php
                                        if (!empty($getRecoard)) {
                                        foreach ($getRecoard as $value) {
                                        ?>
                                        <tr>
                                            <td> <?=$value->id?></td>
                                            <td> 
                                                <?php
                                                if(!empty($value->file_name)){
                                                ?>
                                                <img src="<?=base_url()?>img/files/<?=$value->file_name?>" width="100px;" height="100px">
                                                <?php
                                                    }
                                                ?>
                                            </td>
                                            <td><?=date('d-m-Y h:i A', strtotime($value->created))?></td>
                                            <td><?=date('d-m-Y h:i A', strtotime($value->modified))?></td>
                                            <td>
                                               <a href="javascript:;" id="delete_recoard" class="btn btn-danger" value="<?=$value->id?>"><span class="fa fa-trash-o"></span></a>
                                            </td>
                                        </tr>
                                     
                                        <?php
                                        }
                                        }
                                        else{
                                        ?>
                                       <tr><td colspan="100%">No record found......</td></tr>
                                              
                                         <?php
                                            }
                                         ?>         
                                         
                                    </tbody>
                                </table>
                            </div>

                            </div>
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
        $('table').on("click", "#delete_recoard", function(e){
           
            var del_id = $(this).attr("value");
            // alert(del_id);
            // die();
            $.ajax({
                url:'<?=base_url()?>panel/multiple_gallery/delete_ajax_multiple_gallery',
                type:'POST',
                dataType:"json",
                data:{ del_id: del_id },
                success: function(data){
                    alert("Delete Successful.");
                    console.log(data);
                    window.location.href = "";
                }
            });
        });
    }); 
</script>
    </body>
</html>






