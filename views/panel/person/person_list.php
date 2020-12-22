<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


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
                    <li><a >Patient</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Patient List</h2>
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
                             
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="createModal">
							Add Record
							</button>
                            <div class="panel panel-default">
                               
                                <div class="panel-heading">
                                    <h3 class="panel-title">Patient List</h3>
                                </div>
                                
                                <div class="panel-body">
                                    
                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Patient ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                 <th>User Status</th>
                                                <th>Phone Number </th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                      
                                    </table>    
                                       <!-- <?php echo $this->pagination->create_links ();?> -->
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

<form id="createForm">
		<!-- Modal -->
		<div class="modal fade" id="createModal" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Add Record</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">×</span>
		        </button>
		      </div>
		      <div class="modal-body">

		        
		        	<div class="form-group">
					    <label>Name</label>
					    <input type="text" class="form-control" placeholder="Name here" name="name">
					 </div>
					 <div class="form-group">
					    <label>Message</label>
					    <input type="text" class="form-control" placeholder="Message Here" name="message">
					 </div>
					 <div class="form-group">
					    <label>Age</label>
					    <input type="number" class="form-control" placeholder="Age Here" name="age">
					 </div>
		       
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save</button>
		      </div>
		    </div>
		  </div>
		</div>
		 </form>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<script type="text/javascript">
	$(document).ready(function(){
		$('#example1').DataTable();
	});
	</script>

	<script type="text/javascript">

		$("#createForm").submit(function(event) {
			event.preventDefault();
			$.ajax({
		            url: "<?php echo base_url('my_controller/create'); ?>",
		            data: $("#createForm").serialize(),
		            type: "post",
		            async: false,
		            dataType: 'json',
		            success: function(response){
		              
		                $('#createModal').modal('hide');
		                $('#createForm')[0].reset();
		                alert('Successfully inserted');
		               $('#exampleTable').DataTable().ajax.reload();
		              },
		           error: function()
		           {
		            alert("error");
		           }
          });
		});
	</script>





