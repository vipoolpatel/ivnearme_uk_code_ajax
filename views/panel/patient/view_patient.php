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
                    <li><a >Patient</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> View Patient</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">View Patient</h3>
                                    </div>

                                    <div class="panel-body">  
                                     <div class="col-md-6">
                                    <div class="col-md-2">
                                        <label>Patient Id</label>
                                    </div>
                                    <div class="col-md-10">
                                         <?=$getRecord->id?>
                                    </div>
                                    <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-md-10">
                                         <?=$getRecord->name?>
                                    </div>
                                     <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Last name</label>
                                    </div>
                                    <div class="col-md-10">
                                       <?=$getRecord->lname?>
                                    </div>
                                    <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-10">
                                         <?=$getRecord->email?>
                                    </div>
                                     <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-10">
                                         <?=$getRecord->phone?>
                                    </div>
                                     <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Company</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getRecord->company?>
                                    </div>
                                     <div style="clear: both"></div>
                                    <br />
                                     <div class="col-md-2">
                                        <label>User Status</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getRecord->user_status?>
                                    </div>

                                    </div>

                                    <div class="col-md-6">
                                   
                                    
                                    <div class="col-md-2">
                                        <label>Country</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getRecord->country?>
                                    </div>
                                      <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Street Address</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getRecord->street_address?>
                                    </div>
                                     <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>City</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getRecord->city?>
                                    </div>
                                    
                                    <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Zip Code</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getRecord->zipcode?>
                                    </div>
                                     <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Comment</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getRecord->comment?>
                                    </div>
                                      <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Created Date</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getRecord->created_date?>
                                    </div>
                                     
                                    </div>
                                        
                                    </div>
                                    <div class="panel-footer">
                                        <a href="<?=base_url();?>panel/patient/patient_list" class="btn btn-primary pull-right">Back</a>
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






