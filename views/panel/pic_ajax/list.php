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
                    <li><a>Pic Ajax</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Pic Ajax List</h2>
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
                            <a href="<?=base_url()?>panel/pic_ajax/add_pic_ajax" class="btn btn-primary" title="Add New Pic Ajax"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Pic Ajax</span></a>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Pic Ajax List</h3>
                                </div>
                                <div class="panel-body">
                                    
                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th> ID</th>
                                                <th>Full Name</th>
                                                <th>Address</th>
                                                <th>Pic Image</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                       if(!empty($get_recoard)){
                                        foreach($get_recoard as $value){
                                    ?>
                                        <tr>
                                            <td><?=$value->id?></td>
                                            <td><?=$value->first_name?></td>
                                            <td><?=$value->address?></td>
                                            <td>
                                            <?php
                                                if(!empty($value->profile_pic)){
                                            ?>
                                            <img src="<?=base_url()?>img/ajax_img/<?=$value->profile_pic?>" height="100px;" weight="100px;"/>
                                            <?php
                                                }
                                            ?>
                                            </td>
                                            <td><?=date('d-m-Y', strtotime($value->created_at))?></td>
                                            <td><a class="btn btn-primary" href="<?=base_url()?>panel/pic_ajax/edit_pic_ajax/<?=$value->id?>"><span class="fa fa-pencil"></span></a>
                                            <a href="javascript:;" id="delete_recoard" class="btn btn-danger" value="<?= $value->id ?>"><span class="fa fa-trash-o"></span></a>
    <a href="javascript:;" id="view_recoard" class="btn btn-success" value="<?=$value->id?>"><span class="fa fa-eye"></span></a>
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
                                       <!-- Pagineathion -->
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
                <label for="">Full Name : </label>
                <span id="view_full_name"></span>
            </div>
             <div class="form-group">
                <label for="">Address :</label>
               <span id="view_address"></span>
            </div>
             <div class="form-group">
                <label for="">Pic Image : </label>
                <span id="view_pic_image"></span>
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
                url:'<?=base_url()?>panel/pic_ajax/pic_ajax_delete',
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

        // view Start

        $('table').on("click", "#view_recoard", function(e){
            e.preventDefault();

            var view_id = $(this).attr("value");
            // alert(view_id);
            // die();
            $.ajax({
                url:"<?=base_url()?>panel/pic_ajax/view_pic_ajax",
                type: "POST",
                dataType: "json",
                data: {view_id: view_id},
                success: function(data)
                {
                    $("#ViewModal").modal('show');
                    $("#view_modal_id").val(data.post.id);
                    $("#view_full_name").html(data.post.first_name);
                    $("#view_address").html(data.post.address);
                    
                    if(data.post.profile_pic != "")
                    {
                    $("#view_pic_image").html("<img  style='width: 100px;' src=<?=base_url()?>img/ajax_img/"+data.post.profile_pic+">");
                    }
                    else
                    {
                      $("#view_pic_image").html("");
                    }

                }
            });
        });
        // view End        

    });
</script>





