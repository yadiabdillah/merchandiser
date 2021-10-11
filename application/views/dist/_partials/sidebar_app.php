<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>dist/index">Aplikasi Merchandiser</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>dist/index">St</a>
          </div>
          <ul class="sidebar-menu">
         <?php if ($_SESSION['roles']=='admin'){ ?>   
            <li class="menu-header">Master</li>
             <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>C_barang/barang"><i class="far fa-square"></i> <span>Master Barang</span></a></li>
             <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>C_barang_komp/barang_komp"><i class="far fa-square"></i> <span>Master barang Kompetitor</span></a></li>
             <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>C_toko/toko"><i class="far fa-square"></i> <span>Master Toko</span></a></li>
             <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>C_user/user"><i class="far fa-square"></i> <span>Master User</span></a></li>
         <?php } ?> 
         <?php if ($_SESSION['roles']=='md'){ ?>
            <li class="menu-header">Transaksi</li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>C_barang/stok_barang"><i class="far fa-square"></i> <span>Input Stok</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>C_barang/exp_barang"><i class="far fa-square"></i> <span>Input Expired</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>C_barang/harga_barang"><i class="far fa-square"></i> <span>Input Harga</span></a></li>
         <?php } ?>
            <li class="menu-header">View</li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>C_barang/lihat_stok_barang"><i class="far fa-square"></i> <span>Lihat Stok</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>C_barang/lihat_exp_barang"><i class="far fa-square"></i> <span>Lihat Expired</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>C_barang/lihat_harga_barang"><i class="far fa-square"></i> <span>lihat Harga</span></a></li>
<?php if ($_SESSION['roles']!=='md'){ ?>
            <li class="menu-header">Laporan</li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>C_barang/view_laporan_stok"><i class="far fa-square"></i> <span>Laporan Stok</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>C_barang/view_laporan_exp"><i class="far fa-square"></i> <span>Laporan Expired</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>C_barang/view_laporan_harga"><i class="far fa-square"></i> <span>Laporan Harga</span></a></li>
<?php }?>

            <li class="menu-header">Logout</li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>C_login/logout"><i class="far fa-square"></i> <span>Logout</span></a></li>
            </ul>

        </aside>
      </div>
