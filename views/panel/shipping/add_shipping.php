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
                <li><a href="">Shipping</a></li>
            </ul>
            <div class="page-title">
                <h2><span class="fa fa-arrow-circle-o-left"></span>Create Shipping</h2>
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
                        <form class="form-horizontal" id="add_app" method="post" action="<?=base_url();?>panel/shipping/add_to_cart" enctype="multipart/form-data">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Product</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Product<span style="color: #ff0000;">  *</span></label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="">
                                                <select name="product_id" id="" class="form-control" required>
                                                    <option value="">Select Product</option>
                                                    <?php
                                                    foreach ($getProduct as $value) {
                                                    ?>
                                                    <option value="<?=$value->id?>"><?=$value->title?> (&pound; <?=$value->price?>)</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Qty<span style="color: #ff0000;">  *</span> </label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="">
                                                <input type="text" class="form-control" name="qty" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-primary pull-right">Add To Cart</button>
                                </div>
                            </div>
                        </form>
                        <!-- cart list start -->
            <form class="form-horizontal" id="add_app" method="post" action="<?=base_url();?>panel/shipping/submit_shipping" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cart List</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Patient Name<span style="color: #ff0000;">  *</span></label>
                              <div class="col-md-6 col-xs-12">
                                            <div class="">
                                                <select name="user_id" id="" class="form-control" required>
                                                    <option value="">Select Patient Name</option>
                                                    <?php
                                                    foreach ($getPatient as $row) {
                                                    ?>
                                                        <option value="<?=$row->id?>"><?=$row->name?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Assign Nurse </label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="">
                                                <select name="nurse_id" id="" class="form-control" >
                                                    <option value="">Select Nurse</option>
                                                        <?php
                                                        foreach ($getNurse as $val) {
                                                        ?>
                                                        <option value="<?=$val->id?>"><?=$val->name?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Status <span style="color: #ff0000">*</span></label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="">
                                                <select name="status" id="" class="form-control" required>
                                                    <option value="">Select Status</option>
                                                    <option value="0">Hold</option>
                                                    <option value="1">Denied</option>
                                                    <option value="2">Expired</option>
                                                    <option value="3">Failed</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          if(!empty($this->cart->contents()))
                                            {
                                            ?>
                                            <?php foreach ($this->cart->contents() as $items) {

                                                $getPro = $this->db->where('id',$items['id']);
                                                $getPro = $this->db->get('product')->row();
                                                ?>
                                            <tr>
                                              <td>
                                                <img style="height: 100px;" src="<?=base_url()?>img/product/<?=$items['id']?>/<?=$getPro->product_image?>">
                                              </td>
                                              <td>
                                                <?=$getPro->title?>
                                              </td>
                                              <td>
                                                <?=$getPro->description?>
                                              </td>
                                               <td>&pound;<?=$items['price']?></td>
                                              <td>
                                                <?=$items['qty']?>
                                              </td>
                                              <td>
                                                &pound;<?=$items['subtotal']?>
                                              </td>
                                              <td>
                                                    <a class="btn btn-danger" href="<?=base_url()?>panel/shipping/remove_cart/<?=$items['rowid']?>"><span class="fa fa-trash-o"></span></a>
                                                </td>
                                              </tr>
                                               <?php }
                                               }
                                               else {
                                                   ?>
                                               <tr>
                                                   <td colspan="100%">Cart empty!</td>
                                               </tr>
                                               <?php
                                               }
                                               ?>
                                           </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                        </form>

                        <!-- cart list end -->

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
