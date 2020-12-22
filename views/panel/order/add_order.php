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
                <li><a >Order</a></li>
            </ul>
            <div class="page-title">
                <h2><span class="fa fa-arrow-circle-o-left"></span> Create Order</h2>
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

                        <form class="form-horizontal"   id="add_app" method="post" action="<?=base_url()?>panel/order/add_to_cart" enctype="multipart/form-data">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Prodcut</h3>
                                </div>
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Product <span style="color: #ff0000">*</span></label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="">
                                                <select name="product_id" id="" class="form-control" required>
                                                    <option value="">Select Product</option>
                                                    <?php
                                                    foreach ($getProduct as $row4) {
                                                        ?>
                                                    <option value="<?= $row4->id ?>"><?= $row4->title ?> (&pound; <?=$row4->price ?>)</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Qty <span style="color: #ff0000">*</span></label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="text" class="form-control" name="qty" required="">
                                        </div>
                                    </div>

                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-primary pull-right">Add To Cart</button>
                                </div>
                            </div>
                        </form>
                        <!-- Cart List Start -->
                        <form class="form-horizontal" id="add_app" method="post" action="<?=base_url()?>panel/order/submit_order" enctype="multipart/form-data">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Cart List</h3>
                                </div>

                                <div class="panel-body">

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Patient Name <span style="color: #ff0000">*</span></label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="">
                                                <select name="user_id" id="" class="form-control" required>
                                                    <option value="">Select Patient Name</option>
                                                    <?php
                                                    foreach ($getPatient as $row) {
                                                        ?>
                                                        <option value="<?= $row->id ?>"><?= $row->name ?></option>
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
                                                    foreach ($getNurse as $row1) {
                                                        ?>
                                                        <option value="<?= $row1->id ?>"><?= $row1->name ?></option>
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
                                                    <option value="0">Pending</option>
                                                    <option value="1">Processing</option>
                                                    <option value="2">Complete</option>
                                                    <option value="3">Cancel</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>

                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Description </th>
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
                                                    <img style="height: 100px;" src="<?=base_url()?>img/product/<?=$items['id']?>/<?=$getPro->product_image?>" >
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
                                                <td>&pound;<?=$items['subtotal']?></td>

                                                <td>
                                                    <a class="btn btn-danger" href="<?=base_url()?>panel/order/remove_cart/<?=$items['rowid']?>"><span class="fa fa-trash-o"></span></a>
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
                                   <?php
                                            if(!empty($this->cart->contents()))
                                            {
                                            ?>
                                <div class="panel-footer">
                                    <button class="btn btn-primary pull-right">Submit</button>
                                </div>
                                            <?php } ?>
                            </div>
                        </form>

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
