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
                    <li><a >Product</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Product List</h2>
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
                             <a href="<?=base_url()?>panel/photo/add_photo" class="btn btn-primary" title="Add New Product"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Photo</span></a>
                                

                            <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h3 class="panel-title">Product List</h3>
                                </div>
                                <div class="panel-body">
                                    
                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($getPhoto))
                                            { 
                                                foreach ($getPhoto as $value) {
                                                ?>
                                                    <tr>
                                                        <td><?=$value->id?></td>
                                                        <td><?=$value->title?></td>
                                                        <td><img style="height: 100px;" src="<?=base_url()?>img/<?=$value->product_image?>" alt="">
<a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/photo/delete_photo/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
                                                        </td>
                                                        
                                                          <td>
                                                            <a class="btn btn-primary" href="<?=base_url()?>panel/photo/edit_photo/<?=$value->id?>" ><span class="fa fa-pencil"></span></a>
        <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/photo/delete_image/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
                                                        </td>
                                                    </tr>
                                                
                                            <?php  }
                                             }
                                            else{ ?>
                                            
                                             <?php }
                                            ?>
                                        </tbody>
                                    </table>    
                                       <?php echo $this->pagination->create_links ();?>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script>
    $(document).ready(function() {

   $( ".datepicker" ).datepicker();
  
$( ".datepicker1" ).datepicker();

});

</script>





