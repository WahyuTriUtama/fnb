<!-- Content Header (Page header) -->
<section class="content-header">
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('backend');?>" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo site_url('backend/guest_book');?>" title="<?php echo $title;?>"><?php echo $title;?></a></li>
            <li class="active">Detail</li>
        </ol>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="row col-lg-12">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">View Detail</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr><td>Nama</td><td>:</td><td><?php echo $nama; ?></td></tr>
                        <tr><td>Email</td><td>:</td><td><?php echo $email; ?></td></tr>
                        <tr><td>Telp</td><td>:</td><td><?php echo $telp; ?></td></tr>
                        <tr><td>Komentar</td><td>:</td><td><?php echo $komentar; ?></td></tr>
                    </table>
                </div>
            </div>
            <div class="">
                    <button class="btn btn-primary" onclick="self.history.back()">Back</button>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>

</section>