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
                    <li><a>Simple Form</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Simple Form List</h2>
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
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Simple Form List</h3>
                                </div>
                                <div class="panel-body">
                                    <table  class="table table-striped table-bordered table-hover" id="data_table">
                                        <thead>
                                            <tr>
                                                <th>No#</th>
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Last Name</th>
                                                <th>Age</th>
                                                <th>Relationship</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                            <tr>
                                              <td>1</td>
                                              <td>Maria</td>
                                              <td>frame</td>
                                              <td>Vipuld</td>
                                              <td>1</td>
                                              <td>Bhai</td>
                                            </tr>
                                            
                                         </tbody>
                                    </table>    
                                       
                                </div>
                            </div>



                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Simple Form Add</h3>
                                </div>
                                <form action="" method="post">
<div class="panel-body">
   <div class="col-md-12">
     <div class="col-md-1">
       No.
       <input type="text" class="form-control text-right" id="no" readonly>
     </div>
       <div class="col-md-2">
       First Name.
       <input type="text" class="form-control" id="firstname">
     </div>
       <div class="col-md-3">
       Middle Name.
       <input type="text" class="form-control" id="middlename">
     </div>
     <div class="col-md-3">
       Last Name.
       <input type="text" class="form-control" id="lastname">
     </div>
      <div class="col-md-1">
       Age.
       <input type="text" class="form-control text-right" id="age">
     </div>
      <div class="col-md-2">
       Relationship.
       <input type="text" class="form-control" id="relationship">
     </div>
   </div> 
</div>
<div class="panel-body">
  <div class="col-md-12">
    <input type="button" class="btn btn-primary" id="add_data" value="Add Data To Table">
    <input type="button" class="btn btn-success" id="save" value="Add Data To Database">
  </div>
</div>
</form>
                            </div>


                        </div>
                    </div>
                </div>     
            </div>            
        </div>


        <!-- Button trigger modal -->





  <?php
    $this->load->view('panel/header/footer');
  ?>     

    </body>
</html>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
$(function () {

  //set number for adding row
  var set_number = function()
    {
      var table_len = $('#data_table tbody tr').length+1;
      $('#no').val(table_len);
    }
    set_number();

    $('#add_data').click(function(){
      var no = $('#no').val();
      var firstname = $('#firstname').val();
      var middlename = $('#middlename').val();
      var lastname = $('#lastname').val();
      var age = $('#age').val();
      var relationship = $('#relationship').val();

      //append input to table
      $('#data_table tbody:last-child').append(
          '<tr>'+
          '<td>'+no+'</td>'+
          '<td>'+firstname+'</td>'+
          '<td>'+middlename+'</td>'+
          '<td>'+lastname+'</td>'+
          '<td>'+age+'</td>'+
          '<td>'+relationship+'</td>'+
          '</tr>'
          
        );

      // clear input data

      $('#no').val('');
      $('#firstname').val('');
      $('#middlename').val('');
      $('#lastname').val('');
      $('#age').val('');
      $('#relationship').val('');

      //call the function to set new number...:D
      set_number();
    });

    $('#save').click(function(){
      var table_data = [];
      //we will use .each to get all the data
      $('#data_table tr').each(function(row,tr){
        //I Create an array again to store all the data per row

        // Get only the data with value--
        if($(tr).find('td:eq(0)').text() == "")
        {

        }else
        {

        var sub = {
          'no' : $(tr).find('td:eq(0)').text(),
          'firstname' : $(tr).find('td:eq(1)').text(),
          'middlename' : $(tr).find('td:eq(2)').text(),
          'lastname' : $(tr).find('td:eq(3)').text(),
          'age' : $(tr).find('td:eq(4)').text(),
          'relationship' : $(tr).find('td:eq(5)').text()
        };
  
          table_data.push(sub);

    }
      });
      // lets check via console
     // console.log(table_data); 

     // lets use ajax to insert the data to database..
     // with sweetalert fanction also  for  message pop up
     swal({
      title: 'Save Table Data in Database? ',
      text: '',
      type: '',
      showLoaderOnConfirm: true,
      showCancelButton: true,
      confirmButtonText: 'Yes',
      closeOnConfirm: false },
      function(){
        var data = { 'data_table' : table_data };
        $.ajax({
          data : data,
          type: 'POST',
          url: '<?php echo base_url(); ?>panel/simpleform/save',
          crossOrigin: false,
          dataType: 'json',
          success: function(result){
            console.log(result.check)
          }
        });

     });
    });
});
   
</script>






