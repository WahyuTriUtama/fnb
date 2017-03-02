<!-- Content Header (Page header) -->
<section class="content-header">
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('backend');?>" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('backend/menu');?>" title="<?php echo $title;?>"><?php echo $title;?></a></li>
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
                            <label for="smallint">Kategori Menu <?php echo form_error('id_menu_cat') ?></label>
                            <select name="id_menu_cat" id="id_menu_cat" class="dropdown form-control">
                                <?php
                                foreach($tb_menucat as $k)
                                {
                                    if ($k->id_menu_cat == $id_menu_cat) {
                                        echo "<option value='".$k->id_menu_cat."' selected>".$k->keterangan_menu_cat."</option>";
                                    } else {
                                        echo "<option value='".$k->id_menu_cat."'>".$k->keterangan_menu_cat."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                	    <div class="form-group">
                            <label for="varchar">Nama Menu <?php echo form_error('nama_menu') ?></label>
                            <input type="text" class="form-control" name="nama_menu" id="nama_menu" placeholder="Enter nama menu" value="<?php echo $nama_menu; ?>" />
                        </div>
                	    <div class="form-group">
                            <label for="decimal">Harga <?php echo form_error('harga') ?></label>
                            <input type="text" class="form-control" name="harga" id="harga" placeholder="Enter harga" value="<?php echo $harga; ?>" />
                        </div>
                	    <div class="form-group">
                            <label for="varchar">Keterangan Menu <?php echo form_error('keterangan_menu') ?></label>
                            <input type="text" class="form-control" name="keterangan_menu" id="keterangan_menu" placeholder="Enter keterangan menu" value="<?php echo $keterangan_menu; ?>" />
                        </div>
                	    <div class="form-group">
                            <label for="varchar">Image <?php echo form_error('image') ?></label>
                            <?php if ($image != "") {?>
                                <div style="padding:5px">
                                    <a href="<?php echo base_url();?>uploads/menu/<?php echo $image;?>" target="_blank">
                                        <img src="<?php echo base_url();?>uploads/menu/<?php echo $image;?>" height="80">
                                    </a>
                                </div>
                            <?php } ?>
                            <input type="file" class="file" name="image" id="image" value="<?php echo $image; ?>" />
                            *Maksimal 512 Kb (Ext: jpg|png|gif|jpeg)
                        </div>
                	    <div class="form-group">
                            <label for="tinyint">Status Menu <?php echo form_error('status_menu') ?></label>
                            <select class="form-control" name="status_menu" id="status_menu">
                                <?php if ($status_menu == "0") { ?>
                                    <option value="1">Tersedia</option>
                                    <option value="0" selected="selected">Kosong</option>
                                <?php }else { ?>
                                    <option value="1" selected="selected">Tersedia</option>
                                    <option value="0">Kosong</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tinyint">Favorite <?php echo form_error('is_favorite') ?></label>
                            <select class="form-control" name="is_favorite" id="is_favorite">
                                <?php if ($is_favorite == "0") { ?>
                                    <option value="1">Yes</option>
                                    <option value="0" selected="selected">No</option>
                                <?php }else { ?>
                                    <option value="1" selected="selected">Yes</option>
                                    <option value="0">No</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <input type="hidden" name="id_menu" value="<?php echo $id_menu; ?>" />  
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-warning" onclick="self.history.back()">Cancel</button>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>  

</section>