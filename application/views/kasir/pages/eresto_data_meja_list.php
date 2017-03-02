<!-- Content Header (Page header) -->
<section class="content-header">
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('kasir');?>" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('kasir/meja');?>" title="<?php echo $title;?>"><?php echo $title;?></a></li>
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
                    <th>No Meja</th>
            	    <th>Keterangan</th>
            	    <th>Status</th>
            	    <th>Action</th>
                </tr>
            </thead>
    	    <tbody>
                <?php
                $start = 0;
                foreach ($meja_data as $meja)
                {
                ?>
                <tr>
        		    <td><?php echo $meja->no_meja ?></td>
        		    <td><?php echo $meja->keterangan ?></td>
        		    <td>
                    <?php
                    if ($meja->status == "1") {
                        echo "<span class='label label-success'>Kosong<span>";
                    } else {
                        echo "<span class='label label-danger'>Dipakai<span>";
                    }
                    ?>
                    </td>
        		    <td>
                        <?php 
                        echo anchor(site_url('kasir/meja_read/'.$meja->no_meja),'<i class="glyphicon glyphicon-search" title="View"></i>'); 
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