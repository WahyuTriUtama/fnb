<!-- Content Header (Page header) -->
<section class="content-header">
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('pemesanan');?>" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo site_url('pemesanan/member');?>" title="<?php echo $title;?>"><?php echo $title;?></a></li>
            <li class="active">View</li>
        </ol>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <div class="row col-lg-12">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">View Detail</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr><td>Id Member</td><td>:</td><td><?php echo $id_member; ?></td></tr>
                	    <tr><td>Nama Member</td><td>:</td><td><?php echo $nama_member; ?></td></tr>
                	    <tr><td>Tgl Lahir</td><td>:</td><td><?php echo $tgl_lahir; ?></td></tr>
                	    <tr><td>Alamat</td><td>:</td><td><?php echo $alamat; ?></td></tr>
                	    <tr><td>Telpon</td><td>:</td><td><?php echo $no_telpon; ?></td></tr>
                	    <tr><td>Email</td><td>:</td><td><?php echo $email; ?></td></tr>
                	    <tr><td>Username</td><td>:</td><td><?php echo $username; ?></td></tr>
                	    <tr><td>Password</td><td>:</td><td><?php echo "*****"; ?></td></tr>
            	   </table>
                </div>
            </div>
            <div class="">
                    <button class="btn btn-primary" onclick="self.history.back()">Back</button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Photo Member</h3>
                </div>
                <div class="panel-body">
                    <?php if ($image != "") {?>
                        <div style="padding:5px">
                            <a href="<?php echo base_url();?>uploads/members/<?php echo $image;?>" target="_blank">
                                <img src="<?php echo base_url();?>uploads/members/<?php echo $image;?>">
                            </a>
                        </div>
                    <?php } ?> 
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>

</section>