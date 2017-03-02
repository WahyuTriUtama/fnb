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
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">View Detail</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr><td width="50%">Id Menu Categori</td><td width="3%">:</td><td><?php echo $id_menu_cat; ?></td></tr>
                        <tr><td>Keterangan</td><td>:</td><td><?php echo $keterangan_menu_cat; ?></td></tr>
                    </table>
                </div>
            </div>
            <div class="">
                    <button class="btn btn-primary" onclick="self.history.back()">Back</button>
            </div>
        </div>
    </div>
</section>