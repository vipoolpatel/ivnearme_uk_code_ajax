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
                    <li><a >Subscribe</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Subscribe List</h2>
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
                                    <h3 class="panel-title">Subscribe Search</h3>
                                </div>
                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                               <form action="" method = "get">
                               <div class="col-md-3">
                                <label>Subscribe  ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id'))?$this->input->get('id'):''?>" class="form-control" placeholder="Subscribe ID" name="id"/>
                                </div>
                                <div class="col-md-3">
                                <label>Subscribe Email</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('email'))?$this->input->get('email'):''?>" placeholder="Subscribe Email" name="email"/>
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
                                    <a href="<?=base_url()?>panel/subscribe/subscribe_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Subscribe List</h3>
                                </div>
                                <div class="panel-body">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Subscribe ID</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Created Date</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($getSubscribe))
                                            {
                                                foreach ($getSubscribe as $value) {
                                                ?>
                                                    <tr>
                                                        <td><?=$value->id?></td>

                                                        <td><?=$value->email?></td>



<td>
<select class="form-control ChnageStageStatus" id="<?=$value->id?>"  style="width: 150px;">

      <option value="">Select Statue</option>
      <option <?=($value->status == 0) ? 'selected' : ''?> value="0">No</option>
      <option <?=($value->status == 1) ? 'selected' : ''?> value="1">Yes</option>

</select>
</td>



                                                        <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>

                                                        <td>

                                                            <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/subscribe/delete_subscribe/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
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
        
      $('.ChnageStageStatus').change(function(){
          var id  = $(this).attr('id');
          var value  = $(this).val();
          $.ajax({
              type:'POST',
              url:"<?=base_url()?>panel/subscribe/ChnageStageStatus",
              data: {id: id,value:value},
              dataType: 'JSON',
              success:function(data){
                  alert('Stage successfully change!');
              }
     });
    });

//    $( ".datepicker" ).datepicker();
//
// $( ".datepicker1" ).datepicker();

});

</script>
