<!-- Content Header (Page header) -->
<section class="content-header">
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('backend');?>" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('backend/meja');?>" title="<?php echo $title;?>"><?php echo $title;?></a></li>
        </ol>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <div class="row col-lg-12">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $button ?></h3>
                </div>
                <form action="<?php echo $action; ?>" method="post">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="varchar">No Meja <?php echo form_error('no_meja') ?></label>
                            <input type="number" class="form-control" name="no_meja" placeholder="Enter no meja" value="<?php echo $no_meja; ?>" /> 
                        </div>
            	        <div class="form-group">
                            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Enter keterangan" value="<?php echo $keterangan; ?>" />
                        </div>
            	        <div class="form-group">
                            <label for="tinyint">Status <?php echo form_error('status') ?></label>
                            <select name="status" class="form-control">
                                <option value="1">Kosong</option>
                                <option value="0">Dipakai</option>
                            </select>
                        </div>
    	            </div>
                    <div class="panel-footer">
                         
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-default" onclick="self.history.back()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>