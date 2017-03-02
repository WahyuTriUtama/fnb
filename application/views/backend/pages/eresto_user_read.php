<!-- Content Header (Page header) -->
<section class="content-header">
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('backend');?>" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('backend/user');?>" title="<?php echo $title;?>"><?php echo $title;?></a></li>
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
                        <tr><td>User Group</td><td>:</td><td><?php echo $id_group; ?></td></tr>
                        <tr><td>Nama User</td><td>:</td><td><?php echo $nama_user; ?></td></tr>
                        <tr><td>Username</td><td>:</td><td><?php echo $username; ?></td></tr>
                        <tr><td>Password</td><td>:</td><td><?php echo "*****"; ?></td></tr>
                        <tr><td>User Status</td><td>:</td><td><?php if($user_status=='1'){echo "A";}else{echo "N";} ?></td></tr>
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
                    <h3 class="panel-title">Photo User</h3>
                </div>
                <div class="panel-body">
                    <?php if ($image != "") {?>
                        <div style="padding:5px">
                            <a href="<?php echo base_url();?>uploads/users/<?php echo $image;?>" target="_blank">
                                <img src="<?php echo base_url();?>uploads/users/<?php echo $image;?>">
                            </a>
                        </div>
                    <?php } ?> 
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>

</section>