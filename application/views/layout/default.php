<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cpanel | <?php echo $title; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <link rel="shortcut icon" href="<?php echo base_url();?>themes/frontend/images/favicon.ico" />
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url('themes/backend/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url('themes/backend/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('themes/backend/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo base_url('themes/backend/css/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="<?php echo base_url('themes/backend/css/fullcalendar/fullcalendar.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url('themes/backend/css/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url('themes/backend/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('themes/backend/css/AdminLTE.css') ?>" rel="stylesheet" type="text/css" />
        <!--table-->
        <link href="<?php echo base_url('themes/backend/css/datatables/dataTables.bootstrap.css')?>" rel="stylesheet">

    </head>
    <body class="skin-black">
        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url('themes/backend/js/jquery-2.1.4.min.js') ?>"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="<?php echo base_url('themes/backend/js/jquery-ui-1.10.3.min.js') ?>" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url('themes/backend/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url('themes/backend/js/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url('themes/backend/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('themes/backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="<?php echo base_url('themes/backend/js/plugins/fullcalendar/fullcalendar.min.js') ?>" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url('themes/backend/js/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url('themes/backend/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('themes/backend/js/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo base_url('themes/backend/js/AdminLTE/app.js') ?>" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url('themes/backend/js/AdminLTE/dashboard.js') ?>" type="text/javascript"></script>     

        <!--tabel-->
        <script src="<?php echo base_url('themes/backend/js/plugins/datatables/jquery.dataTables.min.js')?>"></script>
        <script src="<?php echo base_url('themes/backend/js/plugins/datatables/dataTables.bootstrap.js')?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <??>
            <a href="<?php echo site_url($this->session->userdata('site')); ?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                CPanel E-resto
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $user->nama_user; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-black">
                                    <img src="<?php echo base_url();?>uploads/users/<?php echo $user->image;?>" class="img-circle" alt="User Image" />
                                    <p style="color: #fff;">
                                        <strong><?php echo $user->nama_user; ?></strong><br>
                                        Teknik Informatika
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- 
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                 -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url('adm_login/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <?php 
                if ($this->session->userdata('level') == 'lev1') {
                    $this->load->view('layout/navigasi_adm');
                } elseif ($this->session->userdata('level') == 'lev2') {
                    $this->load->view('layout/navigasi_pem');
                } elseif ($this->session->userdata('level') == 'lev3') {
                    $this->load->view('layout/navigasi_kas');
                }
                ?>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">

                <?php echo $content;?>
                
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal --> 

        <script type="text/javascript">
            jQuery(function($) {
                var segment1 = "<?php echo $this->uri->segment(1);?>";
                if (segment1 == 'backend') {
                    $('#n_dashboard').addClass('active');
                } else if (segment1 == 'kasir') {
                    $('#n_dashboard').addClass('active');
                } else if (segment1 == 'pemesanan') {
                    $('#n_dashboard').addClass('active');
                }

                var segment2 = "<?php echo $this->uri->segment(2);?>";
                if (segment2 == 'meja') {
                    $('#n_dashboard').removeClass('active');
                    $('#n_meja').addClass('active');
                } else if (segment2 == 'menucat') {
                    $('#n_dashboard').removeClass('active');
                    $('#n_menu').addClass('active');
                    $('#menu_block').attr('style','display:block;');
                    $('#n_menucat').addClass('active');
                } else if (segment2 == 'menu') {
                    $('#n_dashboard').removeClass('active');
                    $('#n_menu').addClass('active');
                    $('#menu_block').attr('style','display:block;');
                    $('#n_menu1').addClass('active');
                } else if (segment2 == 'member') {
                    $('#n_dashboard').removeClass('active');
                    $('#n_member').addClass('active');
                } else if (segment2 == 'pemesanan') {
                    $('#n_dashboard').removeClass('active');
                    $('#n_pemesanan').addClass('active');
                } else if (segment2 == 'translog') {
                    $('#n_dashboard').removeClass('active');
                    $('#n_log').addClass('active');
                } else if (segment2 == 'ugroup') {
                    $('#n_dashboard').removeClass('active');
                    $('#n_user').addClass('active');
                    $('#user_block').attr('style','display:block;');
                    $('#n_ugroup').addClass('active');
                } else if (segment2 == 'user') {
                    $('#n_dashboard').removeClass('active');
                    $('#n_user').addClass('active');
                    $('#user_block').attr('style','display:block;');
                    $('#n_user1').addClass('active');
                }
            });
        </script>
    </body>
</html>