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

    <?php echo $model;?>
    <div class="row col-lg-12" style="margin-bottom: 10px;">
        <div class="col-lg-3">
            <?php //echo anchor(site_url('backend/pemesanan_create'), '<i class="fa fa-plus" title="Create"></i>  Create', 'class="btn btn-success"'); ?>
        </div>
        <div class="col-lg-6 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->flashdata('message') <> '' ? $this->session->flashdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-lg-3 text-right"></div>
    </div>
    <div class="col-lg-12">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>No Transaksi</th>
        		    <th>Member</th>
        		    <th>Meja</th>
                    <th>Menu Dipesan</th>
        		    <th>Status</th>
                    <th>Bayar</th>
        		    <th>Action</th>
                </tr>
            </thead>
    	    <tbody>
                <?php
                $start = 0;
                foreach ($pemesanan_data as $pemesanan)
                {?>
                <tr>
                    <td><?php echo $pemesanan->tgl_transaksi ?></td>
        		    <td><?php echo $pemesanan->no_transaksi ?></td>
        		    <td>
                        <a href="<?php echo base_url(); ?>backend/member_read/<?php echo $pemesanan->id_member;?>" target="_self">
                            <?php echo $pemesanan->nama_member ?>
                        </a>
                    </td>
        		    <td>
                        <a href="<?php echo base_url(); ?>backend/meja_read/<?php echo $pemesanan->no_meja;?>" target="_self">
                            <?php echo $pemesanan->no_meja ?>
                        </a>
                    </td>
                    <td>
                        <ul style="margin-left: -20px;">
                        <?php
                            $detail = $this->pdetailmodel->get_by_id($pemesanan->no_transaksi);
                            foreach ($detail as $val) {
                                echo "<li><a href='".site_url('backend/menu_read/'.$val->id_menu)."'>".$val->nama_menu." ( ".$val->jml_pesan." )</a></li>";
                            }
                        ?>
                        </ul>
                    </td>
        		    <td>
                        <?php 
                        if ($pemesanan->status_pemesanan == '1') {
                            echo "<span class='label label-success'>Pelayanan</span>";
                        }elseif ($pemesanan->status_pemesanan == '2') {
                            echo "<span class='label label-primary'>Pembayaran</span>";
                        }else{
                            echo "<span class='label label-danger'>Finish/Close</span>";
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $pemesanan->total_belanja ?> &nbsp; &nbsp; &nbsp;
                        <?php echo anchor(site_url('backend/pemesanan_detail/'.$pemesanan->no_transaksi),'<i class="glyphicon glyphicon-search" title="Detail Belanja"></i>');?>
                    </td>
        		    <td>
                        <div id="handle">
                            <?php 
                            if ($pemesanan->status_pemesanan == '1') {
                                $url = 'backend/pemesanan_updatest/2'.$pemesanan->no_transaksi;
                                $btn = '<button class="btn btn-success">Diterima</button>';
                                $on = 'onclick="javasciprt: return confirm(\'Pemesanan dilayani ?\')"';
                            }elseif ($pemesanan->status_pemesanan == '2') {
                                $url = 'backend/pemesanan_updatest/0'.$pemesanan->no_transaksi;
                                $btn = '<button class="btn btn-primary">Dibayar</button>';
                                $on = 'onclick="javasciprt: return confirm(\'Pemesanan telah dibayar ?\')"';
                            }else{
                                $url = "backend/pemesanan#";
                                $btn = '<button class="btn btn-default btn-flat"><i class="glyphicon glyphicon-ban-circle" style="color:red"></i></button>';
                                $on = '';
                            }
                            echo anchor(site_url($url), $btn, $on); 
                        ?>
                        </div>
        		    </td>
    	        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</section>