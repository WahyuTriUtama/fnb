    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index');?>"><i class="fa fa-home"></i>&nbsp; Home</a></li>
        <li><a href="<?php echo site_url('menu');?>">All Menu</a></li>
        <li><a href="<?php echo site_url(strtolower($datamenu->keterangan_menu_cat));?>"><?php echo $datamenu->keterangan_menu_cat; ?></a></li>
        <?php 
        if (strlen($datamenu->nama_menu)>25) {
            ?>
            <li class="active"><?php echo substr($datamenu->nama_menu, 0, 25)."..." ?></li>
            <?php } else { ?>
            <li class="active"><?php echo $datamenu->nama_menu; ?></li>
            <?php 
        }
        ?> 
    </ol>

    <!-- section main content -->
    <section id="sec_container">
        <div class="panel panel-default" id="item-detail">
            <div class="panel-heading">
                <h2><?php echo $datamenu->nama_menu; ?></h2>
            </div>
            <div class="panel-body">
                <div id="widget_product_display">
                    <div class="row-fluid">
                        <div class="col-md-5">
                            <!-- Display Product -->
                            <div class="box-products">
                                <div class="item">
                                    <div class="row-fluid products-row display-slide">

                                        <div class="col-md-12 first product-col no-both slide">
                                            <div class="wrap-item">
                                                <div class="product-block">
                                                    <div class="image swap">
                                                        <div class="product-img img">
                                                            <?php 
                                                            if($datamenu->image!=""){
                                                                ?>
                                                                <a href="<?php echo base_url().'detail/'.$datamenu->uri_dashed;?>" title="<?php echo $datamenu->nama_menu; ?>" class="product-image img">
                                                                    <img src="<?php echo base_url().'uploads/menu/'.$datamenu->image;?>" alt="<?php echo $datamenu->nama_menu; ?>" class="img-responsive">
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
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!-- Display Product -->
                        </div>
                        <div class="col-md-4">
                            <!-- product description -->
                            <div class="panel panel-default" id="item-desc">
                                <div class="panel-body">
                                    <?php echo substr($datamenu->keterangan_menu, 0, 500); ?>
                                </div>
                            </div>
                            <!-- product description -->
                        </div>
                        <div class="col-md-3">
                            <!-- product info -->
                            <div id="item-info">
                                <table class="table table-striped" style="margin-bottom: 10px;">
                                    <tbody>
                                        <tr class="active">
                                            <td>
                                                <h4><strong>Harga</strong></h4>
                                                <h4 class="price-tag">
                                                    Rp <?php echo number_format($datamenu->harga,2,",","."); ?>
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4><strong>Kategori</strong></h4>
                                                <strong><a href="<?php echo base_url(strtolower($datamenu->keterangan_menu_cat));?>" class="link"><?php echo $datamenu->keterangan_menu_cat; ?></a></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php 
                                                if($datamenu->status_menu == 1) { ?>
                                                <span id="stock-in" class="">STOK TERSEDIA</span>
                                                <?php } else { ?>
                                                <span id="stock-out" class="">HABIS</span>
                                                <?php } ?>
                                                <div class="clearfix"></div>
                                                <br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4><strong>Jumlah</strong></h4>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="input_qty" min="1" value="1" id="input_qty">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default" tabindex="-1" id="btn-add">
                                                            <i class="fa fa-plus-circle"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-default" tabindex="-1" id="btn-min">
                                                            <i class="fa fa-minus-circle"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <br>
                                                <a href="<?php echo base_url().'add/'.$datamenu->uri_dashed;?>" class="btn btn-success btn-lg btn-block"><i class="fa fa-shopping-cart"></i>&nbsp; <b>PESAN</b></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- product info -->
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>

                    <div class="row-fluid">
                        <div class="col-md-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#item-description-full" role="tab" data-toggle="tab"><span>Deskripsi Lengkap</span></a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane in active" id="item-description-full">
                                    <h3><?php echo $datamenu->nama_menu; ?></h3>
                                    <?php echo $datamenu->keterangan_menu; ?>
                                    <div class="clear"></div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section main content -->

<!-- section other product -->
<section id="sec_item_list">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Menu Lainnya</h2>
        </div>
        <div class="panel-body" style="padding: 15px 0;">
            <?php
            $i = 1;
            if($menuother->num_rows() == 0) {
                ?>

                <br><br>
                <div class="alert alert-warning">
                    <h4>Belum ada menu yang tersedia</h4>
                    <p>Mohon maaf untuk saat ini daftar menu tidak dapat ditampilkan</p>
                </div>
                <?php
            }
            else { ?>
            <div id="widget_other_items" class="item">
                <div class="row-fluid products-row others-slide">
                    <?php 
                    foreach($menuother->result() as $menuother) {
                        ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 first product-col slide">
                            <div class="wrap-item">
                                <div class="product-block">
                                    <h3 class="product-name name">
                                        <a href="<?php echo base_url().'detail/'.$menuother->uri_dashed;?>" title="<?php echo $menuother->nama_menu; ?>">
                                            <?php 
                                            if (strlen($menuother->nama_menu)>50) {
                                                echo substr($menuother->nama_menu, 0, 50)."..."; 
                                            } else {
                                                echo $menuother->nama_menu;
                                            }
                                            ?> 
                                        </a>
                                    </h3>
                                    <div class="image swap">
                                        <div class="product-img img">
                                            <?php 
                                            if($menuother->image!=""){
                                                ?>
                                                <a href="<?php echo base_url().'detail/'.$menuother->uri_dashed;?>" title="<?php echo $menuother->nama_menu; ?>" class="product-image img">
                                                    <img src="<?php echo base_url().'uploads/menu/'.$menuother->image;?>" alt="<?php echo $menuother->nama_menu; ?>" class="img-responsive">
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
                                                        <span class="price">Rp <?php echo number_format($menuother->harga,2,",","."); ?></span>                                    
                                                    </span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="action">
                                            <div class="cart">
                                                <a href="<?php echo base_url().'detail/'.$menuother->uri_dashed;?>" title="Lihat Detail" class="btn btn-view btn-outline"><span><span>Detail</span></span> </a>
                                                <a href="<?php echo base_url().'add/'.$menuother->uri_dashed;?>" title="Pesan" class="btn btn-shopping-cart btn-outline"><span><strong>Pesan</strong></span> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="nav-slide">
                        <span class="nav-prev _4th"></span>
                        <span class="nav-next _4th"></span>
                    </div>
                </div>
                <?php $i++; } ?>
            </div>
        </div>    
    </section>
    <!-- section other product -->
