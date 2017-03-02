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
                    <div id="showTables">
                        <?php 
                        if(!$viewMeja) {
                            ?>
                            <br><br>
                            <div class="alert alert-warning">
                                <h4>Belum ada data meja yang tersedia</h4>
                                <p>Mohon maaf untuk saat ini daftar meja tidak dapat ditampilkan</p>
                            </div>
                            <?php
                        } else { 

                            $i = 1;
                            ?>
                            <div class="radio">
                                <div class="row">
                                    <?php
                                    foreach($viewMeja as $meja) {
                                        if($meja->status != 0) {
                                            ?>

                                            <div class="col-md-2">
                                                <label>
                                                    <input type="radio" name="optmeja" id="<?php echo $meja->no_meja;?>" value="<?php echo $meja->no_meja; ?>" disabled>
                                                    <span class="available"><i class="fa fa-check-circle"></i></span>
                                                    Meja <?php echo $meja->no_meja; ?>
                                                </label>
                                            </div>

                                            <?php } else { ?>

                                            <div class="col-md-2">
                                                <label class="disabled">
                                                    <input type="radio" name="optmeja" id="<?php echo $meja->no_meja;?>" value="<?php echo $meja->no_meja; ?>" disabled>
                                                    <span><i class="fa fa-times-circle"></i></span>
                                                    Meja <?php echo $meja->no_meja; ?>
                                                </label>
                                            </div>

                                            <?php
                                        }
                                        $i++;
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php } ?>
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