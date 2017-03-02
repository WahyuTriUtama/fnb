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

    <div class="row">
        <?php if ($this->session->flashdata('message') <> '') { ?>
            <div class="col-xs-12">
                <div style="" class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
        <?php } ?>

        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $title ?></h3>
                    <div class="box-tools pull-right">
                        <!-- <button type="button" class="btn btn-warning" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                        <a href="#" id="add" class="btn btn-primary" title="Add"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="8%">No Meja</th>
                        	    <th width="60%">Keterangan</th>
                        	    <th width="20%">Status</th>
                        	    <th width="10%">Action</th>
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
                                    <a href="javascript:void(0)" onclick="edit_dt(<?= $meja->no_meja ?>)" class="btn btn-xs btn-info btn-flat" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="javascript:void(0)" onclick="delete_dt(<?= $meja->no_meja ?>)" class="btn btn-xs btn-danger btn-flat" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                           </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('backend/pages/fnb_meja_form') ?>

<script type="text/javascript">
    $(function(){

        $('#add').click(function(){
            window.location = "<?php echo site_url('backend/meja_create')?>";    
        });
    });

    function delete_dt(id) {
        $('#modal_confirm').modal('show');
        $('#id_delete').val(id);
    }

    function yes(id) {        
        var id = $('#id_delete').val();   
        window.location = "<?php echo base_url('backend/meja_delete?id=')?>"+id;
    }

    function edit_dt(id)
    {
        window.location = "<?php echo base_url('backend/meja_update?id=')?>"+id;   
    }
</script>