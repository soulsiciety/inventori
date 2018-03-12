<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventori Unit TI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_1/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_1/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_1/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_1/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_1/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_1/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_1/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_1/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_1/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_1/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_1/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   <!-- CSS CUSTOM BY PITA -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_1/custom.css">
  <!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets_1/bower_components/jquery/dist/jquery.min.js"></script>
 
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="<?php echo base_url();?>assets_1/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="<?php echo base_url();?>assets_1/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_1/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   <link rel="shortcut icon" href="favicon.png">
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('c_user');?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i class="fa fa-gg"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Unit TI</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa  fa-gears"></i>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>assets_1/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Petugas Unit TI
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Kelola Akun</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('masuk/logout');?>" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets_1/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Selamat Datang</p>
          Unit TI
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MASTER</li>
        <li>
          <a href="<?php echo site_url('c_departemen');?>">
            <i class="fa fa-building"></i> <span>Departemen</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('c_prodi');?>">
            <i class="fa fa-globe"></i> <span>Program Studi</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('c_gedung');?>">
            <i class="fa fa-building"></i> <span>Gedung</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('c_ruangan');?>">
            <i class="fa fa-home"></i> <span>Ruangan</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('c_user');?>">
            <i class="fa fa-users"></i> <span>User</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="header">MASTER BARANG</li>
        <li>
          <a href="<?php echo site_url('c_jenis_barang');?>">
            <i class="fa fa-star"></i> <span>Jenis Barang</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('c_kategori_barang');?>">
            <i class="fa fa-list"></i> <span>Kategori Barang</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>  
          <a href="<?php echo site_url('c_klasifikasi_barang');?>">
            <i class="fa fa-object-ungroup"></i> <span>Klasifikasi Barang</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('c_supplier');?>">
            <i class="fa fa-cubes"></i> <span>Supplier</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('c_barang');?>">
            <i class="fa fa-laptop"></i> <span>Barang</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li class="header">TRANSAKSI</li>
        
        <li>
          <a href="<?php echo site_url('c_peminjaman');?>">
            <i class="fa fa-cart-plus"></i> <span>Peminjaman</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php echo $jumlah_peminjaman;?></small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('c_transaksi');?>">
            <i class="fa fa-edit"></i> <span>Pengambilan</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">8</small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('c_transaksi');?>">
            <i class="fa fa-gavel"></i> <span>Service</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">8</small>
            </span>
          </a>
        </li>
      </ul>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">LAPORAN</li>
        <li>
          <a href="#">
            <i class="fa fa-clipboard"></i> <span>Data Barang</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-clipboard"></i> <span>Data Peminjaman</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-clipboard"></i> <span>Data Pengadaan</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">LOGOUT</li>
        <li>
          <a href="<?php echo site_url('masuk/logout');?>">
            <i class="fa fa-laptop"></i> <span>Logout</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>