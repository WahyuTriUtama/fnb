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
            <a href="<?php echo site_url('kasir');?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li id="n_meja">
            <a href="<?php echo site_url('kasir/meja');?>">
                <i class="fa fa-map-marker"></i> <span>Data Meja</span>
            </a>
        </li>
        <li id="n_menu1">
            <a href="<?php echo site_url('kasir/menu');?>">
                <i class="fa fa-cutlery"></i> <span>Data Menu</span>
            </a>
        </li>
        <li id="n_member">
            <a href="<?php echo site_url('kasir/member');?>">
                <i class="fa fa-users"></i> <span>Data Member</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('adm_login/logout');?>" onclick="javascript: return confirm('Anda akan logout ?')">
                <i class="fa fa-power-off"></i> <span>Sign Out</span>
            </a>
        </li>
    </ul>
</section>