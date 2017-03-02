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

    <div class="row col-lg-12" style="margin-bottom: 10px;">
        <div class="col-lg-3">
            <?php echo anchor(site_url('backend/user_create'), '<i class="fa fa-plus" title="View"></i>  Create', 'class="btn btn-success"'); ?>
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
                    <th>Photo</th>
        		    <th>User Group</th>
        		    <th>Nama User</th>
        		    <th>Username</th>
        		    <th>User Status</th>
        		    <th width="10%">Action</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;
            foreach ($user_data as $user)
            {
                ?>
                <tr>
            	    <td>
                        <a href="<?php echo site_url('backend/user_read/'.$user->id_user) ?>" target="_self">
                            <img src="<?php echo base_url();?>uploads/users/<?php echo $user->image ?>" height="50" width="40">
                        </a>
                    </td>
            	    <td><?php echo $user->keterangan ?></td>
            	    <td><?php echo $user->nama_user ?></td>
            	    <td><?php echo $user->username ?></td>
            	    <td>
                        <?php if($user->user_status == '1'){
                            echo "<span class='label label-success'>Aktif</span>";
                        }else{
                            echo "<span class='label label-danger'>Non-aktif</span>";
                        }
                        ?>
                    </td>
            	    <td>
                        <?php 
                        echo anchor(site_url('backend/user_read/'.$user->id_user),'<i class="glyphicon glyphicon-search" title="View"></i>'); 
                        echo ' | '; 
                        echo anchor(site_url('backend/user_update/'.$user->id_user),'<i class="glyphicon glyphicon-edit" title="Update"></i>'); 
                        echo ' | '; 
                        echo anchor(site_url('backend/user_delete/'.$user->id_user),'<i class="glyphicon glyphicon-trash" title="Delete"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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