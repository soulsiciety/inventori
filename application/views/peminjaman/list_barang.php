 <!--untuk format titik  -->
  <script type="text/javascript" src="<?php echo base_url();?>assets_1/js/my.js"></script>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Peminjaman Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('c_user');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('c_barang');?>">Peminjaman</a></li>
        <li class="active">Pilih Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="alert alert-success">
            <h4><i class="icon fa fa-info"></i> Pertama</h4>
            Silahkan pilih barang yang ingin dipinjam
          </div>
          <div class="box box-primary">
            
            <div class="box-body">
              <form method="post" action="<?php echo site_url('c_barang/input_det');?>">
                <input type="hidden" name="id_p" value="<?php echo $id_p_new;?>">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No Barang </th>
                    <th>Nama Barang</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($barang as $brg)
                  {
                  ?>
                    <tr>
                      <td><?php echo $brg->id_barang;?></td>
                      <td><?php echo $brg->nama_barang;?></td>
                      <td>
                        
                        <a href="<?php echo site_url('c_peminjaman/input_detail/'.$brg->id_barang&&$id_p_new);?>" class="btn btn-primary btn-xs">
                          Masukan ke list peminjaman
                        </a>
                        
                    </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- CK Editor -->
