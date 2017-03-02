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
                    <ul class="step clearfix" id="order_step">
                        <li class="step_done_last step_done first">
                            <a href="<?php echo site_url('cart');?>">
                                <em>01.</em> Daftar Belanja
                            </a>
                        </li>
                        <li class="step_current second">
                            <span><em>02.</em> Login Member</span>
                        </li>
                        <li id="step_end" class="step_todo last">
                            <span><em>03.</em> CheckOut</span>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                    <br>

                    <div id="widget_login">
                        <div class="row-fluid">
                            <div class="col-md-1">
                            </div>

                            <div class="col-md-5">
                                <center>
                                    <img src="<?php echo base_url();?>themes/frontend/images/fastrestochef.png" class="img-responsive" style="width: 70%;">
                                </center>
                            </div>

                            <div class="col-md-5">
                                <!-- login account -->
                                <div id="form-verifikasi">
                                    <h4 style="color: #58a000;"><strong>Verifikasi Data Pemesan</strong></h4>

                                    <?php if($this->session->userdata('memberid')!= '') { ?>
                                    <div class="well" id="check-member">
                                        <label class="radio-inline">
                                            <input type="radio" name="radiomember" id="radioMember" value="members" checked disabled> 
                                            <strong>Terdaftar Member</strong>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="radiomember" id="radioGuest" value="guests" disabled> 
                                            <strong>Bukan Member</strong>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="well" id="check-member">
                                        <label class="radio-inline">
                                            <input type="radio" name="radiomember" id="radioMember" value="members"> 
                                            <strong>Terdaftar Member</strong>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="radiomember" id="radioGuest" value="guests"> 
                                            <strong>Bukan Member</strong>
                                        </label>
                                    </div>
                                    <?php } ?>

                                    <?php
                                    if($this->session->flashdata('message') <> '') {
                                        ?>
                                        <div class="alert alert-danger"> 
                                            <?php echo $this->session->flashdata('message'); ?>
                                        </div>
                                        <?php
                                    } ?>

                                    <div class="well" id="well-login">
                                        <form role="form" action="<?php echo site_url('front/cart_login');?>" method="post">
                                            <div class="form-group">
                                                <span>Silahkan Login jika anda memiliki akun member</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputuserlogin">Username</label>
                                                <input type="text" class="form-control" id="inputuserlogin" name="inputuserlogin" placeholder="Masukkan username">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputpasslogin">Password</label>
                                                <input type="password" class="form-control" id="inputpasslogin" name="inputpasslogin" placeholder="Password">
                                            </div>
                                            <button type="submit" class="btn btn-warning"><i class="fa fa-lock"></i>&nbsp; Login</button>
                                        </form>
                                    </div>

                                    <div class="clearfix"></div>
                                    <form role="form" action="<?php echo site_url('checkout');?>" method="post">
                                        <div class="form-group">
                                            <label for="inputguestname">Nama Pemesan</label>
                                            <?php if($this->session->userdata('memberid')!= '') { ?>
                                            <input type="text" class="form-control" id="inputguestname" name="inputguestname" value="<?php echo $this->session->userdata('membername'); ?>" readonly required>
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $("#inputnomeja").focus();
                                                });
                                            </script>

                                            <?php } else { ?>
                                            <input type="text" class="form-control" id="inputguestname" name="inputguestname" placeholder="nama pemesan..." required>
                                            <?php } ?>

                                            <input type="hidden" class="form-control" id="nomeja" name="nomeja">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputnomeja">Nomor Meja</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="inputnomeja" name="inputnomeja" placeholder="nomor meja..." readonly required>
                                                <span class="input-group-btn">
                                                    <a href="#" class="btn btn-default" data-toggle="modal" data-target="#showTables"><i class="fa fa-sitemap"></i>&nbsp; Pilih Meja</a>
                                                </span>
                                            </div><!-- /input-group -->
                                            <a onclick="clearTables()" class="clearTable"><i class="fa fa-close"></i>&nbsp; <strong>Batalkan Pilihan Meja</strong></a>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block btn-lg" onclick="sendOrder()" id="btn-verifikasi"><i class="fa fa-shopping-cart"></i>&nbsp; Lanjutkan</button>
                                    </form>
                                    <br><br>
                                </div>
                                <!-- login account -->

                                <!-- Modal -->
                                <div class="modal fade" id="showTables" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-sitemap"></i>&nbsp; Booking Meja</h4>
                                            </div>
                                            <div class="modal-body">
                                                <?php 
                                                if(is_null($viewMeja)) {
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
                                                        <?php
                                                        foreach($viewMeja as $meja) {
                                                            if($meja->status != 0) {
                                                                ?>

                                                                <label>
                                                                    <input type="radio" name="optmeja" id="<?php echo $meja->no_meja;?>" value="<?php echo $meja->no_meja; ?>">
                                                                    Meja <?php echo $meja->no_meja; ?>
                                                                </label>

                                                                <?php } else { ?>

                                                                <label class="disabled">
                                                                    <input type="radio" name="optmeja" id="<?php echo $meja->no_meja;?>" value="<?php echo $meja->no_meja; ?>" disabled>
                                                                    <span><i class="fa fa-times-circle"></i></span>
                                                                    Meja <?php echo $meja->no_meja; ?>
                                                                </label>

                                                                <?php
                                                            }
                                                            $i++;
                                                        }
                                                        ?>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp; Close</button>
                                                    <button class="btn btn-success" onclick="sendTableChoice();"><i class="fa fa-check-square-o"></i>&nbsp; <strong>Konfirmasi Meja Saya</strong></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-1">
                                </div>

                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function() {
                                $("#radioMember").click(function() {
                                    $("#well-login").show('slow');
                                    $("#inputguestname").prop('disabled', true);
                                    $("#inputuserlogin").focus();
                                });

                                $("#radioGuest").click(function() {
                                    $("#well-login").hide('slow');
                                    $("#inputguestname").prop('disabled', false);
                                    $("#inputguestname").focus();
                                });

                                
                            });

                            function sendTableChoice() {
                                var chkId = '';
                                $(':radio:checked').each(function() {
                                    //chkId += $(this).val() + ",";
                                    chkId = $(this).val();
                                });
                                //chkId = chkId.slice(0,-1);  

                                if (chkId=='') {
                                    alert("Maaf anda belum memilih nomor meja yang anda gunakan!");
                                } else {
                                    $('#inputnomeja').val(chkId);
                                    $('#nomeja').val(chkId);
                                    $('#showTables').modal('hide');
                                }
                            }

                            function sendOrder() {
                                if($('#inputnomeja').val()=='') {
                                    alert("Maaf anda belum memilih nomor meja yang anda gunakan!");
                                    $('#showTables').modal('show');
                                } else {
                                    $( "#btn-verifikasi" ).submit();
                                }
                            }

                            function clearTables() {
                                $('#inputnomeja').val('');
                                $('#nomeja').val('');
                            }
                        </script>
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