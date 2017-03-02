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
                            <div class="col-md-12">
                                <!-- create account -->
                                <div class="well" id="widget_register_form">
                                    <h4><strong>Kirim Pesan</strong></h4>
                                    <!-- <form role="form" action="<?php //echo site_url('views/register/addRegisterdb');?>" method="post" class="form"> -->
                                    <?php $attributes = array('class' => 'form'); ?>
                                    <?php echo form_open($action, $attributes);?>

                                    <hr>
                                    <!-- <span class="subtitle">Identitas Member</span> -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap..." required>
                                            </div>
                                            <div class="form-group">
                                                <label for="telp">Nomor Telepon</label>
                                                <input type="text" class="form-control" id="telp" name="telp" placeholder="Nomor hp..." value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email_m">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email..." required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="komentar">Pesan</label>
                                                <textarea class="form-control" id="komentar" name="komentar" rows="8" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-warning"><i class="fa fa-user"></i>&nbsp; Submit Request</button>
                                    <?php echo form_close(); ?>
                                    <!-- </form> -->
                                </div>
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