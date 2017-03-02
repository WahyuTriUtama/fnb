<ol class="breadcrumb">
    <li><a href="<?php echo base_url('index');?>"><i class="fa fa-home"></i>&nbsp; Home</a></li>
    <li class="active"><?php echo $judul; ?></li>
</ol>

<!-- section main content -->
<section id="sec_container">
    <div class="row">
        <div class="col-md-12" id="main-content">
            <div class="panel panel-default panel-clean" style="margin-bottom: 0;">
                <div class="panel-heading">
                    <h2><?php echo $judul; ?></h2>
                </div>
                <div class="panel-body">
                    <div id="widget_product_list">
                        <?php 
                        if(!$list_katmenu) {
                            ?>

                            <br><br>
                            <div class="alert alert-warning">
                                <h4>Belum ada menu yang tersedia</h4>
                                <p>Mohon maaf untuk saat ini daftar menu tidak dapat ditampilkan</p>
                            </div>
                            <?php
                        }
                        else {
                            ?>

                            <ul class="nav nav-tabs" role="tablist" id="MenuTab">
                                <?php 
                                foreach($list_katmenu as $menucat) {
                                    ?>
                                    <li><a href="#<?php echo $menucat->id_menu_cat; ?>" role="tab" data-toggle="tab"><?php echo $menucat->keterangan_menu_cat; ?></a></li>
                                <?php } ?>
                            </ul>

                            <div class="tab-content">
                                <?php 
                                foreach($list_katmenu as $menucat) { ?>
                                    <div class="tab-pane" id="<?php echo $menucat->id_menu_cat; ?>">

                                        <div class="box-products">
                                            <div class="item">
                                                <div class="row-fluid products-row best-slide">
                                                    <?php
                                                    $list_menu = $this->menumodel->get_by_category($menucat->id_menu_cat);

                                                    if(!$list_menu) {
                                                        ?>

                                                        <br><br>
                                                        <div class="alert alert-warning">
                                                            <h4>Belum ada menu yang tersedia</h4>
                                                            <p>Mohon maaf untuk saat ini daftar menu tidak dapat ditampilkan</p>
                                                        </div>
                                                        <?php
                                                    }
                                                    else {

                                                        foreach($list_menu as $menulist) {
                                                            ?>

                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 first product-col no-both slide">
                                                                <div class="wrap-item">
                                                                    <div class="product-block">
                                                                        <?php 
                                                                        if (strlen($menulist->nama_menu)>50) {
                                                                            ?>
                                                                            <h3 class="product-name name"><a href="<?php echo site_url('detail/'.$menulist->uri_dashed);?>" title="<?php echo $menulist->nama_menu; ?>"><?php echo substr($menulist->nama_menu, 0, 50)."..."; ?></a></h3>
                                                                            <?php } else { ?>
                                                                            <h3 class="product-name name"><a href="<?php echo site_url('detail/'.$menulist->uri_dashed);?>" title="<?php echo $menulist->nama_menu; ?>"><?php echo $menulist->nama_menu; ?></a></h3>
                                                                            <?php 
                                                                        }
                                                                        ?> 

                                                                        <div class="image swap">
                                                                            <div class="product-img img">
                                                                                <?php 
                                                                                if($menulist->image!=""){
                                                                                    ?>
                                                                                    <a href="<?php echo site_url('detail/'.$menulist->uri_dashed);?>" title="<?php echo $menulist->nama_menu; ?>" class="product-image img">
                                                                                        <img src="<?php echo base_url().'uploads/menu/'.$menulist->image;?>" alt="<?php echo $menulist->nama_menu; ?>" class="img-responsive">
                                                                                    </a>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <img src="<?php echo base_url().'themes/frontend/images/no-image-available.png';?>" class="thumbnail" style="width: 10%;">
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="product-meta product-shop">    
                                                                            <div class="p-info">
                                                                                <div class="price">
                                                                                    <div class="price-box">
                                                                                        <span class="regular-price" >
                                                                                            <span class="price">Rp <?php echo number_format($menulist->harga,2,",","."); ?></span>                                    
                                                                                        </span>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                            <div class="action">
                                                                                <div class="cart">
                                                                                    <center>
                                                                                        <a href="<?php echo site_url('detail/'.$menulist->uri_dashed);?>" title="Lihat Detail" class="btn btn-view btn-outline btn-block" style="margin-bottom: 5px;"><span><span>Detail</span></span> </a>
                                                                                        <a href="<?php echo site_url('add/'.$menulist->uri_dashed);?>" title="Pesan" class="btn btn-shopping-cart btn-outline btn-block"><span><strong>Pesan</strong></span> </a>
                                                                                    </center>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php 
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>

                        <script type="text/javascript">
                            $('#widget_product_list .nav-tabs li:first-child').addClass("active");
                            $('#widget_product_list .tab-content .tab-pane:first-child').addClass("active");
                        </script>
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
                                    <i class="fa fa-truck fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">FREE SHIPPING</h4>
                                ON ORDERS OVER $99. This offer is valid on all our store items.
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
                                <h4 class="media-heading">100% OFF</h4>
                                NO MINIMUM PURCHASE
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="media">
                            <div class="pull-left">
                                <span class="fa-stack fa-lg fa-2x">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-tags fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">CLEARANCE SALE</h4>
                                Get up to 75% off
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