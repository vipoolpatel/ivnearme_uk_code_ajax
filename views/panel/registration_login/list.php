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
                <li><a>Registration Login</a></li>
            </ul>
            <div class="page-title">
                <h2><span class="fa fa-arrow-circle-o-left"></span> Registration Login Add in Database</h2>
            </div>
<!-- Username will be printed here when user logs in -->
            <div>
                <?php echo $this->session->userdata('username'); ?>
            </div>
            <!-- Registration Start -->
            
            <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="error" id="logerror"></div>
                            <form class="form-horizontal" id="form-user" method="post" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Registration</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12  control-label">Username</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="username" type="text" id="username" placeholder="Username" class="form-control" />
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Email</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="email" id="email" type="email" placeholder="email@gmail.com" class="form-control" />
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Password</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input type="password" id="password" class="form-control" name="password" placeholder="Password" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="panel-footer">
                                        <button class="btn btn-primary pull-right" type="submit"> Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>                    

                </div>  

                <!-- Registration End -->

                <!-- Login Start -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" id="form-log" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Login</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Username</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="username" id="usernameLogin" type="text" placeholder="Username" class="form-control" />
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Password</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input type="password" class="form-control" id="passwordLogin" name="password" placeholder="Password" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="panel-footer">
                                        <button class="btn btn-primary pull-right" id="login" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>                    

                </div>  
                <!-- Login End -->
                <!-- Logout Start -->
                <div class="panel-footer">
                    <button class="btn btn-danger" id="logout">Log Out</button>
                </div>
                <!-- Logout End -->

        </div>
    </div>

<?php
    $this->load->view('panel/header/footer');
?>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){

        // Registration Start
        $('#form-user').submit(function(event){
            event.preventDefault();
            var username = $("input#username").val();
            var email    = $("input#email").val();
            var password = $("input#password").val();

            $.ajax({
                url:"<?=base_url();?>panel/registration_login/create_member",
                type: "POST",
                data: {username: username, email: email, password: password},
                success: function(data){
                    if(data == 1){
                        alert("You Are now registered");
                    }else{
                        alert("error");
                    }
                }
            });
        });
        // Registration End

        // Login Start
        $("#login").click(function(event){
            event.preventDefault();
           
 
            var username     = $("input#usernameLogin").val();
            var password     = $("input#passwordLogin").val();
           // alert(username);
            $.ajax({
                type: "POST",
                url:"<?=base_url();?>panel/registration_login/login",
                data: {name: username, pass: password},
                success: function(data){
                    if(data == 1){
                        alert("logged in successfully");
                        location.reload(true);
                    }else{
                        alert("Incorrect Name or Password");
                        location.reload(true);
                    }
                }

            });
        });
        // Login End

        //Logout Start 
        $("#logout").click(function(event){
            event.preventDefault();
            <?php
                session_destroy();
            ?>
            location.reload(true);
        });
        //Logout End

    });
</script>