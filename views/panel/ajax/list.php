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
                    <li><a>Ajax Add Edit Delete</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Ajax Add Edit Delete List</h2>
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
    <a href="<?=base_url()?>panel/modal_ajax/add_ajax" class="btn btn-primary" title="Add New Company"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Ajax</span></a>
                         
 
                         

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Ajax List</h3>
                                </div>
                                <div class="panel-body" style="overflow: auto;">
                                    
                                     <table class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>First Name</th>
                                                <th>Type</th>
                                                <th>Image Logo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table">
                                           

                                        </tbody>
                                    </table>  

                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>            
        </div>

<!-- Edit Reocard Start-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" name="id" id="edit_modal_id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Reocard End-->


<?php
$this->load->view('panel/header/footer');
?>     

    </body>
</html>




<script type="text/javascript" src="<?=base_url()?>front/bootstrap-datepicker.min.js"></script>

<script>
$(document).ready(function() {

    $.ajax({
        url: "<?=base_url();?>panel/modal_ajax/view_ajax",
        type: "POST",
        cache: false,
        data: "type=image",
        // processData:false,
        // contentType:false,
        // cache:false,
        // async:false,
        success: function(data){
           // alert(data);
         // var html = '';
        //   $i=1;
        //     foreach($data as $row)
        //     {
        //     echo "<tr>";
        //     echo "<td>".$i."</td>";
        //     echo "<td>".$row->f_name."</td>";
        //     echo "<td>".$row->type."</td>";
        //     echo "<td>".$row->image_logo."</td>";
        //     echo "<td><img style='width:100px;' src=".base_url()."/img/ajax_img/".$row->image_logo."></td>";
        //     echo "<td><a href='javascript:;' class='btn btn-info item-edit' data=".$row->id.">Edit</a></td>";
        //     echo "</tr>";
        //     $i++;
        // }
           $('#table').html(data);
        }   
    });

    $('body').on("click", ".ajax_edit", function(event) {
        event.preventDefault();
        // alert("hdddd");
        // die();
        // var edit_id = $(this).attr("value");
           var edit_id = $("#edit_modal_id").val();
        // alert(edit_id);
        // die();
        $.ajax({
            url:"<?=base_url()?>panel/modal_ajax/edit_ajax_list",
            type: "POST",
           // dataType: "json",
            data: {edit_id: edit_id},
            success: function(data){
                //console.log(data);
                // if(data.responce == "success") {
                    $("#EditModal").modal('show');
                    $("#edit_modal_id").val(data.post.id);
                //  }else{
                // }
             }
        });
    });

});

 
</script>
