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
                    <li><a >Dashboard</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Dashboard</h2>
                </div>
                <div class="page-content-wrap">

                  <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                          
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>            
        </div>
<?php
$this->load->view('nurse/header/footer');
?>     

    </body>
</html>






