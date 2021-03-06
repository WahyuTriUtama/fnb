<!-- Content Header (Page header) -->
<section class="content-header">
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('backend');?>" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('backend/member');?>" title="<?php echo $title;?>"><?php echo $title;?></a></li>
        </ol>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <div class="row col-lg-12" style="margin-bottom: 10px;">
        <div class="col-lg-3">
            <?php echo anchor(site_url('backend/member_create'), '<i class="fa fa-plus" title="Create"></i>  Create', 'class="btn btn-success"'); ?>
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
            	    <th>Nama Member</th>
            	    <th>Tgl Lahir</th>
            	    <th>Telpon</th>
            	    <th>Email</th>
            	    <th>Username</th>
            	    <th width="10%">Action</th>
                </tr>
            </thead>
    	    <tbody>
                <?php
                $start = 0;
                foreach ($member_data as $member)
                {
                    ?>
                    <tr>
            		    <td>
                            <a href="<?php echo site_url('backend/member_read/'.$member->id_member) ?>" target="_self">
                                <img src="<?php echo base_url();?>uploads/members/<?php echo $member->image ?>" height="50" width="40">
                            </a>
                        </td>
            		    <td><?php echo $member->nama_member ?></td>
            		    <td><?php echo $member->tgl_lahir ?></td>
            		    <td><?php echo $member->no_telpon ?></td>
            		    <td><?php echo $member->email ?></td>
            		    <td><?php echo $member->username ?></td>
            		    <td>
                            <?php 
                            echo anchor(site_url('backend/member_read/'.$member->id_member),'<i class="glyphicon glyphicon-search" title="View"></i>'); 
                            echo ' | '; 
                            echo anchor(site_url('backend/member_update/'.$member->id_member),'<i class="glyphicon glyphicon-edit" title="Update"></i>'); 
                            echo ' | '; 
                            echo anchor(site_url('backend/member_delete/'.$member->id_member),'<i class="glyphicon glyphicon-trash" title="Delete"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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