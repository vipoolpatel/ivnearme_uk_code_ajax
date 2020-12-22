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
                    <li><a>Appointment</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Appointment</h2>
                </div> 

                <div class="page-content-wrap">
                	<div class="row">
                		<div class="col-md-12">
                			<form class="form-horizontal" id="add_app" method="post" accept="" enctype="multipart/form-data">
                			<div class="panel panel-default">
                				<div class="panel-heading">
                					<h3 class="panel-title">Create Appointment</h3>
                				</div>
                				<div class="panel-body">
                					<div class="form-group">
                						<label class="col-md-3 col-xs-12 control-label">
                							Image Upload File Upload
                						</label>
                						<div class="col-md-6 col-xs-12">
                							<div class="">
                								<input type="file" name="photo_image">
                							</div>
                						</div>
                					</div>
                					<div class="form-group">
                						<label class="col-md-3 col-xs-12 control-label">Department</label>
                						<div class="col-md-6 col-xs-12">
                							<div class="">
                								<input type="text" name="department" class="form-control">
                							</div>
                						</div>
                					</div>
                					<div class="form-group">
                						<label class="col-md-3 col-xs-12 control-label">
                							Doctor</label>
                							<div class="col-md-6 col-xs-12">
                								<div class="">
                									<input type="text" name="doctor" class="form-control">
                								</div>
                							</div>
                					</div>

                					<div class="form-group">
                						<label class="col-md-3 col-xs-12 control-label">
                							Name
                						</label>
                						<div class="col-md-6 col-xs-12">
                							<div class="">
                								<input type="text" name="name" class="form-control">
                							</div>
                						</div>
                					</div>

                					<div class="form-group">
                						<label class="col-md-3 col-xs-12 control-label">Phone</label>
                						<div class="col-md-6 col-xs-12">
                						<div class="">
                							<input type="text" name="phone" class="form-control">
                						</div>
                						</div>
                					</div>
                				</div>

                                <div class="panel-footer">
                                        <button class="btn btn-primary pull-right">Submit</button>
                                </div>
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
