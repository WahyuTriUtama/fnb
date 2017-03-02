<ol class="breadcrumb">
    <li><a href="<?php echo base_url('index');?>"><i class="fa fa-home"></i>&nbsp; Home</a></li>
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
                    <li class="step_current  first">
                        <span><em>01.</em> Daftar Order</span>
                    </li>
                    <li class="step_todo second">
                        <span><em>02.</em> Data Pemesan</span>
                    </li>
                    <li id="step_end" class="step_todo last">
                        <span><em>03.</em> CheckOut</span>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <br>

                <?php
                if($this->session->flashdata('message') <> '') {
                    ?>
                    <div class="alert alert-success"> 
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                    <?php
                } else { ?>

                <div class="alert alert-warning">
                    <h5 class="text-right">Anda memiliki <?php echo $cart_count; ?> item di keranjang belanja</h5>
                </div>
                <div class="cart">
                    <?php
                    $i = 1;

                    if($cart_count == 0) {
                        ?>

                        <br><br>
                        <center>
                            <h4>Belum ada order yang dibuat</h4>
                            <p>Mohon maaf untuk saat ini daftar pesanan tidak dapat ditampilkan</p>
                        </enter>
                        <br><br>
                        <?php
                    }
                    else {
                        ?>
                        
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="3" width="50%">Item</th>
                                    <th width="25%" style="text-align: right;">Harga</th>
                                    <th width="10%" style="text-align: right;">Jumlah</th>
                                    <th width="15%" style="text-align: right;">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach($cart_view as $orderlist) {

                                    $DataMenu = $this->menumodel->get_by_id($orderlist['id']);

                                    ?>

                                    <tr>
                                        <td width="5%">
                                            <a href="<?php echo base_url().'remove/'.$orderlist['rowid'];?>" class="btn btn-danger cmd"><i class="fa fa-times-circle"></i></a>
                                        </td>
                                        <td width="10%">
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
                                        <td width="30%"><h5><?php echo $DataMenu->nama_menu; ?></h5></td>
                                        <td align="right">
                                            <div class="pricecart">
                                                Rp <?php echo number_format($orderlist['price'],2,",","."); ?>
                                            </div>
                                        </td>
                                        <td align="right">
                                            <?php echo form_open_multipart('update');?>
                                            <div class="input-group">
                                                <input type="hidden" name="rowid" value="<?php echo $orderlist['rowid']; ?>">
                                                <input type="number" class="form-control" name="input_qty" min="1" value="<?php echo $orderlist['qty']; ?>" id="input_qty_<?php echo $orderlist['id']; ?>">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-success" title="Update"><i class="fa fa-check-square-o"></i></button>
                                                </span>
                                            </div>
                                            <?php echo form_close(); ?>
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
                                    <td colspan="3">&nbsp;</td>
                                    <td align="right"><strong>TOTAL BELANJA :</strong></td>
                                    <td colspan="2" align="right"><div class="pricecart"><strong>Rp <?php echo number_format($cart_amount,2,",","."); ?></strong></div></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="clearfix"></div>
                        <br>

                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="<?php echo base_url();?>menu" class="btn btn-default btn-lg"><i class="fa fa-chevron-left"></i>&nbsp; Lanjutkan Belanja</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo base_url();?>verifikasi" class="btn btn-success btn-lg">Proses Pesanan Saya (Checkout) &nbsp;<i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <?php } ?>
                    </div>

                </div>
                <?php } ?>
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