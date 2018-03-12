<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('c_user');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('c_barang');?>">Barang</a></li>
        <li class="active">Detail Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="img-responsive" src="<?php echo base_url();?>assets_1/img_barang/<?php echo $barang['gambar'];?>">
              <h3 class="profile-username text-center"><?php echo $barang['nama_barang'];?></h3>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Jenis Barang </b> 
                  <a class="pull-right black">
                    <?php echo $barang['nama_jenis'];?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Kategori Stok </b> 
                  <a class="pull-right black">
                    <?php echo $barang['nama_kategori'];?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Minimum Stok</b> 
                  <a class="pull-right black">
                    <?php echo $barang['minimum_stok'];?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Total Stok </b> 
                  <a class="pull-right black">
                    <?php if($total_stok>0){echo $total_stok;}else{echo"0";}?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Sisa Stok</b> 
                  <a class="pull-right black">
                    <?php 
                      echo "-";
                    ?>
                  </a>
                </li>
               
               
                <li class="list-group-item">
                  <b>Jumlah Pengguna</b> <a class="pull-right black"><?php echo "-";?></a>
                </li>
              </ul>
              <a href="<?php echo site_url('c_barang/edit/'.$barang['id_barang']);?>" class="btn btn-primary btn-block"><b>Edit Data Barang</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-body">
              <strong><i class="fa fa-file-text-o margin-r-5"></i> Deskripsi</strong>

              <p><?php echo $barang['deskripsi'];?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#historyPeminjaman" data-toggle="tab">History Peminjaman</a></li>
              <li  class="active"><a href="#historyBarangMasuk" data-toggle="tab">History Barang Masuk</a></li>
              <li><a href="#history" data-toggle="tab">History</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="historyPeminjaman">
                <!-- Post -->
                <div class="post">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Tgl. Pinjam</th>
                        <th>Nama Peminjam</th>
                        <th>No. HP</th>
                        <th>Departemen</th>
                        <th>Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach($h_b as $list)
                      {
                        ?>
                        <tr>
                          <td><?php echo date("d-M-Y", strtotime($list->tgl_pinjam));?></td>
                          <td><?php echo $list->nama_peminjam;?></td>
                          <td><?php echo $list->no_hp?></td>
                          <td><?php echo $list->departemen?></td>
                          <td>
                            <a href="<?php echo site_url('c_barang/detail_history_peminjaman/'.$list->id_det);?>" class="btn btn-primary btn-xs">
                              detail
                            </a>
                          </td>
                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div><!-- /.post -->
              </div><!-- /.tab-pane -->
              <div class="active tab-pane" id="historyBarangMasuk">
                <!-- The timeline -->
                <table id="example2" class="table table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Tgl. Entry</th>
                      <th>Batasan Umur Manfaat</th>
                      <th>Stok Masuk</th>
                      <th>Harga</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($h_b_m as $list_masuk)
                    {
                      ?>
                      <tr>
                        <td><?php echo $list_masuk->id_b_masuk;?></td>
                        <td><?php echo date("d-M-Y", strtotime($list_masuk->tgl_entry));?></td>
                        <td>
                          <?php
                          $umur_manfaat = date('Y-m-d', strtotime('+'.$list_masuk->umur_manfaat.' year', strtotime($list_masuk->tgl_entry)));
                          if($list_masuk->tgl_entry != $umur_manfaat)
                          {
                            echo date("d-M-Y", strtotime($umur_manfaat));
                          }
                          else
                          {
                            echo"-";
                          }
                          ?>
                        </td>
                        <td><?php echo $list_masuk->qty_masuk;?></td>
                        <td><?php echo "Rp ".number_format($list_masuk->harga,0,',','.');?></td>
                        <td>
                          <a href="<?php echo site_url('c_barang/edit_stok/'.$list_masuk->id_b_masuk);?>" class="btn btn-warning btn-xs">
                          edit
                        </a>
                        <a href="#" class="hapus" kode="<?php echo $list_masuk->id_b_masuk;?>" data-toggle="modal" data-target="#modal-default">
                          <button class="btn btn-danger btn-xs">
                            hapus
                          </button>
                        </a>
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="history">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Konfirmasi Hapus Data Barang</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="idhapus" id="idhapus">
        <p>Anda yakin ingin menghapus stok barang ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
        <button type="button" class="btn btn-danger" id="konfirmasi">Hapus Data</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
   
  $(".hapus").click(function(){
    var kode=$(this).attr("kode");
    
    $(".modal-body #idhapus").val(kode);
  });
  
  $("#konfirmasi").click(function(){
    var kode=$("#idhapus").val();
    
    $.ajax({
      url:"<?php echo site_url('c_barang/delete_stok');?>",
      type:"POST",
      data:"kode="+kode,
      cache:false,

      success:function(html){
      location.href="<?php echo site_url('c_barang/index/delete_success');?>";
      }
    });
  });

</script>