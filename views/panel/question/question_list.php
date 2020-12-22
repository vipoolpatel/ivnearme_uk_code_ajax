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
                              
							<label>Datepicker Hide:</label> 
							<input type="text" id="datepicker" class="form-control">

                             </div>


                              <div class="col-md-4">
                              
							<label>Datepicker</label> 
							<input type="text" id="datepicker1" class="form-control">

                             </div>


                      

                            </div>
                        </div>
                         <div style="clear: both;"></div>
<br/>
<br/>
<br/>

                        <div class="col-md-12">
                            <div class="row">
                            <div class="col-md-4">
                              
							<label>Datepicker Date</label> 
							<input type="text" id="datepicker3" class="form-control">

                             </div>


                              <div class="col-md-4">
                              
							<label>Datepicker Day</label> 
							<input type="text" id="datepicker4" class="form-control">

                             </div>

                             
                      

                            </div>
                        </div>



<div style="clear: both;"></div>
<br/>
<br/>
<br/>
               <div class="col-md-12">
                            <div class="row">
                            <div class="col-md-4">
                              
							<label>Datepicker Date</label> 
							<input type="text" id="datepicker5" class="form-control">

                             </div>


                              <div class="col-md-4">
                              
							<label>Datepicker Day</label> 
							<input type="text" id="datepicker6" class="form-control">

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



    <script type="text/javascript">
/* create an array of days which need to be disabled */
var disabledDays = ["7-18-2019","2-24-2010","2-27-2010","2-28-2010","3-3-2010","3-17-2010","4-2-2010","4-3-2010","4-4-2010","4-5-2010"];

/* utility functions */
function nationalDays(date) {
    var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
    //console.log('Checking (raw): ' + m + '-' + d + '-' + y);
    for (i = 0; i < disabledDays.length; i++) {
        if($.inArray((m+1) + '-' + d + '-' + y,disabledDays) != -1 || new Date() > date) {
            //console.log('bad:  ' + (m+1) + '-' + d + '-' + y + ' / ' + disabledDays[i]);
            return [false];
        }
    }
    //console.log('good:  ' + (m+1) + '-' + d + '-' + y);
    return [true];
}
function noWeekendsOrHolidays(date) {
    var noWeekend = jQuery.datepicker.noWeekends(date);
    return noWeekend[0] ? nationalDays(date) : noWeekend;
}

/* create datepicker */
jQuery(document).ready(function() {
    jQuery('#datepicker4').datepicker({
        
        dateFormat: 'DD, MM, d, yy',
        constrainInput: true,
        beforeShowDay: noWeekendsOrHolidays
    });
});
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


  <script>
  $( function() {
    $( "#datepicker1" ).datepicker();
  } );
  </script>


  <script>
  $( function() {
    $( "#datepicker3" ).datepicker(

    {
      minDate: new Date(2019,10,7),
      maxDate: new Date(2019,10,25)
    }
    );

  } );
  </script>

  <script>
    var disabledDates = ["2019-07-24"]
  $( function() {
      
    $( "#datepicker5" ).datepicker({
        minDate: 0,
        beforeShowDay: function(date){
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [ disabledDates.indexOf(string) == -1 ]
        }
     });
  });
</script>




    </body>
</html>




