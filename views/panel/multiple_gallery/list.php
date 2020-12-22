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
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Multiple Gallery List</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if ($this->session->flashdata('SUCCESS')) { ?>
                                <div role="alert" class="alert alert-success">
                                    <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?=$this->config->item('Close')?></span></button>
                                       <?= $this->session->flashdata('SUCCESS') ?>
                                </div>
                            <?php } ?>
                       <a href="<?=base_url()?>panel/multiple_gallery/add_multiple_gallery" class="btn btn-primary" title="Add New Multiple Gallery"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Multiple Gallery</span></a>
                             
                            <div class="panel panel-default">
                               
                                <div class="panel-heading">
                                    <h3 class="panel-title">Multiple Gallery List</h3>
                                </div>
                                
                                <div class="panel-body">
                                    
    <form enctype="multipart/form-data" action="" method="post">
        <div class="form-group  col-sm-3">
            <label>Multiple and Single Choose Files</label>
            <input type="file" class="form-control" name="upload_Files[]" multiple/>                
        </div>   
        <div class="form-group  col-sm-6">      
            <input style="margin-bottom: -57px;"  type="submit" class="btn btn-success" name="submitForm" id="submitForm" value="Upload" />   
        </div>
    </form>
    

    <table class="table table-striped table-bordered table-hover" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Multiple Image</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
             <?php if(!empty($gallery)): foreach($gallery as $file): ?>
            <tr>
                <td>
                     <?php echo $file['id']; ?>
                </td>
                <td>
                    <?php if(!empty($file['file_name'])) :?>
                    <img width="30px" height="30px" src="<?php echo base_url('img/files/'.$file['file_name']); ?>" alt="" >
                   <?php endif;?>
                </td>
                <td>
                     <?php echo date("j M Y",strtotime($file['created'])); ?>
                </td>
                <td>
                <a onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url();?>panel/multiple_gallery/delete_multiple_gallery/<?php echo $file['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
              <?php endforeach; else: ?>
               <tr><td colspan="100%">No File uploaded.....</td></tr>
              <?php endif; ?>
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

    </body>
</html>


<script>
$(document).ready(function() {

   

});

</script>






