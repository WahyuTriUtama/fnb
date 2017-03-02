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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Shopping Cart</h2>
                </div>
                <div class="panel-body">
                    <div id="widget_shoppingcart">
                        <ul class="step clearfix" id="order_step">
                            <li class="step_current  first">
                                <span><em>01.</em> Daftar Belanja</span>
                            </li>
                            <li class="step_todo second">
                                <span><em>02.</em> Login Member</span>
                            </li>
                            <li id="step_end" class="step_todo last">
                                <span><em>03.</em> CheckOut</span>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <br>

                        <div class="alert alert-warning">
                            <h5 class="text-right">Anda memiliki 2 item di keranjang belanja</h5>
                        </div>
                        <div class="cart">
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
                                    <tr>
                                        <td width="5%">
                                            <a href="#" class="btn btn-danger cmd"><i class="fa fa-times-circle"></i></a>
                                        </td>
                                        <td width="10%">
                                            <a href="#"><img src="images/Bacon-Clubhouse-Burger.png" alt="deal product name" class="img-thumbnail" style="height: 100px;"></a>
                                        </td>
                                        <td width="30%"><h5>Bacon Clubhouse Burger</h5></td>
                                        <td align="right">
                                            <div class="pricecart">
                                                Rp 20.000
                                            </div>
                                        </td>
                                        <td align="right">
                                            <input type="number" class="form-control" name="input_qty" min="1" value="1" id="input_qty_01">
                                        </td>
                                        <td align="right"><div class="pricecart">Rp 1.485.000</div></td>
                                    </tr>
                                    <tr>
                                        <td width="5%">
                                            <a href="#" class="btn btn-danger cmd"><i class="fa fa-times-circle"></i></a>
                                        </td>
                                        <td width="10%">
                                            <a href="#"><img src="images/Bacon-Clubhouse-Burger.png" alt="deal product name" class="img-thumbnail" style="height: 100px;"></a>
                                        </td>
                                        <td width="35%"><h5>Bacon Clubhouse Burger</h5></td>
                                        <td align="right">
                                            <div class="pricecart">
                                                Rp 20.000
                                            </div>
                                        </td>
                                        <td align="right">
                                            <input type="number" class="form-control" name="input_qty" min="1" value="1" id="input_qty_02">
                                        </td>
                                        <td align="right"><div class="pricecart">Rp 40.000</div></td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="3">&nbsp;</td>
                                        <td align="right">PPN :</td>
                                        <td colspan="2" align="right"><div>Rp 40.000</div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">&nbsp;</td>
                                        <td align="right"><strong>TOTAL BELANJA :</strong></td>
                                        <td colspan="2" align="right"><div class="pricecart"><strong>Rp 40.000</strong></div></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="clearfix"></div>
                            <br>

                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <a href="#" class="btn btn-default btn-lg"><i class="fa fa-chevron-left"></i>&nbsp; Lanjutkan Belanja</a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="#" class="btn btn-success btn-lg">Proses Pesanan Saya (Checkout) &nbsp;<i class="fa fa-chevron-right"></i></a>
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

    </div>
    <!-- END CONTAINER -->
</div>
<!-- END OF MAIN CONTAINER -->

<?php include("template/footer.php"); ?>