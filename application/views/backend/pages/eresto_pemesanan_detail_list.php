<!-- Content Header (Page header) -->
<section class="content-header">
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('backend');?>" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('backend/pemesanan');?>" title="<?php echo $title;?>"><?php echo $title;?></a></li>
        </ol>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->flashdata('message') <> '' ? $this->session->flashdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right"></div>
    </div>
    <div class="row col-lg-12">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3 class="panel-title">E-RESTO</h3>
                    <p>*** Faktur: <?php echo $dt_pesanan->no_transaksi;?> ***<br>
                    <?php foreach ($translog as $log) {
                        if ($log->status == "0") { ?>
                            /**/ Kasir <?php echo $log->username;?> | <?php echo $log->time_log;?> /**/
                       <?php } elseif ($log->status == "1") { ?>
                            /**/ Operator <?php echo $log->username;?> | <?php echo $log->time_log;?> /**/<br>
                       <?php } else{
                            echo "";
                       }
                    }?>
                    </p>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered" id="">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Menu</th>
                                <th>Jml Pesan</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $start = 0;
                        foreach ($pdetail_data as $pdetail)
                        { ?>
                            <tr>
                                <td><?php echo ++$start ?></td>
                                <td><?php echo $pdetail->nama_menu ?> ( <?php echo $pdetail->harga ?> )</td>
                                <td><?php echo $pdetail->jml_pesan ?></td>
                                <td><?php echo $pdetail->jml_harga ?></td>
                            </tr>
                        <?php
                        } ?>
                        </tbody>
                    </table>
                    <li>Total belanja: Rp. <?php echo $dt_pesanan->total_belanja;?></li>
                </div>
                <div class="panel-footer text-right">
                    <?php if ($dt_pesanan->status_pemesanan == "2") {
                        echo anchor(site_url('backend/pemesanan_updatest/0'.$dt_pesanan->no_transaksi), '<button class="btn btn-primary btn-flat">Dibayar</button>', 'onclick="javasciprt: return confirm(\'Pemesanan telah dibayar ?\')"');
                        
                    } ?>
                    <button class="btn btn-warning btn-flat" onclick="self.history.back()">Back</button>
                </div>
            </div>
        </div>
    </div>

</section>
