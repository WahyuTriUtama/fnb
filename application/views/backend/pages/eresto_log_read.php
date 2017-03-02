<!-- Content Header (Page header) -->
<section class="content-header">
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('backend');?>" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('backend/translog');?>" title="<?php echo $title;?>"><?php echo $title;?></a></li>
        </ol>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <div class="row col-lg-12">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Log Detail</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr><td>No Transaksi</td><td>:</td><td><?php echo $no_transaksi; ?></td></tr>
                        <tr><td>User</td><td>:</td><td><?php echo $id_user; ?></td></tr>
                        <tr><td>Time</td><td>:</td><td><?php echo $time_log; ?></td></tr>
                        <tr><td>Status</td><td>:</td><td><?php if($status=='1'){echo "<span style='color:green'>Log Pemesanan</span>";}else{echo "<span style='color:blue'>Log Pembayaran</span>";} ?></td></tr>
                    </table>
                </div>
            </div>
            <div class="">
                    <button class="btn btn-primary" onclick="self.history.back()">Back</button>
            </div>
        </div>
    </div>
</section>