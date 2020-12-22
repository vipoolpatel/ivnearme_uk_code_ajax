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
                    <li><a>Upload Ajax</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Upload Ajax List</h2>
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
                            
 <button type="button" id="btnAdd" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    <i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">
  Add New Upload Ajax</span>
</button>

                               
                            <div class="panel panel-default">
                               
                                <div class="panel-heading">
                                    <h3 class="panel-title">Upload Ajax List</h3>
                                </div>
                                
                                <div class="panel-body">
                                    
                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                         <tbody id="tbody">
                                            
                                         </tbody>
                                    </table>    
                                       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>            
        </div>


        <!-- Button trigger modal -->

<!-- Insert Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Upload Ajax</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <form action="" method="post" id="submit" enctype="multipart/form-data">
      <div class="modal-body">
        
            <div class="form-group">
                <label for="">Title Name</label>
                <input type="text" name="title" class="form-control cleartext" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="">Image Upload</label>
                <input type="file" class="cleartext" name="file">
            </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">Upload</button>
       <!--  <button type="button" id="add" class="btn btn-primary">Add</button> -->
      </div>
      </form>
    </div>
      
  </div>
</div>



<!-- Edit and Update Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Modal Ajax</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    
        </button>
      </div>
       <form action="" method="post" id="update_form" enctype="multipart/form-data">
      <div class="modal-body">
       
            <input type="hidden" name="id" id="edit_modal_id">
            <div class="form-group">
                <label for="">Edit Title</label>
                <input type="text" id="edit_title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Edit Image Upload</label>
                   <input type="file" name="file" id="edit_file">
                   <input type="hidden" name="old_image_file" id="old_image_file">
                   <div id="get_old_image_file"></div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="update" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>



  <?php
    $this->load->view('panel/header/footer');
  ?>     

    </body>
</html>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">

  $(document).ready(function(){
        $('#submit').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url:'<?php echo base_url();?>panel/upload_ajax/do_upload',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                         fetch();
                           $(".cleartext").val("");
                        $('#exampleModal').modal('hide');
                        //  alert("Upload Image Successful.");
                   }
                 });
            });


    $('#editModal').delegate('#update_form','submit',function(e){

        e.preventDefault(); 
             $.ajax({
                 url: "<?= base_url(); ?>panel/upload_ajax/update",
                 type:"post",
                 data:new FormData(this),
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                  success: function(data){
                     fetch();
                    // window.location.href = '';
                    // alert('success');
                       $('#editModal').modal('hide');
               }
             });
        });
    });

  function fetch()
    {
        $.ajax({
            url: "<?= base_url(); ?>panel/upload_ajax/fetch",
            type:"POST",
            dataType: "json",
            success: function(data){
              //  console.log(data);
              var tbody = "";
              var i = "1";
              for(var key in data){
                tbody += "<tr>";
                tbody += "<td>"+ i++ +"</td>";
                // tbody += "<td>"+ data[key]['id'] +"</td>";
                tbody += "<td>"+ data[key]['title'] +"</td>";
                if(data[key]['file_name'] != "")
                {
                    tbody += "<td> <img  style='width: 100px;' src=<?=base_url()?>assets/images/"+data[key]['file_name']+"> </td>";
                }
                else
                {
                  tbody += "<td></td>";
                }
                


                tbody += `<td>
        <a href="#" id="del" class="btn btn-danger" value="${data[key]['id']}">Delete</a>
         <a href="#" id="edit" class="btn btn-success" value="${data[key]['id']}">Edit</a>
                </td>`;
                tbody += "</tr>";
              }
              $("#tbody").html(tbody);
            }
        });
    }
    fetch();

      
     $(document).on("click", "#del", function(e){
        e.preventDefault();
        // alert("delete");
        var del_id = $(this).attr("value");
        //alert(del_id);
        if(del_id == ""){
            alert("Delete id Required");
        }else{
              
              $.ajax({
                 url: "<?= base_url(); ?>panel/upload_ajax/delete",
                 type: "POST",
                 dataType: "json",
                 data: {
                  del_id: del_id
                 },
                 success: function(data){
                  alert("Delete Successful.");
                   fetch();

                  console.log(data);

                 }
              });
        }
    });

      $(document).on("click", "#edit", function(event) {
        event.preventDefault();
        var edit_id = $(this).attr("value");
       // alert(edit_id);
       if (edit_id == "") {
          alert("Edit id required");
       }else{
        $.ajax({
            url: "<?= base_url()?>panel/upload_ajax/edit",
            type: "POST",
            dataType: "json",
            data: {edit_id: edit_id},
            success: function(data){
                //console.log(data);
                if(data.responce == "success") {
                    $("#editModal").modal('show');
                    $("#edit_modal_id").val(data.post.id);
                    $("#old_image_file").val(data.post.file_name);
                    if(data.post.file_name != "")
                    {
                      $("#get_old_image_file").html("<img style='width: 100px;' src=<?=base_url()?>assets/images/"+data.post.file_name+">");
                    }
                    else
                    {
                      $("#get_old_image_file").html("");
                    }
                    
                    $("#edit_title").val(data.post.title);
                  
                }else{

                }
            }
        });
       }
    });
     
</script>






