<!-- Content Header (Page header) -->
<section class="content-header">
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('backend');?>" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('backend/guest_book');?>" title="<?php echo $title;?>"><?php echo $title;?></a></li>
        </ol>
    </div>
</section>

<!-- Main content -->
<section class="content">
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
                    <th>Nama</th>
        		    <th>Email</th>
                    <th>Telp.</th>
                    <th>Read</th>
        		    <th>Action</th>
                </tr>
            </thead>
    	    <tbody>
                <?php
                $start = 0;
                foreach ($gbook_data as $gbook)
                { ?>
                <tr>
                    <td><?php echo $gbook->sent_date ?></td>
        		    <td><?php echo $gbook->nama ?></td>
        		    <td>
                        <a href="mailto:<?php echo $gbook->email;?>" target="_self">
                            <?php echo $gbook->email ?>
                        </a>
                    </td>
        		    <td>
                        <a href="telp:<?php echo $gbook->telp;?>" target="_self">
                            <?php echo $gbook->telp ?>
                        </a>
                    </td>
                    <td>
                        <span class="label label-<?php echo ($gbook->flag == 0) ? 'success' : 'warning' ; ?>"><?php echo ($gbook->flag == 0) ? 'N' : 'Y' ; ?>
                        </span>
                    </td>
                    <td>
                        <?php
                            echo anchor(site_url('backend/gbook_read/'.$gbook->id_gb),'<i class="glyphicon glyphicon-search" title="Read"></i>');
                        ?>
                    </td>
    	        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</section>