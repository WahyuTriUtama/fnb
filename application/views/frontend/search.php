<ol class="breadcrumb">
    <li><a href="<?php echo base_url('index');?>"><i class="fa fa-home"></i>&nbsp; Home</a></li>
    <li class="active"><?php echo $judul; ?></li>
</ol>

<!-- section main content -->
<section id="sec_container">
    <div class="row">

        <!-- main content -->
        <div class="col-md-12" id="main-content">
            <div class="panel panel-default panel-clean" style="margin-bottom: 0;">
                <div class="panel-heading">
                    <h2><?php echo $judul; ?></h2>
                </div>
                <div class="panel-body">
                    <div id="widget_product_best">
                        <div class="media-banner">
                            <a href="<?php echo base_url().'menu'?>">
                                <img src="<?php echo base_url();?>themes/frontend/images/center-home4.jpg" class="img-responsive">
                            </a>
                        </div>
                        <div class="box-products">
                            <?php 
                            if(!$hasil) {
                                ?>

                                <div class="well">
                                    <br>
                                    <div class="alert alert-danger">
                                        <h4>Menu tidak ditemukan</h4>
                                        <p>Mohon maaf untuk saat ini daftar menu tidak dapat ditampilkan</p>
                                    </div>
                                    <br>
                                </div>
                                <?php
                            }
                            else {
                                ?>

                                <div class="item">
                                
                                    <div class="row-fluid products-row best-slide">
                                        <?php 
                                        $i = 1;

                                        foreach($hasil as $rowlist) {
                                            ?>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 first product-col no-both slide">
                                                <div class="wrap-item">
                                                    <div class="product-block">
                                                        <?php 
                                                        if (strlen($rowlist->nama_menu)>50) {
                                                            ?>
                                                            <h3 class="product-name name"><a href="<?php echo base_url().'detail/'.$rowlist->uri_dashed;?>" title="<?php echo $rowlist->nama_menu; ?>"><?php echo substr($rowlist->nama_menu, 0, 50)."..."; ?></a></h3>
                                                            <?php } else { ?>
                                                            <h3 class="product-name name"><a href="<?php echo base_url().'detail/'.$rowlist->uri_dashed;?>" title="<?php echo $rowlist->nama_menu; ?>"><?php echo $rowlist->nama_menu; ?></a></h3>
                                                            <?php 
                                                        }
                                                        ?>    
                                                        <div class="image swap">
                                                            <div class="product-img img">
                                                                <?php 
                                                                if($rowlist->image!=""){
                                                                    ?>
                                                                    <a href="<?php echo base_url().'detail/'.$rowlist->uri_dashed;?>" title="<?php echo $rowlist->nama_menu; ?>" class="product-image img">
                                                                        <img src="<?php echo base_url().'uploads/menu/'.$rowlist->image;?>" alt="<?php echo $rowlist->nama_menu; ?>" class="img-responsive">
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
                                                                            <span class="price">Rp <?php echo number_format($rowlist->harga,2,",","."); ?></span>                                    
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="action">
                                                                <div class="cart">
                                                                    <a href="<?php echo base_url().'detail/'.$rowlist->uri_dashed;?>" title="Lihat Detail" class="btn btn-view btn-outline"><span><span>Detail</span></span> </a>
                                                                    <a href="<?php echo base_url().'add/'.$rowlist->uri_dashed;?>" title="Pesan" class="btn btn-shopping-cart btn-outline"><span><strong>Pesan</strong></span> </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $i++;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- section main content

    <!-- section update news -->
    <section id="sec_news">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Food Fast Store</h2>
            </div>
            <div class="panel-body">
                <ul class="list-group" id="tag-promo">
                    <li class="list-group-item">
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
                    </li>
                    <li class="list-group-item">
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
                    </li>
                    <li class="list-group-item">
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
                    </li>
                    <li class="list-group-item">
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
                    </li>
                </ul>
            </div>
        </div>
    </section>
            <!-- section update news -->