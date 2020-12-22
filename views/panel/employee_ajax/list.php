 
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
                    <li><a>Employee Ajax</a></li>
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
                            

                     <div class="alert alert-success" id="alert-success" style="display: none">
                        
                     </div>       
                             <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="modal" data-target="">
                                <i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">
                              Add New Modal Ajax</span>
                            </button>

                               
                            <div class="panel panel-default">
                               
                                <div class="panel-heading">
                                    <h3 class="panel-title">Employee Ajax List</h3>
                                </div>
                                
                                <div class="panel-body">
                                    
                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Employee Name</th>
                                                <th>Address</th>
                                                <th>Created at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                         <tbody id="showdata">
                                            
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Modal Ajax</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="myForm">
          <input type="hidden" name="txtId" value="0">
            <div class="form-group">
                <label for="">Employee Name</label>
                <input type="text" name="txtEmployeeName" class="form-control">
            </div>
             <div class="form-group">
                <label for="">Employee Address</label>
                <textarea type="email" name="txtAddress" class="form-control"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    
        </button>
      </div>
      <div class="modal-body">
      Do you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-primary">Delete</button>
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

   $(function(){
    showAllEmployee();
     //function
     //Add buton
    $('#btnAdd').click(function(){
      // alert("test");
      $('#myModal').modal('show');  
      $('#myModal').find('.modal-title').text('Add New Employee');
      $('#myForm').attr('action', '<?= base_url(); ?>panel/employee_ajax/addEmployee');
    

    });
    // add Save Database
    $('#btnSave').click(function(){
      var url = $('#myForm').attr('action');
      var data = $('#myForm').serialize();
      // form validation
      var employee_name = $('input[name=txtEmployeeName]');
      var address = $('textarea[name=txtAddress]');
      var result = '';
      if(employee_name.val() == ''){
        employee_name.parent().parent().addClass('has-error');  
      }else{
        employee_name.parent().parent().removeClass('has-error');
        result +='1';
      }
      if(address.val() == ''){
        address.parent().parent().addClass('has-error');
      }else{
        address.parent().parent().removeClass('has-error');
        result +='2';
      }
      if(result == '12'){
        //alert('Ok');
        $.ajax({
          type: "ajax",
          method: "POST",
          url: url,
          data: data,
          async: false,
          dataType: "json",
          success: function(response){
          //  showAllEmployee();
          if(response.success){
            $('#myModal').modal('hide');
            $('#myForm')[0].reset(); 

            if(response.type == 'add'){
                var type = 'added'
            }else if(response.type == 'update'){
              var type = "updated"
            }

            $('#alert-success').html('Employee '+type+' successfully.').fadeIn().delay(4000).fadeOut('slow');
            showAllEmployee();
          }else{
            alert('Error');
          }
          },
          error: function(){
            alert('Could not add data');
          }
        });
      }
    });
    //Edit
    $('#showdata').on('click', '.item-edit', function(){
      var id = $(this).attr('data');
      // alert(id);
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Edit Employee');
      $('#myForm').attr('action', '<?= base_url(); ?>panel/employee_ajax/updateEmployee');
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?= base_url(); ?>panel/employee_ajax/editEmployee',
        data:{id: id},
        async: false,
        dataType: 'json',
        success: function(data){
          $('input[name=txtEmployeeName]').val(data.employee_name);
          $('textarea[name=txtAddress]').val(data.address);
          $('input[name=txtId]').val(data.id);
        },
        error: function(){
          alert('Could not Edit Data');
        }
      });
    });

    //delete 
    $('#showdata').on('click', '.item-delete', function(){
      var id = $(this).attr('data');
     $('#deleteModal').modal('show');
     //prevent previous handler
     $('#btnDelete').unbind().click(function(){
      $.ajax({
        type: 'ajax',
        method: 'get',
        async: false,
        url: '<?= base_url(); ?>panel/employee_ajax/deleteEmployee',
        data: {id:id},
        dataType: 'json',
        success: function(response){
          if(response.success){
          $('#deleteModal').modal('hide');
          $('#alert-success').html('Employee Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
          showAllEmployee();
        }else{
          alert('Error');
        }
        },
        error: function(){
          alert('Error Deleting');
        }
      });
     });
    });
    // list database
     function showAllEmployee(){
      $.ajax({
        type: 'ajax',
        url: '<?php echo base_url(); ?>panel/employee_ajax/showAllEmployee',
        async: false,
        dataType: 'json',
        success: function(data){
        //  console.log(data);
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
            html += '<tr>'+
              '<td>'+data[i].id+'</td>'+
              '<td>'+data[i].employee_name+'</td>'+
              '<td>'+data[i].address+'</td>'+
              '<td>'+data[i].created_at+'</td>'+
              '<td>'+
              '<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">Edit</a>'+
              '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'">Delete</a>'+
              '</td>'+
            '</tr>';
        }
        $('#showdata').html(html);
        },
        error: function(){
          alert('Could not get Data From Database');
        }
      });
     }
   });
</script>






