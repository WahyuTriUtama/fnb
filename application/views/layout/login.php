<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>PPIC | Login</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <link rel="shortcut icon" href="<?php echo base_url();?>themes/frontend/images/favicon.ico" />
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url('themes/backend/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url('themes/backend/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('themes/backend/css/AdminLTE.css') ?>" rel="stylesheet" type="text/css" />

        <script type="text/javascript">
            window.history.forward();
            function noBack() { window.history.forward(); }
        </script>
    </head>
    <body class="bg-black" onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

        <div class="form-box" id="login-box">
            <div class="header bg-red">E-resto</div>
            <?php echo form_open($action);?>
                <div class="body">
                    <!--notification-->
                    <?php $error = $this->session->flashdata('error');?>
                    <div class="alert alert-<?php echo $error ? 'danger' : 'info';?> alert-dismissable" style="margin-left:0px;">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                        <?php echo $error ? $error : 'Enter username and password'; ?>
                        <div class="clear"></div>
                    </div>    
                    <!-- end notification -->

                    <div class="form-group <?php echo $error ? 'has-error' : '';?>">
                        <input type="text" name="username" class="form-control bg-gray" placeholder="Username" value="<?php echo $username;?>" required="required" autofocus/>
                        <small><?php echo form_error('username') ?></small>
                    </div>
                    <div class="form-group <?php echo $error ? 'has-error' : '';?>">
                        <input type="password" name="password" class="form-control bg-gray" placeholder="Password" value="<?php echo $password;?>" required="required"/>
                        <small><?php echo form_error('password') ?></small>
                    </div>
                    <!-- 
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                     -->
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-red btn-block">Sign me in</button>  
                    
                    <!--<p><a href="#">I forgot my password</a></p>-->
                    
                    <!--<a href="register.html" class="text-center">Register a new membership</a>-->
                </div>
            <?php echo form_close();?>
            <!-- 
            <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
             -->
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url('themes/backend/js/jquery-2.1.4.min.js') ?>"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url('themes/backend/js/bootstrap.min.js') ?>" type="text/javascript"></script>        

    </body>
</html>