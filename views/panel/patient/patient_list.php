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
                             <a href="<?=base_url()?>panel/patient/add_patient" class="btn btn-primary" title="Add New Patient"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Patient</span></a>
                                <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Patient Search</h3>
                                </div>
                                
                                    <!--  Search Box  Start -->
                                 <div class="panel-body">

                                    <form action="" method = "get">
                               <div class="col-md-3">
                                <label>Patient  ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id'))?$this->input->get('id'):''?>" class="form-control" placeholder="Patient ID" name="id"/>
                                </div>
                                <div class="col-md-3">
                                <label>Patient Name</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('name'))?$this->input->get('name'):''?>" placeholder="Patient Name" name="name"/>
                                </div>
                                <div class="col-md-3">
                                <label>Start Date</label>
                                <input type="text" class="form-control datepicker" value="<?=!empty($this->input->get('start_date'))?$this->input->get('start_date'):''?>" placeholder="Start Date" name="start_date"/>
                                </div>
                                <div class="col-md-3">
                                <label>End Date</label>
                                <input type="text" class="form-control datepicker1"  value="<?=!empty($this->input->get('end_date'))?$this->input->get('end_date'):''?>" placeholder="End Date" name="end_date"/>
                                </div>
                                <div style="clear: both;"></div>
                                <br />
    
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                    <a href="<?=base_url()?>panel/patient/patient_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div> 
                         <!-- Search Box  End -->
                            </div>
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
                                        <tbody>
                                            <?php
                                            if(!empty($getPatient))
                                            { 
                                                foreach ($getPatient as $value) {
                                                ?>
                                                    <tr>
                                                        <td><?=$value->id?></td>
                                                        <td><?=$value->name?></td>
                                                        <td><?=$value->email?></td>



                                         <td>
           <?php
        if ($value->user_status == 1) {
                    ?>
      <a href="<?=base_url()?>panel/patient/update_client_states/<?php echo $value->id; ?>/0" title="Changed Client Status" class="btn btn-default btn-sm"><i style="color: green;" class="fa fa-fw fa-check"></i></a>
      <?php
    } elseif ($value->user_status == 0) {
                ?>
     <a href="<?=base_url()?>panel/patient/update_client_states/<?php echo $value->id; ?>/1" title="Changed Client Status" class="btn btn-default btn-sm"><i style="color: red;" class="fa fa-fw fa-times"></i></a>
                                      <?php
                                    }
                                            ?>
                                </td>




                                                        <td><?=$value->phone?></td>
                                                        <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>
                                                        <td>
                                                            <a class="btn btn-success" href="<?=base_url()?>panel/patient/view_patient/<?=$value->id?>" ><span class="fa fa-eye"></span></a>
                                                            <a class="btn btn-primary" href="<?=base_url()?>panel/patient/edit_patient/<?=$value->id?>" ><span class="fa fa-pencil"></span></a>
                                                            <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/patient/delete_patient/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
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






