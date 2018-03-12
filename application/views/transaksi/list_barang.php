<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>STPND | Unit TI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets_1/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
<body class="hold-transition skin-blue layout-boxed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>assets_1/index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>U </b>TI</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Unit</b> TI</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-shopping-cart"></i>
              <span class="label label-danger">9</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
 
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content" style="min-height: 200px !important; background: #fff;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pilih Barang
        <small>Silahkan pilih barang yang ingin diambil : </small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box-body">
        <table id="example1" class="table table-striped">
          <thead>
            <tr>
              <th>Gambar Barang</th>
              <th>Jenis Barang </th>
              <th>Kategori Barang </th>
              <th>Nama Barang</th>
              <th>Stok Barang</th>
              <th>Deskripsi</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach($barang as $brg)
            {
              ?>
              <tr>
                <td><img class="img-responsive" src="<?php echo base_url();?>assets_1/img_barang/<?php echo $brg->gambar;?>" style="width: 200px;"></td>
                <td><?php echo $brg->nama_jenis;?></td>
                <td><?php echo $brg->nama_kategori;?></td>
                <td><?php echo $brg->nama_barang;?></td>
                <td><?php echo $brg->deskripsi;?></td>
                <td><?php if($brg->total>0){echo $brg->total;}else{echo"0";};?></td>
                <td>
                  <?php
                  if($brg->total>0)
                  {
                    ?>
                    <a href="<?php echo site_url('c_barang/tambah_stok/'.$brg->id_barang.'/'.'123');?>" class="btn btn-success btn-xs">
                      tambahkan ke list order
                    </a>
      							<button class="btn btn-info btn-xs" onclick="detail_barang('<?php echo $brg->id_barang ?>');">
      								Detail
      							</button>
                    <?php
                  }
                  else
                  {
                    ?>
                    <a href="#" class="btn btn-success btn-xs" disabled>
                      tambahkan ke list order
                    </a>
                    <?php
                  }
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detail Barang</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Kembali</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets_1/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- DataTables -->
<script src="<?php echo base_url();?>assets_1/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets_1/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets_1/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets_1/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets_1/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets_1/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets_1/dist/js/demo.js"></script>
<script>
	function detail_barang(kode){
  $.ajax({
			url:'<?php echo base_url(); ?>c_transaksi/detail_barang',
      type    : 'POST',
			data    : "kode="+kode,
      cache   : false,
      success : function(data){ 
        if(data){
          //view modal
  				$('#modal-default').find('.modal-body').html(data);
          $('#modal-default').modal();
        }
      }
    });
    }
</script>
</body>
</html>
