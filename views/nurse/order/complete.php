 <?php
$this->load->view('nurse/header/header');
?>
    <body>
        <div class="page-container">
            <?php
            $this->load->view('nurse/header/sidebar');
            ?>
            <div class="page-content">
                <?php
                $this->load->view('nurse/header/top_header');
                ?>
                <ul class="breadcrumb">
                    <li><a >Order</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Complete Order List</h2>
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
                                    <h3 class="panel-title">Complete Order Search</h3>
                                </div>
                                <div class="panel-body">
                                    
                                         <!-- Search Box Strat -->
                                   <form action="" method="get">
                                    <div class="col-md-3">
                                        <label for="">Order Id</label>
                                        <input type="text" name="id" value="<?=!empty($this->input->get('id'))? $this->input->get('id'):''?>" class="form-control" placeholder="Order ID" />
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Patient Name</label>
                                        <input type="text" name="name" value="<?=!empty($this->input->get('name'))? $this->input->get('name'):''?>" placeholder="Patient Name" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Start Date</label>
                                        <input type="text" name="start_date" value="<?=!empty($this->input->get('start_date'))? $this->input->get('start_date'):''?>" placeholder="Start Date" class="form-control datepicker">
                                    </div>
                                   <div class="col-md-3">
                                          <label>End Date</label>
                                          <input type="text" class="form-control datepicker1"  value="<?=!empty($this->input->get('end_date'))?$this->input->get('end_date'):''?>" placeholder="End Date" name="end_date"/>
                                    </div>
                                     <div style="clear: both;"></div>
                                    <br />
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary" name="" value="Search" />
                                        <a href="<?=base_url(); ?>nurse/order/complete/2" class="btn btn-success">Reset</a>
                                    </div>
                                       
                                   </form>
                                    <!-- Search Box End --> 
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Complete Order List</h3>
                                </div>
                                <div class="panel-body">
                                    
                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Patient Name</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($getOrder))
                                            { 
                                                foreach ($getOrder as $value) {
                                                ?>
                                                    <tr>
                                                        <td><?=$value->id?></td>
                                                        <td><?=$value->name?></td>
                                                        <td>&pound;<?=$value->total?></td>
                                                        <td>
                                                            <select class="form-control ChangeStatus" style="width: 150px;" id="<?=$value->id?>">
                                                                <option <?=($value->status == 0)?'selected':''?> value="0"  >Pending</option>
                                                                <option <?=($value->status == 1)?'selected':''?> value="1" >Processing</option>
                                                                <option <?=($value->status == 2)?'selected':''?> value="2" >Complete</option>
                                                                <option <?=($value->status == 3)?'selected':''?> value="3" >Cancel</option>
                                                            </select>
                                                        </td>
                                                        <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>
                                                        <td>
                                                            <a class="btn btn-success" href="<?=base_url()?>nurse/order/view_order/<?=$value->id?>" ><span class="fa fa-eye"></span></a>
                                                           
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
$this->load->view('nurse/header/footer');
?>     
        <script type="text/javascript">
                $('.table').delegate('.ChangeStatusNurse','change', function(){
                var id = $(this).attr('id');
                var value = $(this).val();
                $.ajax({
                        type:'POST',
                        url:"<?=base_url()?>nurse/order/ChangeStatusNurse",
                        data: {value: value,id:id},
                        dataType: 'JSON',
                        success:function(data){
                            alert('Nurse successfullt changed!');
                            location.reload();
                        }
                 });
            });
            
            $('.table').delegate('.ChangeStatus','change', function(){
                var id = $(this).attr('id');
                var value = $(this).val();
                $.ajax({
                        type:'POST',
                        url:"<?=base_url()?>nurse/order/ChangeStatus",
                        data: {value: value,id:id},
                        dataType: 'JSON',
                        success:function(data){
                            alert('Status successfullt changed!');
                            location.reload();
                        }
                 });
            });
            
        </script>
    </body>
</html>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function(){
        $(".datepicker").datepicker();
        $(".datepicker1").datepicker();
    });
</script>





