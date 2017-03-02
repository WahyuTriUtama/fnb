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
                            <li class="step_done first">
                                <a href="#">
                                    <em>01.</em> Daftar Belanja
                                </a>
                            </li>
                            <li class="step_done second">
                                <a href="#">
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
                                                        <h5><strong>Pilih Metode Pembayaran</strong></h5>
                                                    </div>
                                                    <div class="panel-body">
                                                        <ul class="payment-method-section list-unstyled">
                                                            <li>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="optshippingmethode" id="shipping-method1" value="ibank">
                                                                        <b class="payment-type-name">Internet Banking</b>
                                                                    </label>
                                                                </div>
                                                                <span class="sub-label">BCA KlikPay, CIMB Clicks, KlikBCA, Mandiri Clickpay, e-Pay BRI</span>
                                                                <div id="pay-ibank">
                                                                    <select id="payment-option-e-banking" class="text-field form-control sub-label">
                                                                        <option style="display:none" value="" class="">-- Pilih Opsi Pembayaran --</option>
                                                                        <option value="0">BCA KlikPay</option>
                                                                        <option value="1">CIMB Clicks</option>
                                                                        <option value="2">KlikBCA</option>
                                                                        <option value="3">Mandiri Clickpay</option>
                                                                        <option value="4">e-Pay BRI</option>
                                                                    </select>
                                                                    <div style="margin-top: 15px;" class="sub-label">
                                                                        <ul class="list-unstyled list-inline">
                                                                            <li><span class="assets_bca-klikpay thumbnail tips" title="BCA KlikPay"></span></li>
                                                                            <li><span class="assets_cimb-click thumbnail tips" title="CIMB Clicks"></span></li>
                                                                            <li><span class="assets_klik-bca thumbnail tips" title="KlikBCA"></span></li>
                                                                            <li><span class="assets_mandiri-clickpay thumbnail tips" title="Mandiri Clickpay"></span></li>
                                                                            <li><span class="assets_e-pay-bri thumbnail tips" title="e-Pay BRI"></span></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="optshippingmethode" id="shipping-method2" value="icard">
                                                                        <b class="payment-type-name">Kartu Debit/Kredit</b>
                                                                    </label>
                                                                </div>
                                                                <span class="sub-label">Semua Visa dan Mastercard</span>
                                                                <div id="pay-icard">
                                                                    <select id="payment-option-e-card" class="text-field form-control sub-label">
                                                                        <option style="display:none" value="" class="">-- Pilih Opsi Pembayaran --</option>
                                                                        <option value="0">ANZ Kartu Kredit.</option>
                                                                        <option value="1">BCA Kartu Kredit.</option>
                                                                        <option value="2">BNI Debit Online</option>
                                                                        <option value="3">BNI Kartu Kredit.</option>
                                                                        <option value="4">BRI Kartu Kredit.</option>
                                                                        <option value="5">BTN Debit Online</option>
                                                                        <option value="6">Citibank Kartu Kredit.</option>
                                                                        <option value="7">HSBC Kartu Kredit.</option>
                                                                        <option value="8">Mandiri Debit Online</option>
                                                                        <option value="9">Mandiri Kartu Kredit.</option>
                                                                        <option value="10">Mega Kartu Kredit.</option>
                                                                        <option value="11">Standard Chartered Kartu Kredit.</option>
                                                                        <option value="12">UOB Kartu Kredit.</option>
                                                                        <option value="13">VISA Kartu Kredit.</option>
                                                                        <option value="14">Kartu Kredit Lainnya</option>
                                                                    </select>
                                                                    <div style="margin-top: 15px;" class="sub-label">
                                                                        <ul class="list-unstyled list-inline">
                                                                            <li><span class="assets_anz thumbnail tips" title="ANZ Kartu Kredit"></span></li>
                                                                            <li><span class="assets_bca thumbnail tips" title="BCA Kartu Kredit"></span></li>
                                                                            <li><span class="assets_bni-debit-online thumbnail tips" title="BNI Debit Online"></span></li>
                                                                            <li><span class="assets_bni46 thumbnail tips" title="BNI Kartu Kredit"></span></li>
                                                                            <li><span class="assets_bank-bri thumbnail tips" title="BRI Kartu Kredit"></span></li>

                                                                            <li><span class="assets_debita-btn-online thumbnail tips" title="BTN Debit Online"></span></li>
                                                                            <li><span class="assets_citi thumbnail tips" title="Citibank Kartu Kredit"></span></li>
                                                                            <li><span class="assets_hsbc thumbnail tips" title="HSBC Kartu Kredit"></span></li>
                                                                            <li><span class="assets_mandiri-card thumbnail tips" title="Mandiri Debit Online"></span></li>
                                                                            <li><span class="assets_mandiri thumbnail tips" title="Mandiri Kartu Kredit"></span></li>

                                                                            <li><span class="assets_bank-mega thumbnail tips" title="Mega Kartu Kredit"></span></li>
                                                                            <li><span class="assets_standar-chartered thumbnail tips" title="Standard Chartered Kartu Kredit"></span></li>
                                                                            <li><span class="assets_klik-bca thumbnail tips" title="UOB Kartu Kredit"></span></li>
                                                                            <li><span class="assets_visa thumbnail tips" title="VISA Kartu Kredit"></span></li>
                                                                            <li><span class="assets_e-pay-bri thumbnail tips" title="Kartu Kredit Lainnya"></span></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="optshippingmethode" id="shipping-method3" value="itransfer">
                                                                        <b class="payment-type-name">Transfer Bank</b>
                                                                    </label>
                                                                </div>
                                                                <span class="sub-label">Dari semua bank</span>
                                                                <div id="pay-itransfer">
                                                                    <select id="payment-option-e-transfer" class="text-field form-control sub-label">
                                                                        <option style="display:none" value="" class="">-- Pilih Opsi Pembayaran --</option>
                                                                        <option value="0">Bank BCA.</option>
                                                                        <option value="1">Bank Mandiri.</option>
                                                                    </select>
                                                                    <div style="margin-top: 15px;" class="sub-label">
                                                                        <ul class="list-unstyled list-inline">
                                                                            <li><span class="assets_bca thumbnail tips" title="Bank BCA"></span></li>
                                                                            <li><span class="assets_mandiri thumbnail tips" title="Bank Mandiri"></span></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="well">
                                                    <h4>Kupon Belanja</h4>
                                                    <hr>
                                                    <p>Gunakan kode kupon yang anda miliki untuk mendapatkan diskon khusus belanja anda.</p>
                                                    <form class="form">
                                                        <input type="text" class="form-control" ng-model="promoCode" placeholder="Masukkan promo ID"><br>
                                                        <input type="button" value="Gunakan" class="btn btn-success">
                                                    </form>
                                                </div>

                                                <div class="well">
                                                    <h4>Barang yang Anda Pesan (1)</h4>
                                                    <hr>
                                                    <ul class="list-unstyled">
                                                        <li class="row">
                                                            <div class="col-md-3">
                                                                <a href="#" class="thumbnail">
                                                                    <img src="images/product_1_small.jpg" class="img-responsive">
                                                                </a>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <h5>Apple iPhone 4 - 16GB - White</h5><br>
                                                                <b>Rp 2.000.000,00</b><br>
                                                                Jumlah : <b>1</b> &nbsp;<a href="#">Ubah</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td width="40%">Estimasi Pengiriman</td>
                                                            <td width="60%" class="text-right">4 Jul 2015 to 21 Jul 2015</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jasa Pengiriman &nbsp; <a href="#">Ubah</a></td>
                                                            <td class="text-right"><b>JNE</b><br>Paket YES</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="well" id="widget_info_order">
                                                    <h4>Ringkasan Pesanan</h4>
                                                    <hr>
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td width="40%">Total pembayaran</td>
                                                            <td width="60%" class="text-right"><b style="color: #f15f0a;">Rp 2.970.000,00</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sub total<br>(<b>1</b> produk)</td>
                                                            <td class="text-right">Rp 2.970.000,00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kupon & Promo</td>
                                                            <td class="text-right">Rp 0,00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Biaya pengiriman</td>
                                                            <td class="text-right">Rp 200.000,00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Handling fee</td>
                                                            <td class="text-right">GRATIS</td>
                                                        </tr>
                                                    </table>
                                                    <hr>
                                                    <table class="table">
                                                        <tr>
                                                            <td width="40%">Metode Pembayaran</td>
                                                            <td width="60%" class="text-right"><b>Transfer<br>(Transfer ke Virtual Account)</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat <br><a href="#">ubah alamat</a></td>
                                                            <td class="text-right">
                                                                <p>
                                                                    <strong>David Beckham</strong><br>
                                                                    <small>
                                                                        Sir Matt Busby Way, Manchester M16 0RA,<br>
                                                                        United Kingdom<br>
                                                                        +44 161 868 8000
                                                                    </small>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <hr>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">
                                                            Saya setuju dengan <a href="#">Syarat & Ketentuan</a>
                                                        </label>
                                                    </div>
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
                                <div class="col-md-6 text-right">
                                    <a href="#" class="btn btn-warning btn-lg"><b>Konfirmasi Pesanan Saya</b> &nbsp;<i class="fa fa-chevron-right"></i></a>
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