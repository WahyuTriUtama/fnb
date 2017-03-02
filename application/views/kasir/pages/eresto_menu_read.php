<!-- Content Header (Page header) -->
<section class="content-header">
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('kasir');?>" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo site_url('kasir/menu');?>" title="<?php echo $title;?>"><?php echo $title;?></a></li>
            <li class="active">View</li>
        </ol>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <div class="row col-lg-12">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Image Menu</h3>
                </div>
                <div class="panel-body">
                    <?php if ($image != "") {?>
                        <div style="padding:5px">
                            <a href="<?php echo base_url();?>uploads/menu/<?php echo $image;?>" target="_blank">
                                <img src="<?php echo base_url();?>uploads/menu/<?php echo $image;?>">
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">View Detail</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                	    <tr><td>Kategori Menu</td><td>:</td><td><?php echo $id_menu_cat; ?></td></tr>
                	    <tr><td>Nama Menu</td><td>:</td><td><?php echo $nama_menu; ?></td></tr>
                	    <tr><td>Harga</td><td>:</td><td><?php echo $harga; ?></td></tr>
                	    <tr><td>Keterangan Menu</td><td>:</td><td><?php echo $keterangan_menu; ?></td></tr>
                	    <tr>
                            <td>Status</td><td>:</td>
                            <td>
                            <?php
                            if ($status_menu == "1") {
                                echo "Menu Tersedia";
                            } else {
                                echo "Menu kosong";
                            }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Favorite</td><td>:</td>
                            <td>
                            <?php
                            if ($is_favorite == "1") {
                                echo "Yes";
                            } else {
                                echo "No";
                            }
                            ?>
                            </td>
                        </tr>
                    </table>
    	        </div>
            </div>
            <div class="">
                    <button class="btn btn-primary" onclick="self.history.back()">Back</button>
            </div>
        </div>
    </div>

</section>