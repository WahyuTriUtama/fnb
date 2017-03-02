        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('index'); ?>"><i class="fa fa-home"></i>&nbsp; Home</a></li>
            <li class="active"><?php echo $judul; ?></li>
        </ol>

        <!-- section main content -->
        <section id="sec_container">
            <div class="panel panel-default" >
                <div class="panel-heading">
                    <h2><?php echo $judul; ?></h2>
                </div>
                <div class="panel-body">
                    <?php
                    if($this->session->flashdata('message') <> '') {
                        ?>
                        <div class="alert alert-danger"> 
                            <?php echo $this->session->flashdata('message'); ?>
                        </div>
                        <?php
                    } ?>

                    <div id="widget_login">
                        <div class="row-fluid">
                            <div class="col-md-5">
                                <!-- create account -->
                                <div class="well" id="form-register">
                                    <h4><strong>DAFTAR SEBAGAI MEMBER</strong></h4>
                                    <form role="form" action="<?php echo site_url('register');?>" method="post">
                                        <hr>
                                        <p>Silahkan masukkan Nomor HP anda yang bisa dihubungi untuk mendaftar sebagai member.</p><br>
                                        <div class="form-group">
                                            <label for="inputhpreg">Nomor HP</label>
                                            <input type="text" class="form-control" id="inputhpreg" name="inputhpreg" placeholder="Masukkan nomor HP" required>
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
                                    <h4 style="color: #58a000;"><strong>SUDAH MENJADI MEMBER ?</strong></h4>
                                    <form role="form" action="<?php echo site_url('ceklogin');?>" method="post">
                                        <hr>
                                        <div class="form-group">
                                            <label for="unamemember">Username <?php echo form_error('unamemember') ?></label>
                                            <input type="text" class="form-control" id="unamemember" name="unamemember" placeholder="Enter username" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password <?php echo form_error('password') ?></label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-lock"></i>&nbsp; Login</button>
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