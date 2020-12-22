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
                    <li><a>Excel Import</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Upload Excel Import Postcode UK</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Upload Excel Import Postcode UK</h3>
                                    </div>

                                    <div class="panel-body">

                                        
                                

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Upload  Excel Import <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="result_file" required  type="file" />
                                                    <br />
                                                    <a href="<?=base_url()?>img/upload _excel/postcodes.csv">Demo Download</a>
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
