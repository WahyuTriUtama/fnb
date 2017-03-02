<?php include("template/header.php"); ?>

<!-- MAIN CONTAINERCONTAINER -->
<div id="main-container" role="main">
    <!-- CONTAINER -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i>&nbsp; Home</a></li>
            <li><a href="#">Library</a></li>
            <li class="active">Data</li>
        </ol>

        <!-- section main content -->
        <section id="sec_container">
            <div class="panel panel-default" >
                <div class="panel-heading">
                    <h2>Member Login Area </h2>
                </div>
                <div class="panel-body">
                    <div id="widget_login">
                        <div class="row-fluid">
                            <div class="col-md-5">
                                <!-- create account -->
                                <div class="well" id="form-register">
                                    <h4><strong>DAFTAR SEBAGAI MEMBER</strong></h4>
                                    <form role="form">
                                        <hr>
                                        <p>Silahkan masukkan email anda untuk membuat akun member.</p><br>
                                        <div class="form-group">
                                            <label for="inputmailregister">Alamat Email</label>
                                            <input type="email" class="form-control" id="inputmailregister" placeholder="Masukkan email">
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-warning"><i class="fa fa-user"></i>&nbsp; Buat Akun Saya</button>
                                    </form>
                                </div>
                                <!-- create account -->
                            </div>
                            <div class="col-md-2">
                                <center>
                                    <span class="fa-stack fa-3x">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-users fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <p><b>&larr; atau &rarr;</b></p>
                                </center>
                            </div>
                            <div class="col-md-5">
                                <!-- login account -->
                                <div class="well" id="form-login">
                                    <h4><strong>SUDAH MENJADI MEMBER ?</strong></h4>
                                    <form role="form">
                                        <hr>
                                        <div class="form-group">
                                            <label for="inputmaillogin">Alamat Email</label>
                                            <input type="email" class="form-control" id="inputmaillogin" placeholder="Masukkan email">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputpasslogin">Password</label>
                                            <input type="password" class="form-control" id="inputpasslogin" placeholder="Password">
                                        </div>
                                        <a href="#">Lupa password anda?</a>
                                        <hr>
                                        <button type="submit" class="btn btn-default"><i class="fa fa-lock"></i>&nbsp; Login</button>
                                    </form>
                                </div>
                                <!-- login account -->
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </section>
                <!-- section main content -->

                <!-- section other product -->
                <section id="sec_feature" style="margin: 0;">
                    <div class="panel panel-default">
                        <div class="panel-body" style="padding: 25px;">
                            <div class="row"  id="tag-promo">
                                <div class="col-md-3">
                                    <div class="media">
                                        <div class="pull-left">
                                            <span class="fa-stack fa-lg fa-2x">
                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                <i class="fa fa-cutlery fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">FAST SERVING</h4>
                                            Fast Serving your order, for a good eat
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="media">
                                        <div class="pull-left">
                                            <span class="fa-stack fa-lg fa-2x">
                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">30% OFF</h4>
                                            Get up 30% from your orders
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="media">
                                        <div class="pull-left">
                                            <span class="fa-stack fa-lg fa-2x">
                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                <i class="fa fa-thumbs-o-up fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">HEALTH INGRADIENT</h4>
                                            Natural Ingradient for healthy food
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="media">
                                        <div class="pull-left">
                                            <span class="fa-stack fa-lg fa-2x">
                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                <i class="fa fa-street-view fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">24 HOUR ONLINE SUPPORT</h4>
                                            24/24 online support customer
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </section>
                <!-- section other product -->

            </div>
            <!-- END CONTAINER -->
        </div>
        <!-- END OF MAIN CONTAINER -->

        <?php include("template/footer.php"); ?>