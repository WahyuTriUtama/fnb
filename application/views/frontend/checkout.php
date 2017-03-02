        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('index'); ?>"><i class="fa fa-home"></i>&nbsp; Home</a></li>
            <li class="active"><?php echo $judul; ?></li>
        </ol>

        <!-- section main content -->
        <section id="sec_container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><?php echo $judul; ?></h2>
                </div>
                <div class="panel-body">
                    <div id="widget_shoppingcart">
                        <ul class="step clearfix" id="order_step">
                            <li class="step_done first">
                                <a href="<?php echo site_url('cart');?>">
                                    <em>01.</em> Daftar Belanja
                                </a>
                            </li>
                            <li class="step_done second">
                                <a href="<?php echo site_url('verifikasi');?>">
                                    <em>02.</em> Login Member
                                </a>
                            </li>
                            <li id="step_end" class="step_current last">
                                <span><em>03.</em> CheckOut</span>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <br>

                        <div id="widget_payment">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- address for shipping -->
                                    <div class="well" id="form-address-shipping">
                                        <h4><strong>CHECKOUT</strong></h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h5><strong>Daftar Pesanan Anda</strong></h5>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="alert alert-success">
                                                            <h5 class="text-left">Anda memiliki <?php echo $cart_count; ?> item di keranjang belanja</h5>
                                                        </div>
                                                        <table class="table table-striped table-hover table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="2" width="40%">Item</th>
                                                                    <th width="25%" style="text-align: right;">Harga</th>
                                                                    <th width="10%" style="text-align: right;">Jumlah</th>
                                                                    <th width="25%" style="text-align: right;">Subtotal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <?php
                                                                $i = 1;
                                                                foreach($cart_view as $orderlist) {
                                                                    
                                                                    $DataMenu = $this->menumodel->get_by_id($orderlist['id']);

                                                                    ?>

                                                                    <tr>
                                                                        <td width="20%">
                                                                            <?php 
                                                                            if($DataMenu->image!=""){
                                                                                ?>
                                                                                <a href="<?php echo base_url().'detail/'.$DataMenu->uri_dashed;?>" title="<?php echo $DataMenu->nama_menu; ?>">
                                                                                    <img src="<?php echo base_url().'uploads/menu/'.$DataMenu->image;?>" alt="<?php echo $DataMenu->nama_menu; ?>" class="img-thumbnail" style="height: 100px;">
                                                                                </a>
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <img src="<?php echo base_url().'themes/frontend/images/no-image-available.png';?>" class="thumbnail" style="width: 10%;">
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td width="20%"><h5><?php echo $DataMenu->nama_menu; ?></h5></td>
                                                                        <td align="right">
                                                                            <div class="pricecart">
                                                                                Rp <?php echo number_format($orderlist['price'],2,",","."); ?>
                                                                            </div>
                                                                        </td>
                                                                        <td align="right">
                                                                            <?php echo $orderlist['qty']; ?>
                                                                        </td>
                                                                        <td align="right"><div class="pricecart">Rp <?php echo number_format($orderlist['subtotal'],2,",","."); ?></div></td>
                                                                    </tr>
                                                                    <?php
                                                                    $i++;
                                                                }
                                                                ?>
                                                            </tbody>

                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="4" align="right"><strong>TOTAL BELANJA :</strong></td>
                                                                    <td colspan="2" align="right"><div class="pricecart"><strong>Rp <?php echo number_format($cart_amount,2,",","."); ?></strong></div></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="well" id="widget_info_order">
                                                    <h4>Ringkasan Pesanan</h4>
                                                    <br>
                                                    <?php echo form_open('front/save');?>
                                                    <div class="form-group has-success has-feedback">
                                                        <label>No. Transaksi</label>
                                                        <input type="text" class="form-control" id="in_notrans" name="in_notrans" value="<?php echo $order_id; ?>" readonly>
                                                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>

                                                        <?php if($this->session->userdata('memberid')!= '') { ?>
                                                        <input type="hidden" class="form-control" id="in_idmember" name="in_idmember" value="<?php echo $this->session->userdata('memberid'); ?>" readonly>
                                                        <?php } else { ?>
                                                        <input type="hidden" class="form-control" id="in_idmember" name="in_idmember" value="0" readonly>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="form-group has-success has-feedback">
                                                        <label>Nama Pemesan</label>
                                                        <input type="text" class="form-control" id="in_nama" name="in_nama" value="<?php echo $order_name;?>" readonly>
                                                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                                                    </div>
                                                    <div class="form-group has-success has-feedback">
                                                        <label>No. Meja</label>
                                                        <input type="text" class="form-control" id="in_nomeja" name="in_nomeja" value="<?php echo $order_table;?>" readonly>
                                                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                                                    </div>
                                                    <div class="form-group has-success has-feedback">
                                                        <label>Total Bayar</label>
                                                        <input type="text" class="form-control" id="in_total" name="in_total" value="<?php echo number_format($cart_amount,2,",","."); ?>" readonly>
                                                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                                                    </div>

                                                    <button type="submit" class="btn btn-warning btn-lg btn-block"><b>Konfirmasi Pesanan Saya</b> &nbsp;<i class="fa fa-chevron-right"></i></button>
                                                    <?php echo form_close();?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br>

                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <a href="#" class="btn btn-default btn-lg"><i class="fa fa-chevron-left"></i>&nbsp; Lanjutkan Belanja</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                        </div>

                    </div>
                </div>
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
