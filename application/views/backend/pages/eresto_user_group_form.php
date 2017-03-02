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

    <div class="row col-lg-12">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $button ?></h3>
                </div>
                <form action="<?php echo $action; ?>" method="post">
                    <div class="panel-body">
                        <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Enter keterangan" value="<?php echo $keterangan; ?>" />
                    </div>
                    <div class="panel-footer">
                        <input type="hidden" name="id_group" value="<?php echo $id_group; ?>" /> 
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-default" onclick="self.history.back()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section><!-- /.content -->
    