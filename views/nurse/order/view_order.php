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
                    <li><a >Order Detail </a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Order Detail List</h2>
                </div> 

                 <div class="page-content-wrap">
                    <div class="row">
                         <div class="col-md-12">
                           <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Patient Information</h3>
                                </div>
                                <div class="panel-body">
                                    
                                    <div class="col-md-6">
                                    <div class="col-md-2">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getUser->name?>
                                    </div>
                                    <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Last Name</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getUser->lname?>
                                    </div>
                                    
                                    <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Phone No</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getUser->phone?>
                                    </div>
                                     <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getUser->street_address?>
                                    </div>
                                      <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Zip Code</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getUser->zipcode?>
                                    </div>

                                    </div>

                                      <div class="col-md-6">
                                        <div class="col-md-2">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getUser->email?>
                                    </div>
                                    
                                    <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Company</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getUser->company?>
                                    </div>
                                    <div style="clear: both"></div>
                                    <br />
                                      <div class="col-md-2">
                                        <label>Country</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getUser->country?>
                                    </div>
                                    <div style="clear: both"></div>
                                    <br />
                                     <div class="col-md-2">
                                        <label>City</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getUser->city?>
                                    </div>
                                    <div style="clear: both"></div>
                                    <br />
                                     <div class="col-md-2">
                                        <label>Comment</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getUser->comment?>
                                    </div>
                                    <div style="clear: both"></div>
                                    <br />
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                        
                         <div class="col-md-12">
                           <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Order Information</h3>
                                </div>
                                <div class="panel-body">
                                    
                                    <div class="col-md-6">
                                    <div class="col-md-2">
                                     <label>Name</label>
                                    </div>
                                    <div class="col-md-10">
                                       <?=$getUser->name?>
                                    </div>
                                    <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                     <label>Total</label>
                                    </div>
                                    <div class="col-md-10">
                                        &pound;<?=$getOrder->total?>
                                    </div>
                                    <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Payment Type</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getOrder->payment_type?>
                                    </div>
                                    
                                    
                                    
                                    </div>
                                      <div class="col-md-6">
                                    <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control ChangeStatus" style="width: 150px;" id="<?=$getOrder->id?>">
                                           <option <?=($getOrder->status == 0)?'selected':''?> value="0"  >Pending</option>
                                           <option <?=($getOrder->status == 1)?'selected':''?> value="1" >Processing</option>
                                           <option <?=($getOrder->status == 2)?'selected':''?> value="2" >Complete</option>
                                           <option <?=($getOrder->status == 3)?'selected':''?> value="3" >Cancel</option>
                                       </select>
                                    </div>
                                   
                                 
                                      </div>

                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                        
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Order Item List</h3>
                                </div>
                                <div class="panel-body">
                                    
                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                            
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($getRecord))
                                            { 
                                                $total_qty = 0;
                                                $total = 0;
                                                $total_p = 0;
                                                foreach ($getRecord as $value) {
                                                     $total_qty = $total_qty + $value->qty;
                                                     $total = $total + $value->subtotal;
                                                     $total_p = $total_p + $value->price;
                                                ?>
                                                    <tr>
                                                     
                                                        <td><?=$value->title?></td>
                                                        <td>&pound; <?=$value->price?></td>
                                                        <td><?=$value->qty?></td>
                                                        <td>&pound; <?=$value->subtotal?></td>
                                                    </tr>
                                                
                                            <?php  } ?>
                                            
                                                    <tr>
                                                        <th>Total</th>
                                                        <th>&pound; <?=$total_p?></th>
                                                        <th><?=$total_qty?></th>
                                                        <th>&pound; <?=$total?></th>
                                                    </tr>
                                            
                                            
                                            <?php }
                                            else{ ?>
                                            <tr><td colspan="100%">No record found.</td></tr>
                                             <?php }
                                            ?>
                                        </tbody>
                                    </table>    
                                      
                                </div>
                                 <div class="panel-footer">
                                        <a href="<?=base_url();?>panel/order/pending/<?=$getOrder->status?>" class="btn btn-primary pull-right">Back</a>
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
    
    
           <script type="text/javascript">
               
            $('.ChangeStatus').change(function(){
                var id = $(this).attr('id');
                var value = $(this).val();
                $.ajax({
                        type:'POST',
                        url:"<?=base_url()?>panel/order/ChangeStatus",
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