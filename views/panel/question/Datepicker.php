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
                  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                  <link rel="stylesheet" href="/resources/demos/style.css">
                <ul class="breadcrumb">
                    <li><a>Question</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Question</h2>
                </div>
                <div class="page-content-wrap">

                  <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                            <div class="col-md-4">
                              
							<label>Datepicker:</label> 
							<input type="text" id="datepicker" class="form-control">

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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
    </body>
</html>




  <script>
  $( function() {
    $( "#datepicker" ).datepicker(

    {
      minDate: new Date(2019,10,7),
      maxDate: new Date(2019,11,7)
    }
    );

  } );
  </script>


  <script>
    var disabledDates = ["2019-07-12","2019-07-18","2019-07-21"]
  $( function() {
    $( "#datepicker" ).datepicker(

    {
          beforeShowDay: function(date){

        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);

        return [ disabledDates.indexOf(string) == -1 ]

    }
    }
    );

  } );
  </script>