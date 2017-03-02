<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">

<!-- 
Website: ecommerce.com
design by: domdevid 
-->

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Eresto</title>

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- Mobile viewport optimized: h5bp.com/viewport -->
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="MobileOptimized" content="320">

    <meta name="description" content="" />
    <meta name="keywords" content="ecommerce, ecommerce" />
    <meta name="author" content="Developer"/>
    
    <link rel="shortcut icon" href="<?php echo base_url();?>themes/frontend/images/favicon.ico" />
    <!-- BEGIN THEME STYLES --> 
    <link href="<?php echo base_url();?>themes/frontend/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>themes/frontend/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->

    <!-- LOAD JAVASCRIPT LIBRARY -->
    <script src="<?php echo base_url();?>themes/frontend/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>themes/frontend/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>themes/frontend/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- LOAD JAVASCRIPT LIBRARY -->

    <style type="text/css">
        #menu-list{float:left;list-style:none;margin:0;padding:0;width:100%;}
        #menu-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
        #menu-list li:hover{background:#F0F0F0;cursor: pointer;}
    </style>
</head>
<!-- END HEAD -->

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP LINK -->
        <div id="top-link">
            <div class="container">
                <?php 
                $username = $this->session->userdata('user');
                if($username == '') {
                    ?>
                    <ul class="pull-right">
                        <li><a href="<?php echo site_url('meja');?>">Cek Meja</a></li>
                        <li><a href="<?php echo site_url('cart');?>">Checkout</a></li>
                        <li><a href="<?php echo site_url('guestbook');?>">Guest Book</a></li>
                        <li><a href="<?php echo site_url('login');?>"><i class="fa fa-user-md"></i>&nbsp; Log In</a></li>
                    </ul>
                    <?php } else { ?>
                    <ul class="pull-right">
                        <li><span>Hallo, <?php echo $this->session->userdata('membername'); ?></span></li>
                        <li><a href="<?php echo site_url('meja');?>">Cek Meja</a></li>
                        <li><a href="<?php echo site_url('cart');?>">Checkout</a></li>
                        <li><a href="<?php echo site_url('guestbook');?>">Guest Book</a></li>
                        <li><a href="<?php echo site_url('logout');?>"><i class="fa fa-power-off"></i>&nbsp; Log Out</a></li>
                    </ul>
                    <?php } ?>
                </div>
            </div>
            <!-- TOP LINK -->

            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="header-inner">
                <!-- PAGE INFO -->  
                <div class="info-brand">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <!-- BEGIN LOGO -->  
                                <a class="navbar-brand pull-left" href="<?php echo base_url('index.html');?>">
                                    <img src="<?php echo base_url();?>themes/frontend/images/logo.png" alt="logo" class="img-responsive">
                                </a>
                                <!-- END LOGO -->
                            </div>

                            <div class="col-md-3"></div>

                            <div class="col-md-6">
                                <div class="header_phone">Telp: 1(800) 234-5678</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BEGIN TOP NAVIGATION MENU -->
                <nav class="navbar navbar-default navbar-setfix" role="navigation">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="collapse navbar-collapse" id="main-menu">
                                    <ul class="nav navbar-nav">
                                        <li><a href="<?php echo base_url('index.html');?>">Home</a></li>
                                        <li><a href="<?php echo base_url('menu.html');?>">All Menu</a></li>
                                        <?php 
                                        foreach($katmenu as $row) { ?>
                                            <li><a href="<?php echo site_url(strtolower($row->keterangan_menu_cat));?>"><?php echo $row->keterangan_menu_cat; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div>

                            <div class="widget-cart">
                                <a href="<?php echo site_url('cart');?>" class="cart-link tips" title="Keranjang Belanja" data-placement="bottom">
                                    <i class="fa fa-cart-arrow-down fa-3x"></i>
                                    <span>Pesanan Saya</span>
                                    <small><span class="badge badge-danger"><strong><?php echo $cart_count; ?></strong></span></small>
                                </a>
                            </div>

                            <div id="widget-search">
                                <!-- <form class="form-inline" role="form" id="form-search"> -->
                                <?php
                                $attributes = array('autocomplete' => 'off', 'class'=>'form-inline', 'id'=>'form-search');
                                echo form_open_multipart(site_url('search'), $attributes);
                                ?>
                                <div class="form-group">
                                    <label class="sr-only" for="keywords">Kata Kunci Pencarian</label>
                                    <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Pencarian Menu disini...">
                                </div>
                                <button type="submit" class="btn btn-default btn-block"><i class="fa fa-search"></i>&nbsp; Cari</button>
                                <div id="suggesstion-box"></div>
                            <?php echo form_close(); ?>
                            <!-- </form> -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </nav>              
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END TOP NAVIGATION BAR -->
    </header>
    <!-- END OF HEADER -->

    <!-- MAIN CONTAINERCONTAINER -->
    <div id="main-container" role="main">
        <!-- CONTAINER -->
        <div class="container">

            <!-- load content -->
            <?php $this->load->view($contents); ?>
            <!-- load content -->

        </div>
        <!-- END CONTAINER -->
    </div>
    <!-- END OF MAIN CONTAINER -->

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <!-- widget foot-info -->
            <div class="widget-foot-info">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Food Fast Store</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, culpa assumenda maxime soluta deleniti! Molestias, quo nostrum? Hic labore molestias, voluptate, dicta earum facere quibusdam, fugit quas quia accusamus officia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex doloribus repellendus, aliquid rerum ratione quidem dolore fugit consectetur iusto alias a numquam commodi, eaque praesentium debitis at id minima fugiat.</p>
                        <br>
                        <b>IKUTI KAMI</b>
                        <ul class="list-inline">
                            <li style="padding: 10px 10px 0 0;">
                                <a href="#" class="tips" title="Facebook Page">
                                    <span class="fa-stack">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li style="padding: 10px 10px 0 0;">
                                <a href="#" class="tips" title="Twitter">
                                    <span class="fa-stack">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li style="padding: 10px 10px 0 0;">
                                <a href="#" class="tips" title="Google Plus">
                                    <span class="fa-stack">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li style="padding: 10px 10px 0 0;">
                                <a href="#" class="tips" title="Instagram">
                                    <span class="fa-stack">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <h4>Bantuan</h4>
                                <ul>
                                    <li><a href="#">Cara Memesan</a></li>
                                    <li><a href="#">Cara Registrasi</a></li>
                                    <li><a href="#">Cek Status Pemesanan</a></li>
                                    <li><a href="#">Pengembalian Produk</a></li>
                                    <li><a href="#">Hubungi Kami</a></li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h4>Info</h4>
                                <ul>
                                    <li><a href="#">Tentang kami</a></li>
                                    <li><a href="#">Menu Terbaru</a></li>
                                    <li><a href="#">Info Karir</a></li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <div class="widget_contact">
                                    <h4>Customer Care</h4>
                                    <p>Anda dapat langsung menghubungi kantor pusat Food Fast Store di :</p>
                                    <p>Layanan Customer<br></p>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-phone"></i>&nbsp; 02155965685</li>
                                        <li><i class="fa fa-phone"></i>&nbsp; 081277986160</li>
                                        <li><i class="fa fa-phone"></i>&nbsp; 081277986158</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- widget foot-info -->
        </div>

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        &copy; 2015 <a href="#">Food Fast Store</a>. All rights reserved.
                    </div>
                    <div class="col-md-6">
                        <div  class="text-right">
                            <a href="#" class="back-to-top">Kembali ke Atas &nbsp;<i class="fa fa-chevron-circle-up"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>   
    <!-- END OF FOOTER -->

    <!-- All JavaScript at the bottom, except for Modernizr and Respond. Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
    <script type="text/javascript" src="<?php echo base_url();?>themes/frontend/js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>themes/frontend/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>themes/frontend/js/prettyphoto/jquery.prettyPhoto.js" charset="utf-8"></script>

    <script type="text/javascript" src="<?php echo base_url();?>themes/frontend/js/datepicker/jquery.plugin.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>themes/frontend/js/datepicker/jquery.datepick.min.js"></script>
    <!--<script src="js/chosen.jquery.js" type="text/javascript"></script>    -->

    <script src="<?php echo base_url();?>themes/frontend/js/application.js" type="text/javascript"></script>
    
    <!-- outocomplete search -->
    <script type="text/javascript">
        // AJAX call for autocomplete 
        $(document).ready(function(){
            $("#keywords").keyup(function(){
                $.ajax({
                    type: "POST",
                    url: "<?= base_url()?>front/lookup",
                    data:'keyword='+$(this).val(),
                    beforeSend: function(){
                        $("#keywords").css("background","#FFF url('<?= base_url()?>themes/backend/img/loading.gif') no-repeat 100%");
                    },
                    success: function(data){
                        $("#suggesstion-box").show();
                        $("#suggesstion-box").html(data);
                        $("#keywords").css("background","#FFF");
                    }
                });
            });
        });
    </script>
</body>
</html>