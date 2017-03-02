<!-- Content Header (Page header) -->
<section class="content-header">
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('pemesanan');?>" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo site_url('pemesanan');?>" title="Pemesanan">Pemesanan</a></li>
            <li class="active"><?php echo $title;?></li>
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
                    <p>*** Faktur: <?php echo $dt_pesanan->no_transaksi;?> | <?php echo date("d-m-Y | H:m:s");?> ***<br>
                    /**/ Operator <?php echo $user->nama_user;?> /**/</p>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered" id="">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Menu</th>
                                <th>Jumlah Pesan</th>
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
                            </tr>
                        <?php
                        } ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer text-right">
                    <?php if ($dt_pesanan->status_pemesanan == "1") {
                        echo anchor(site_url('pemesanan/pemesanan_updatest/2'.$dt_pesanan->no_transaksi), '<button class="btn btn-success btn-flat">Diterima / Dilayani</button>', 'onclick="javasciprt: return confirm(\'Pesanan dilayani ?\')"');
                        
                    } ?>
                    <button class="btn btn-warning btn-flat" onclick="self.history.back()">Back</button>
                </div>
            </div>
        </div>
    </div>

</section>
