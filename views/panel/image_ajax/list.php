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
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Image Ajax List</h2>
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
                             <a href="<?=base_url()?>panel/image_ajax/add_image_ajax" class="btn btn-primary" title="Add New Image Ajax"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Image Ajax</span></a>

                               

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Image Ajax List</h3>
                                </div>
                                <div class="panel-body">
                                    
                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>City </th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            <?php
                                            if(!empty($get_record)){
                                              foreach ($get_record as $row) {
                                            ?>
                                                <tr>
                                                    <td><?=$row->id?></td>
                                                    <td><?=$row->first_name?></td>
                                                    <td><?=$row->last_name?></td>
                                                    <td><?=$row->city_name?></td>
                                                    <td><?=date('d-m-Y', strtotime($row->created_at));?></td>
<td>
    <a class="btn btn-primary" href="<?=base_url()?>panel/image_ajax/edit_image_ajax/<?=$row->id?>"><span class="fa fa-pencil"></span></a>
    <a href="javascript:;" id="delete_recoard" class="btn btn-danger" value="<?= $row->id ?>"><span class="fa fa-trash-o"></span></a>
    <a href="javascript:;" id="view_recoard" class="btn btn-success" value="<?= $row->id ?>"><span class="fa fa-eye"></span></a>
</td>
                                                </tr>
                                          <?php
                                          }
                                          }
                                          else{
                                          ?>
                                            <tr><td colspan="100%">No record found.</td></tr>
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

<!-- View -->
        <div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Modal Ajax</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    
        </button>
      </div>
      <div class="modal-body">
        <form>
            <input type="hidden" id="view_modal_id">
            <div class="form-group">
                <label for="">First Name : </label>
                <span id="view_first_name"></span>
            </div>
             <div class="form-group">
                <label for="">Last Name :</label>
               <span id="view_last_name"></span>
            </div>
             <div class="form-group">
                <label for="">City : </label>
                <span id="view_city_name"></span>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>
<!-- View End -->
<?php
$this->load->view('panel/header/footer');
?>     

    </body>
</html>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script>
    $(document).ready(function() {
        $('table').on("click", "#delete_recoard", function(e){
            e.preventDefault();
        // alert("heeee");
        // die();
        var del_id = $(this).attr("value");
        // alert(del_id);
        // die();
            $.ajax({
                url:'<?=base_url()?>panel/image_ajax/image_ajax_delete',
                type:'POST',
                dataType: "json",
                data: { del_id: del_id },
                success: function(data){
                    alert("Delete Successful.");
                    console.log(data);
                    window.location.href = "";
                }
            });
        });

        // View Start
        $('table').on("click", "#view_recoard", function(event){
            //alert("heeee");
            //die();
            var view_id = $(this).attr("value")
            // alert(view_id);
            // die();
          
            $.ajax({
                url: "<?= base_url()?>panel/image_ajax/view_image_ajax",
                type: "POST",
                dataType: "json",
                data: {view_id: view_id},
                success: function(data){
                    //console.log(data);
                        $("#ViewModal").modal('show');
                        $("#view_modal_id").val(data.post.id);
                        $("#view_first_name").html(data.post.first_name);
                        $("#view_last_name").html(data.post.last_name);
                        $("#view_city_name").html(data.post.city_name);
                    
                }
            });
        });

        // View End

    });
</script>





