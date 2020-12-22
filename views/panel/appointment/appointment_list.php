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
                    <li><a >Appointment</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Appointment List</h2>
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
                            <a href="<?=base_url()?>panel/appointment/add_appointment" class="btn btn-primary" title="Add  New Appointment"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Appointment</span></a>
                              <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h3 class="panel-title">Appointment Search</h3>
                                </div>
                                <div class="panel-body">
                                      <!--  Search Box  Start -->
                                 <div class="panel-body">

                               <form action="" method = "get">
                               <div class="col-md-3">
                                <label>Appointment  ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id'))?$this->input->get('id'):''?>" class="form-control" placeholder="Appointment ID" name="id"/>
                                </div>
                                <div class="col-md-3">
                                <label>Doctor Name</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('name'))?$this->input->get('name'):''?>" placeholder="Doctor Name" name="name"/>
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
                                    <a href="<?=base_url()?>panel/appointment/appointment_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div> 
                         <!-- Search Box  End -->
                                   
                                </div>
                            </div>
                            <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h3 class="panel-title">Appointment List</h3>
                                </div>
                                <div class="panel-body">
                                    
                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Appointment ID</th>
                                                <th>Department</th>
                                                <th>Doctor</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($getAppointment))
                                            { 
                                                foreach ($getAppointment as $value) {
                                                ?>
                                                    <tr>
                                                        <td><?=$value->id?></td>
                                                        
                                                        <td><?=$value->department?></td>
                                                        <td><?=$value->doctor?></td>
                                                        <td><?=$value->name?></td>
                                                        <td><?=$value->phone?></td>
                                                        
                                                        <td>
                                                            
                                                            <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/appointment/delete_appointment/<?=$value->id?>"><span class="fa fa-trash-o"></span></a>
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





