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
    <div class="row col-lg-12" style="margin-bottom: 10px;">
        <div class="col-lg-3"></div>
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
                    <th>No Transaksi</th>
            	    <th>User</th>
                    <th>Time</th>
            	    <th>Status</th>
            	    <th>Action</th>
                </tr>
            </thead>
    	    <tbody>
                <?php
                $start = 0;
                foreach ($translog_data as $translog)
                {
                ?>
                <tr>
        		    <td>
                        <a href="<?php echo site_url('backend/pemesanan_detail/'.$translog->no_transaksi);?>" target="_self">
                            <?php echo $translog->no_transaksi ?>
                        </a>
                    </td>
        		    <td>
                        <a href="<?php echo site_url('backend/user_read/'.$translog->id_user);?>" target="_self">
                            <?php echo $translog->username ?>
                        </a>
                    </td>
                    <td><?php echo $translog->time_log ?></td>
        		    <td>
                    <?php
                    if ($translog->status == "1") {
                        echo "<span class='label label-primary'>Log Pemesanan</span>";
                    } else {
                        echo "<span class='label label-success'>Log Pembayaran</span>";
                    }
                    ?>
                    </td>
        		    <td>
                        <?php 
                        echo anchor(site_url('backend/translog_delete/'.$translog->no_transaksi),'<i class="glyphicon glyphicon-trash" title="Delete"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                        ?>
                    </td>
               </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>