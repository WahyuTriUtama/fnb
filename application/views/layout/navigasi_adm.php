<section class="sidebar">
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
            <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li id="n_dashboard">
                <a href="<?php echo site_url('backend');?>" title="Dashboard">
                    <i class="fa fa-dashboard"></i> <spanid>Dashboard</span>
                </a>
            </li>
            <!--<li>
                <a href="<?php //echo base_url('backend');?>">
                    <i class="fa fa-gear"></i> <span>Konfigurasi</span>
                </a>
            </li>-->
            <li id="n_meja">
                <a href="<?php echo site_url('backend/meja');?>">
                    <i class="fa fa-map-marker"></i> <span>Data Meja</span>
                </a>
            </li>
            <li class="treeview" id="n_menu">
                <a href="#">
                    <i class="fa fa-cutlery"></i>
                    <span>Data Menu</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" id="menu_block">
                    <li id="n_menucat"><a href="<?php echo site_url('backend/menucat');?>"><i class="fa fa-angle-double-right"></i> Kategori Menu</a></li>
                    <li id="n_menu1"><a href="<?php echo site_url('backend/menu');?>"><i class="fa fa-angle-double-right"></i> Daftar Menu</a></li>
                </ul>
            </li>
            <li id="n_member">
                <a href="<?php echo site_url('backend/member');?>">
                    <i class="fa fa-users"></i> <span>Data Member</span>
                </a>
            </li>
            <li id="n_pemesanan">
                <a href="<?php echo site_url('backend/pemesanan');?>">
                    <i class="fa fa-book"></i> <span>Transaksi Pemesanan</span>
                </a>
            </li>
            <li id="n_log">
                <a href="<?php echo site_url('backend/translog');?>">
                    <i class="fa fa-lock"></i> <span>Transaksi Log</span>
                </a>
            </li>
            <li id="n_gb">
                <a href="<?php echo site_url('backend/guest_book');?>">
                    <i class="fa fa-book"></i> <span>Guest Book</span>
                </a>
            </li>
            <li class="treeview" id="n_user">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Data User</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" id="user_block">
                    <li id="n_ugroup"><a href="<?php echo site_url('backend/ugroup');?>"><i class="fa fa-angle-double-right"></i> Kategori User</a></li>
                    <li id="n_user1"><a href="<?php echo site_url('backend/user');?>"><i class="fa fa-angle-double-right"></i> Daftar User</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo site_url('adm_login/logout');?>" onclick="javascript: return confirm('Anda akan logout ?')">
                    <i class="fa fa-power-off"></i> <span>Sign Out</span>
                </a>
            </li>
        </ul>
</section>

<script type="text/javascript">
    jQuery(function($) {
        var segment1 = "<?php echo $this->uri->segment(1);?>";
        if (segment1 == 'backend') {
            $('#n_dashboard').addClass('active');
        }

        var segment2 = "<?php echo $this->uri->segment(2);?>";
        if (segment2 == 'meja') {
            $('#n_dashboard').removeClass('active');
            $('#n_meja').addClass('active');
        } else if (segment2 == 'menucat') {
            $('#n_dashboard').removeClass('active');
            $('#n_menu').addClass('active');
            $('#menu_block').attr('style','display:block;');
            $('#n_menucat').addClass('active');
        } else if (segment2 == 'menu') {
            $('#n_dashboard').removeClass('active');
            $('#n_menu').addClass('active');
            $('#menu_block').attr('style','display:block;');
            $('#n_menu1').addClass('active');
        } else if (segment2 == 'member') {
            $('#n_dashboard').removeClass('active');
            $('#n_member').addClass('active');
        } else if (segment2 == 'pemesanan') {
            $('#n_dashboard').removeClass('active');
            $('#n_pemesanan').addClass('active');
        } else if (segment2 == 'translog') {
            $('#n_dashboard').removeClass('active');
            $('#n_log').addClass('active');
        } else if (segment2 == 'ugroup') {
            $('#n_dashboard').removeClass('active');
            $('#n_user').addClass('active');
            $('#user_block').attr('style','display:block;');
            $('#n_ugroup').addClass('active');
        } else if (segment2 == 'user') {
            $('#n_dashboard').removeClass('active');
            $('#n_user').addClass('active');
            $('#user_block').attr('style','display:block;');
            $('#n_user1').addClass('active');
        } else if (segment2 == 'guest_book') {
            $('#n_dashboard').removeClass('active');
            $('#n_gb').addClass('active');
        }
    });
</script>