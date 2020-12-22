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
                    <li><a>Support</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Support List</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="<?=base_url()?>panel/support/support_list?id=0" class="btn btn-primary"><span class="bold">Open</span></a>
        <a href="<?=base_url()?>panel/support/support_list?id=1" class="btn btn-primary"><span class="bold">Closed</span></a>
                            <?php if ($this->session->flashdata('SUCCESS')) { ?>
                                <div role="alert" class="alert alert-success">
                                    <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?=$this->config->item('Close')?></span></button>
                                    <?= $this->session->flashdata('SUCCESS') ?>
                                </div>
                            <?php } ?>
                          
                          
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Support List</h3>
                                </div>
                                <div class="panel-body">
                                    
                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Support ID</th>
                                                <th>Nurse Name</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Status</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($getSupport))
                                            { 
                                                foreach ($getSupport as $value) {
                                                ?>
                                                    <tr>
                                                        <td><?=$value->id?></td>
                                                        
                                                        <td><?=$value->name?></td>
                                                        <td><?=$value->subject?></td>
                                                        <td><?=$value->message?></td>
                                                      <td>
                                                            <select class="form-control ChangeStatus" id="<?=$value->id?>">
                                                                <option <?=($value->status == 0)?'selected':''?> value="0">Open</option>
                                                                <option <?=($value->status == 1)?'selected':''?> value="1">Close</option>
                                                                
                                                            </select>
                                                        </td>
                                                                                                           
     
                                                        <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>
                                                       <td>
                                <a href="<?=base_url();?>panel/support/reply/<?=$value->id?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>                                                
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


<script type="text/javascript">
    $('.ChangeStatus').change(function(){
        var status = $(this).val();
        var id = $(this).attr('id');
       $.ajax({
        type:'POST',
                    url:"<?=base_url()?>panel/support/update_support_status",
        data: {status: status,id:id},
        dataType: 'JSON',
        success:function(data){
                    alert('Status successfully changed!')
        }
     }); 
    });

</script>
        

