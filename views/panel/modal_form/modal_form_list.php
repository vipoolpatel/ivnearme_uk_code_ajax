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
                    <li><a>Modal Form</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Modal Form List</h2>
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
                             <a href="<?=base_url()?>panel/modalform/add_modal_form" class="btn btn-primary" title="Add New Modal Form"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Modal Form</span></a>
                               
                            <div class="panel panel-default">
                               
                                <div class="panel-heading">
                                    <h3 class="panel-title">Modal Form List</h3>
                                </div>
                                
                                <div class="panel-body">
                                    
    <table  class="table table-striped table-bordered table-hover" >
        <thead>
            <tr>
                <th> ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(!empty($getModal))
            { 
                foreach ($getModal as $value) {
                ?>
                    <tr>
                        <td><?=$value->id?></td>
                        <td><?=$value->first_name?></td>
                        <td><?=$value->last_name?></td>



   



    
    <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td> 
    <td>
        <a class="btn btn-success" href="<?=base_url()?>panel/modalform/view_modal_form/<?=$value->id?>" ><span class="fa fa-eye"></span></a>
        <a class="btn btn-primary" href="<?=base_url()?>panel/modalform/edit_modal_form/<?=$value->id?>" ><span class="fa fa-pencil"></span></a>
        <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/modalform/delete_row_form/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
    </td>
</tr>
                                                
                                            <?php  }
                                             }
                                            else{ ?>
                                            <tr><td colspan="100%">No record found.</td></tr>
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






