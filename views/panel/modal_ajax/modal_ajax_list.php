 
 <?php
$this->load->view('panel/header/header');
?>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
                    <li><a>Modal Ajax</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Modal Ajax List</h2>
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
                            
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">
                              Add New Modal Ajax</span>
                            </button>

                               
                            <div class="panel panel-default">
                               
                                <div class="panel-heading">
                                    <h3 class="panel-title">Modal Ajax List</h3>
                                </div>
                                
                                <div class="panel-body">
                                    
                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Modal Ajax</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="form">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" id="name" class="form-control">
            </div>
             <div class="form-group">
                <label for="">Email</label>
                <input type="email" id="email" class="form-control">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="add" class="btn btn-primary">Add</button>
      </div>
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
      <div class="modal-body">
        <form action="" method="post" id="edit_form">
            <input type="hidden" id="edit_modal_id">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" id="edit_name" class="form-control">
            </div>
             <div class="form-group">
                <label for="">Email</label>
                <input type="email" id="edit_email" class="form-control">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="update" class="btn btn-primary">Update</button>
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
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 
<script type="text/javascript">
   
    $(document).on("click", "#add", function(event) {
       event.preventDefault();
    // alert("test");
       var name = $("#name").val();
       var email = $("#email").val();
    // alert(email);
    if(name == "" || email == ""){
        alert("both field is required");
    }else{
     $.ajax({
        url: "<?=base_url()?>panel/modal_ajax/insert",
        type: "POST",
        dataType: "json",
        data: {name: name, email: email},
        success: function(data){
          //  console.log(data);
          fetch();
            
            if (data.responce == "success"){


          toastr["success"](data.message);
          toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        $('#exampleModal').modal('hide');
         }else{
          toastr["error"](data.message);
          toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
         } 
         }
        }
     });
     }
      $('#form')[0].reset();

    });

    function fetch()
    {
        $.ajax({
            url: "<?= base_url(); ?>panel/modal_ajax/fetch",
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
                tbody += "<td>"+ data[key]['name'] +"</td>";
                tbody += "<td>"+ data[key]['email'] +"</td>";
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
                const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger mr-2'
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, cancel!',
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                $.ajax({
                    url: "<?= base_url()?>panel/modal_ajax/delete",
                    type: "POST",
                    dataType: "json",
                    data: {
                        del_id: del_id
                    },
                    success: function(data){
                        fetch();
                        //console.log(data);
                        if(data.responce == "success"){
                              swalWithBootstrapButtons.fire(
                              'Deleted!',
                              'Your file has been deleted.',
                              'success'
                            ) 
                        }
                    }
                });
             
              } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
              ) {
                swalWithBootstrapButtons.fire(
                  'Cancelled',
                  'Your imaginary file is safe :)',
                  'error'
                )
              }
            })
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
            url: "<?= base_url()?>panel/modal_ajax/edit",
            type: "POST",
            dataType: "json",
            data: {edit_id: edit_id},
            success: function(data){
                //console.log(data);
                if(data.responce == "success"){
                    $("#editModal").modal('show');
                    $("#edit_modal_id").val(data.post.id);
                    $("#edit_name").val(data.post.name);
                    $("#edit_email").val(data.post.email);
                }else{

                }
            }
        });
       }
    });

    $(document).on("click", "#update", function(event){
        event.preventDefault();
        var edit_id = $("#edit_modal_id").val();
        var edit_name = $("#edit_name").val();
        var edit_email = $("#edit_email").val();

        if (edit_id == "" || edit_name == "" || edit_email == "") {
            alert("all field is required");
        }else{
            $.ajax({
                url: "<?= base_url(); ?>panel/modal_ajax/update",
                type: "POST",
                dataType: "json",
                data: {
                    edit_id: edit_id,
                    edit_name: edit_name,
                    edit_email: edit_email
                },
                success: function(data){
                    fetch();
                   // console.log(data);
                   if (data.responce == "success") {
                    $('#editModal').modal('hide');
                     toastr["success"](data.message);
                      toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": false,
                      "progressBar": true,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "5000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    } 
                   }else{
                     toastr["error"](data.message);
                      toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": false,
                      "progressBar": true,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "5000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    } 
                   }
                }
            })
        }
    });

</script>






