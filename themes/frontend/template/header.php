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
    <title>ecommerce.com</title>

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- Mobile viewport optimized: h5bp.com/viewport -->
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="MobileOptimized" content="320">

    <meta name="description" content="" />
    <meta name="keywords" content="ecommerce, ecommerce" />
    <meta name="author" content="Developer"/>

    <!-- BEGIN THEME STYLES --> 
    <link href="css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->

    <!-- LOAD JAVASCRIPT LIBRARY -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!-- LOAD JAVASCRIPT LIBRARY -->

    <link rel="shortcut icon" href="images/favicon.ico" />
</head>
<!-- END HEAD -->

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP LINK -->
        <div id="top-link">
            <div class="container">
                <ul class="pull-right">
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">My Wishlist</a></li>
                    <li><a href="#">Cek Status Order</a></li>
                    <li><a href="#">Checkout</a></li>
                    <li><a href="#">Log In</a></li>
                </ul>
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
                            <a class="navbar-brand pull-left" href="./index.html">
                                <img src="images/logo.png" alt="logo" class="img-responsive">
                            </a>
                            <!-- END LOGO -->
                        </div>

                        <div class="col-md-3"></div>

                        <div class="col-md-6">
                            <div class="header_phone">Tel: 1(800) 234-5678</div>
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
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Breakfast</a></li>
                                    <li><a href="#">Pizza - Pasta</a></li>
                                    <li><a href="#">Burger & Sandwich</a></li>
                                    <li><a href="#">Salad</a></li>
                                    <li><a href="#">Snack</a></li>
                                    <li><a href="#">Drink</a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div>

                        <div class="widget-cart">
                            <a href="#" class="cart-link tips" title="Keranjang Belanja" data-placement="bottom" data-toggle="modal" data-target="#modalcart">
                                <i class="fa fa-cart-arrow-down fa-3x"></i>
                                <span>Pesanan Saya</span>
                                <small><span class="badge badge-danger"><strong>0</strong></span></small>
                            </a>
                        </div>

                        <div id="widget-search">
                            <form class="form-inline" role="form" id="form-search">
                                <div class="form-group">
                                    <label class="sr-only" for="input-keywords">Kata Kunci Pencarian</label>
                                    <input type="text" class="form-control" id="input-keywords" placeholder="Pencarian Menu disini...">
                                </div>
                                <button type="submit" class="btn btn-default btn-block"><i class="fa fa-search"></i>&nbsp; Cari</button>
                            </form>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </nav>              
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END TOP NAVIGATION BAR -->
    </header>
    <!-- END OF HEADER -->

