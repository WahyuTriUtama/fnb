<section id="sec_profile">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-4">
                <center>
                    <img src="<?php echo base_url();?>themes/frontend/images/fastrestochef.png" class="img-responsive" style="width: 100%;">
                </center>
            </div>
            <div class="col-md-8">
                <h1>Food Fast Store</h1>
                <h3>Perintis Warung makanan cepat saji modern</h3>
                <p>ecommerce adalah Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum ad hic iste. Laboriosam molestiae iure et, accusamus consequuntur distinctio doloremque, rerum, ex vitae dicta qui amet, quasi ea magnam eum....</p>
                <p><a class="btn btn-default btn-lg btn-outline" role="button" href="<?php echo base_url('menu');?>">Selengkapnya &raquo;</a></p>
            </div>
        </div>
    </div>

    <div class="box-products">
        <h1>Favourite Menu</h1>
        <!-- memanggil fungsi list menu favorit -->
        <?php 
        if(!$favorite_menu) {
            ?>

            <div class="alert alert-danger">
                <h4>Belum ada menu yang tersedia</h4>
                <p>Mohon maaf untuk saat ini daftar menu tidak dapat ditampilkan</p>
            </div>
            <?php
        }
        else {
            ?>

            <div class="item">
                <div class="row-fluid products-row feature-slide">
                    <?php 
                    $i = 1;

                    foreach($favorite_menu as $row) {
                        ?>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 first product-col no-both slide">
                            <div class="wrap-item">
                                <div class="product-block">
                                    <h3 class="product-name name"><a href="<?php echo site_url('detail/'.$row->uri_dashed);?>" title="<?php echo $row->nama_menu; ?>"><?php echo $row->nama_menu; ?></a></h3>
                                    <div class="image swap">
                                        <div class="product-img img">
                                            <?php 
                                            if($row->image!=""){
                                                ?>
                                                <a href="<?php echo site_url('detail/'.$row->uri_dashed);?>" title="<?php echo $row->nama_menu; ?>" class="product-image img">
                                                    <img src="<?php echo base_url().'uploads/menu/'.$row->image;?>" alt="<?php echo $row->nama_menu; ?>" class="img-responsive">
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
                                                        <span class="price">Rp <?php echo number_format($row->harga,2,",","."); ?></span>                                  
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="desc">
                                            <?php echo substr($row->keterangan_menu, 0, 100)."..." ?>                               
                                            <a href="<?php echo site_url('detail/'.$row->uri_dashed);?>" title="Bacon Clubhouse Burger " class="link-learn">Learn More</a>
                                        </p>

                                        <div class="action">
                                            <div class="cart">
                                                <a href="<?php echo site_url('detail/'.$row->uri_dashed);?>" title="Lihat Detail" class="btn btn-view btn-outline"><span><span>Detail</span></span> </a>
                                                <a href="<?php echo site_url('add/'.$row->uri_dashed);?>" title="Pesan" class="btn btn-shopping-cart btn-outline"><span><strong>Pesan</strong></span> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>

                <div class="nav-slide">
                    <span class="nav-prev _1st"></span>
                    <span class="nav-next _1st"></span>
                </div>
            </div>

            <?php } ?>
        </div>
    </section>
    <!-- section about us -->

    <!-- section main content -->
    <section id="sec_container">
        <div class="row">

            <!-- main content -->
            <div class="col-md-12" id="main-content">
                <div class="panel panel-default panel-clean" style="margin-bottom: 0;">
                    <div class="panel-heading">
                        <h2>Best Food Fast</h2>
                    </div>
                    <div class="panel-body">
                        <div id="widget_product_best">
                            <div class="media-banner">
                                <a href="<?php echo site_url('menu');?>">
                                    <img src="<?php echo base_url();?>themes/frontend/images/center-home4.jpg" class="img-responsive">
                                </a>
                            </div>
                            <div class="box-products">
                                <?php 
                                if(!$new_menu) {
                                    ?>

                                    <div class="alert alert-danger">
                                        <h4>Belum ada menu yang tersedia</h4>
                                        <p>Mohon maaf untuk saat ini daftar menu tidak dapat ditampilkan</p>
                                    </div>
                                    <?php
                                }
                                else {
                                    ?>

                                    <div class="item">
                                        <div class="row-fluid products-row best-slide">
                                            <?php 
                                            foreach($new_menu as $rowlist) {
                                                ?>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 first product-col no-both slide">
                                                    <div class="wrap-item">
                                                        <div class="product-block">
                                                            <?php 
                                                            if (strlen($rowlist->nama_menu)>50) {
                                                                ?>
                                                                <h3 class="product-name name"><a href="<?php echo site_url('detail/'.$rowlist->uri_dashed);?>" title="<?php echo $rowlist->nama_menu; ?>"><?php echo substr($rowlist->nama_menu, 0, 50)."..."; ?></a></h3>
                                                                <?php } else { ?>
                                                                <h3 class="product-name name"><a href="<?php echo site_url('detail/'.$rowlist->uri_dashed);?>" title="<?php echo $rowlist->nama_menu; ?>"><?php echo $rowlist->nama_menu; ?></a></h3>
                                                                <?php 
                                                            }
                                                            ?>    
                                                            <div class="image swap">
                                                                <div class="product-img img">
                                                                    <?php 
                                                                    if($rowlist->image!=""){
                                                                        ?>
                                                                        <a href="<?php echo site_url('detail/'.$rowlist->uri_dashed);?>" title="<?php echo $rowlist->nama_menu; ?>" class="product-image img">
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
                                                                        <a href="<?php echo site_url('detail/'.$rowlist->uri_dashed);?>" title="Lihat Detail" class="btn btn-view btn-outline"><span><span>Detail</span></span> </a>
                                                                        <a href="<?php echo site_url('add/'.$rowlist->uri_dashed);?>" title="Pesan" class="btn btn-shopping-cart btn-outline"><span><strong>Pesan</strong></span> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <center>
                                <a href="<?php echo site_url('front/menu');?>" class="btn btn-default"><strong>Lihat Menu Lainnya &nbsp;&rarr;</strong></a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section main content -->

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

