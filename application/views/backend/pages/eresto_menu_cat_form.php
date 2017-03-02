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

    <div class="row col-lg-12">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $button ?></h3>
                </div>
                <?php echo form_open_multipart($action);?>
                    <div class="panel-body">
                	    <div class="form-group">
                            <label for="varchar">Kategori Menu <?php echo form_error('keterangan_menu_cat') ?></label>
                            <input type="text" class="form-control" name="keterangan_menu_cat" id="keterangan_menu_cat" placeholder="Enter kategori menu" value="<?php echo $keterangan_menu_cat; ?>" />
                        </div>
    	           </div>
                    <div class="panel-footer">
                        <input type="hidden" name="id_menu_cat" value="<?php echo $id_menu_cat; ?>" /> 
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-warning" onclick="self.history.back()">Cancel</button>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>  

</section>
