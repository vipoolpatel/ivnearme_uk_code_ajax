
 <?php
$this->load->view('panel/header/header');
?>
<style>
    .container{max-width:1170px; margin:auto;}
    img{ max-width:100%;}

    .inbox_msg {
        clear: both;
        overflow: hidden;
    }




    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {

        margin: 0;
        padding: 18px 16px 10px;
    }
    .inbox_chat { height: 550px; overflow-y: scroll;}

    .active_chat{ background:#ebebeb;}

    .incoming_msg_img {
        display: inline-block;
        width: 6%;
    }
    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }
    .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }
    .time_date {
        color: #747474;
        display: block;
        font-size: 12px;
        margin: 8px 0 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
        float: left;
        padding: 30px 15px 0 25px;
        width: 100%;
    }

    .sent_msg p {
        background: #05728f none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0; color:#fff;
        padding: 5px 10px 5px 12px;
        width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
        float: right;
        width: 46%;
    }
    .input_msg_write input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 15px;
        min-height: 48px;
        width: 100%;
    }

    .type_msg {border-top: 1px solid #c4c4c4;position: relative;margin-top: 20px;}
    .msg_send_btn {
        background: #05728f none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 0;
        top: 11px;
        width: 33px;
    }
    .messaging { padding: 0 0 50px 0;}

</style>
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
                        <?php if ($this->session->flashdata('SUCCESS')) { ?>
                            <div role="alert" class="alert alert-success">
                                <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?= $this->config->item('Close') ?></span></button>
                                <?= $this->session->flashdata('SUCCESS') ?>
                            </div>
                        <?php } ?>



                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Contact Detail</h3>
                            </div>
                            <div class="panel-body">
                                <div class="ibox-content">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <p><b>Subject:</b> <?=$getSupport->subject?></p>
                                            <p><b>Message:</b> <?=$getSupport->message?></p>
                                        </div>
                                    </div>
                                    <div style="clear: both"></div>
                                    <hr>
                                    <div style="clear: both"></div>

                                         <div class="messaging">
					                    <div class="inbox_msg">
												<div class="mesgs">
					                           
					                                <?php
					                                foreach ($getSupportReply as $value) {

					                                    if ($value->status == 0) {
					                                        ?>

					                                        <div class="incoming_msg">
					                                            <div class="received_msg">
					                                                <div class="received_withd_msg" style="margin-bottom: 10px;">
					                                                    <p><?= $value->message ?></p>
					                                                    <span class="time_date"><?= date('d-m-Y h:i A', strtotime($value->created_date)); ?></span></div>
					                                            </div>
					                                        </div>
					                                    <?php } else {
					                                        ?>


													        <div class="outgoing_msg">
													            <div class="sent_msg">
													                <p><?= $value->message ?></p>
													                <span class="time_date"><?= date('d-m-Y h:i A', strtotime($value->created_date)); ?></span> </div>
																        </div>
																    <?php } ?>
																<?php }
																?>

					                             
					                             <?php 
					                            if($getSupport->status == 0)
					                            {
					                            ?>
					                            <div class="type_msg">
					                                <form action="<?=base_url()?>panel/support/submitreply" method="post">
					                                    <input type="hidden" value="<?=$getSupport->id?>" name="id" />
					                                <div class="input_msg_write">
					                                    <input type="text" class="write_msg" name="message" required="" placeholder="Type a message" />
					                                    <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
					                                </div>
					                                </form>
					                            </div>
					                              <?php } 
					                            else { ?>
					                            <hr />
					                            <h2 style="text-align: center;">Contact Support Closed</h2>
					                           <?php }
					                            ?>
					                        </div>
					                    </div>
					                </div>


                                </div>

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