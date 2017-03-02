<!-- Content Header (Page header) -->
<section class="content-header">
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('backend');?>" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('backend/ugroup');?>" title="<?php echo $title;?>"><?php echo $title;?></a></li>
        </ol>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <div class="row col-lg-12" style="margin-bottom: 10px;">
        <div class="col-lg-3">
            <?php echo anchor(site_url('backend/ugroup_create'), '<i class="fa fa-plus" title="Create"></i>  Create', 'class="btn btn-success"'); ?>
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
                    <th width="10%">Id Group</th>
        		    <th width="60%">Keterangan</th>
        		    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $start = 0;
                foreach ($ugroup_data as $ugroup)
                { ?>
                <tr>
            	    <td><?php echo $ugroup->id_group ?></td>
            	    <td><?php echo $ugroup->keterangan ?></td>
            	    <td>
                        <?php 
                        echo anchor(site_url('backend/ugroup_read/'.$ugroup->id_group),'<i class="glyphicon glyphicon-search" title="View"></i>'); 
                        echo ' | '; 
                        echo anchor(site_url('backend/ugroup_update/'.$ugroup->id_group),'<i class="glyphicon glyphicon-edit" title="Update"></i>'); 
                        echo ' | '; 
                        echo anchor(site_url('backend/ugroup_delete/'.$ugroup->id_group),'<i class="glyphicon glyphicon-trash" title="Delete"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                        ?>
                    </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
        </table>
    </div>

</section><!-- /.content -->