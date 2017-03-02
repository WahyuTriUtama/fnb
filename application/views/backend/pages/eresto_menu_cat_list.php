<!-- Content Header (Page header) -->
<section class="content-header">
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('backend');?>" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('backend/menucat');?>" title="<?php echo $title;?>"><?php echo $title;?></a></li>
        </ol>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <div class="row col-lg-12" style="margin-bottom: 10px;">
        <div class="col-lg-3">
            <?php echo anchor(site_url('backend/menucat_create'), '<i class="fa fa-plus" title="View"></i>  Create', 'class="btn btn-success"'); ?>
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
                    <th width="8%">No</th>
            	    <th width="80%">Keterangan</th>
            	    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $start = 0;
            foreach ($menucat_data as $menucat)
            {
                ?>
                <tr>
            	    <td><?php echo ++$start ?></td>
            	    <td><?php echo $menucat->keterangan_menu_cat ?></td>
    	            <td>
                        <?php 
                        echo anchor(site_url('backend/menucat_read/'.$menucat->id_menu_cat),'<i class="glyphicon glyphicon-search" title="View"></i>'); 
                        echo ' | '; 
                        echo anchor(site_url('backend/menucat_update/'.$menucat->id_menu_cat),'<i class="glyphicon glyphicon-edit" title="Update"></i>'); 
                        echo ' | '; 
                        echo anchor(site_url('backend/menucat_delete/'.$menucat->id_menu_cat),'<i class="glyphicon glyphicon-trash" title="Delete"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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