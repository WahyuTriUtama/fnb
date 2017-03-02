<!-- Content Header (Page header) -->
<section class="content-header">
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('kasir');?>" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo site_url('kasir/meja');?>" title="<?php echo $title;?>"><?php echo $title;?></a></li>
            <li class="active">View</li>
        </ol>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <div class="row col-lg-12">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">View Detail</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr><td>No Meja</td><td>:</td><td><?php echo $no_meja; ?></td></tr>
                        <tr><td>Keterangan</td><td>:</td><td><?php echo $keterangan; ?></td></tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>
                            <?php 
                            if ($status == "1") {
                                echo "Meja Kosong";
                            } else {
                                echo "Meja Dipakai";
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