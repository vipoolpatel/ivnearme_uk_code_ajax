<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <title>Login - Ivnearme</title>   
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shourtcut icon" type="image/png" href="<?=base_url()?>front/images/favicon.png">
        <link rel="stylesheet" type="text/css" id="theme" href="<?=base_url();?>css/theme-default.css"/>
    </head>
    <body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
				<div style="text-align: center;font-size: 26px; color: #ffffff;margin-bottom: 5px;">Ivnearme</div>
                <div class="login-body">
					
                    <div class="login-title">Login to your account</div>
					<?php if($this->session->flashdata('Message')) { ?>
						<div role="alert" class="alert alert-danger">
							<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?=$this->config->item('Close')?></span></button>
							<?=$this->session->flashdata('Message')?>
						</div>
					<?php } ?>
					
					<?php if($this->session->flashdata('SUCCESSMSGREGISTER')) { ?>
						<div role="alert" class="alert alert-success">
							<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?=$this->config->item('Close')?></span></button>
							<?=$this->session->flashdata('SUCCESSMSGREGISTER')?>
						</div>
					<?php } ?>
                    
                         <?php if (validation_errors()) { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?> 
                    <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="" required="" name="email" placeholder="Email"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" value="" required="" name="password" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="<?=base_url()?>login/forgotpassword" class="btn btn-link btn-block">FORGOT PASSWORD?</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Login</button>
                        </div>
                    </div>
                    
                    <div class="login-subtitle">
                        
                    </div>

                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        @ <?=date('Y')?> ivnearme.co.uk
                    </div>
                  
                </div>
            </div>
            
        </div>

		<!-- START PLUGINS -->
        <script type="text/javascript" src="<?=base_url()?>js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>js/plugins/bootstrap/bootstrap.min.js"></script>                
        <!-- END PLUGINS -->
		
    </body>
</html>






