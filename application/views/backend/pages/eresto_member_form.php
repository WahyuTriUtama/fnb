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

    <div class="row col-lg-12">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $button ?></h3>
                </div>
                <?php echo form_open_multipart($action);?>
                    <div class="panel-body">
                	    <div class="form-group">
                                <label for="varchar">Nama Member <?php echo form_error('nama_member') ?></label>
                                <input type="text" class="form-control" name="nama_member" id="nama_member" placeholder="Enter nama member" value="<?php echo $nama_member; ?>" />
                            </div>
                	    <div class="form-group">
                                <label for="date">Tgl Lahir <?php echo form_error('tgl_lahir') ?></label>
                                <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Enter tgl. lahir" value="<?php echo $tgl_lahir; ?>" />
                            </div>
                	    <div class="form-group">
                                <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Enter alamat" value="<?php echo $alamat; ?>" />
                            </div>
                	    <div class="form-group">
                            <label for="varchar">Telpon <?php echo form_error('no_telpon') ?></label>
                            <input type="text" class="form-control" name="no_telpon" id="no_telpon" placeholder="Enter no telpon" value="<?php echo $no_telpon; ?>" />
                        </div>
                	    <div class="form-group">
                            <label for="varchar">Email <?php echo form_error('email') ?></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="<?php echo $email; ?>" />
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
                            <input type="text" class="form-control" name="password" id="password" placeholder="Enter password" value="<?php echo $password; ?>" />
                        </div>
                    </div>
                    <div class="panel-footer">
                        <input type="hidden" name="id_member" value="<?php echo $id_member; ?>" /> 
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-warning" onclick="self.history.back()">Cancel</button>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>  

</section>