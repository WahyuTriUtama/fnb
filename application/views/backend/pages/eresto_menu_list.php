<!-- Content Header (Page header) -->
<section class="content-header">
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('backend');?>" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('backend/menu');?>" title="<?php echo $title;?>"><?php echo $title;?></a></li>
        </ol>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <div class="row col-lg-12" style="margin-bottom: 10px;">
        <div class="col-lg-3">
            <?php echo anchor(site_url('backend/menu_create'), '<i class="fa fa-plus" title="Create"></i>  Create', 'class="btn btn-success"'); ?>
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
                    <th>No</th>
        		    <th>Kategori Menu</th>
                    <th>Image</th>
        		    <th>Nama Menu</th>
        		    <th>Harga</th>
        		    <th>Status</th>
                    <th>Fav</th>
        		    <th width="10%">Action</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;
            foreach ($menu_data as $menu)
            { ?>
            <tr>
        	    <td><?php echo ++$start ?></td>
        	    <td><?php echo $menu->keterangan_menu_cat ?></td>
                <td>
                    <a href="<?php echo site_url('backend/menu_read/'.$menu->id_menu) ?>" target="_self">
                        <img src="<?php echo base_url();?>uploads/menu/<?php echo $menu->image ?>" height="60" width="50">
                    </a>
                </td>
        	    <td><?php echo $menu->nama_menu ?></td>
        	    <td><?php echo $menu->harga ?></td>
        	    <td>
                <?php
                if ($menu->status_menu == "1") {
                    echo "<span class='label label-success'>Tersedia</span>";
                } else {
                    echo "<span class='label label-danger'>Kosong</span>";
                }
                ?>
                </td>
                <td>
                <?php
                if ($menu->is_favorite == "1") {
                    echo "Y";
                } else {
                    echo "N";
                }
                ?>
                </td>
        	    <td>
            		<?php 
                    echo anchor(site_url('backend/menu_read/'.$menu->id_menu),'<i class="glyphicon glyphicon-search" title="View"></i>'); 
                    echo ' | '; 
                    echo anchor(site_url('backend/menu_update/'.$menu->id_menu),'<i class="glyphicon glyphicon-edit" title="Update"></i>'); 
                    echo ' | '; 
                    echo anchor(site_url('backend/menu_delete/'.$menu->id_menu),'<i class="glyphicon glyphicon-trash" title="Delete"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                    ?>
        	    </td>
            </tr>
             <?php } ?>
            </tbody>
        </table>
    </div>

</section>