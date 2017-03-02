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
                    <h3 class="panel-title"><?php echo $button ?></h3>
                </div>
                <?php echo form_open_multipart($action);?>
                    <div class="panel-body">
            	        <div class="form-group">
                            <label for="smallint">User Group <?php echo form_error('id_group') ?></label>
                            <select name="id_group" id="id_group" class="dropdown form-control" data-placeholder="Select user group">
                                <?php
                                foreach($tb_ugroup as $k)
                                {
                                    if ($k->id_group == $id_group) {
                                        echo "<option value='".$k->id_group."' selected>".$k->keterangan."</option>";
                                    } else {
                                        echo "<option value='".$k->id_group."'>".$k->keterangan."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
            	        <div class="form-group">
                            <label for="varchar">Nama Lengkap <?php echo form_error('nama_user') ?></label>
                            <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Enter nama lengkap" value="<?php echo $nama_user; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Photo <?php echo form_error('image') ?></label>
                            <?php if ($image != "") {?>
                                <div style="padding:5px">
                                    <a href="<?php echo base_url();?>uploads/users/<?php echo $image;?>" target="_blank">
                                        <img src="<?php echo base_url();?>uploads/users/<?php echo $image;?>" height="80">
                                    </a>
                                </div>
                            <?php } ?>
                            <input type="file" class="file" name="image" id="image" value="<?php echo $image; ?>" />
                            *Maksimal 512 Kb (Ext: jpg|png|gif|jpeg)
                        </div>
            	        <div class="form-group">
                            <label for="varchar">Username <?php echo form_error('username') ?></label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" value="<?php echo $username; ?>" />
                        </div>
            	        <div class="form-group">
                            <label for="password">Password <?php echo form_error('password') ?></label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="Enter password" value="" />
                        </div>
            	        <div class="form-group">
                            <label for="tinyint">User Status <?php echo form_error('user_status') ?></label>
                            <select name="user_status" id="user_status" class="dropdown form-control" data-placeholder="Select user status">
                                <?php
                                $tb_st = array((object)array( 'id' => '1', 'ket' => 'A'),(object)array( 'id' => '2', 'ket' => 'N'));
                                foreach($tb_st as $st)
                                {
                                    if ($user_status === $st->id) {
                                        echo "<option value='".$st->id."' selected>".$st->ket."</option>";
                                    } else {
                                        echo "<option value='".$st->id."'>".$st->ket."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-warning" onclick="self.history.back()">Cancel</button>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>  

</section>