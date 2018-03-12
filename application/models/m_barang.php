<?php 
class M_barang extends CI_Model{
private $table = "barang";
private $primary ="id_barang";
    function all()
    {
        $query = $this->db->query("select barang.*, jenis_barang.*, kategori_barang.*, sum(qty_masuk) as total from barang LEFT join history_barang_masuk ON barang.id_barang = history_barang_masuk.id_barang 
            LEFT JOIN jenis_barang ON barang.id_jenis = jenis_barang.id_jenis 
            LEFT JOIN kategori_barang ON barang.id_kategori = kategori_barang.id_kategori
            group by barang.id_barang");
        return $query;
    }

    function get_detail($id_barang)
    {
        $query = $this->db->query("select barang.*, history_barang_masuk.* from barang RIGHT JOIN history_barang_masuk ON barang.id_barang = history_barang_masuk.id_barang where history_barang_masuk.id_barang ='$id_barang' ");
        return $query;
    }

    function get_detail_stok($id_b_masuk)
    {
        $query = $this->db->query("select barang.*, history_barang_masuk.* from barang inner join history_barang_masuk on barang.id_barang = history_barang_masuk.id_barang where id_b_masuk ='$id_b_masuk'");
        return $query;
    }

    function detail_barang($id_barang)
    {
        $query = $this->db->query("select barang.*, kategori_barang.*, jenis_barang.* from barang LEFT JOIN jenis_barang ON barang.id_jenis = jenis_barang.id_jenis LEFT JOIN kategori_barang ON barang.id_kategori = kategori_barang.id_kategori where id_barang ='$id_barang' ");
        return $query;
    }

    function get_last_no()
    {
        $query  = $this->db->query("select max(id_barang) as last from barang");
        $row    = $query->row_array();
        $baru = $row['last']+1;
        return $baru;
    }

    function input($data)
    {
        $tgl = date('Y-m-d');
        $query = $this->db->query("insert into barang values('','$data[id_jenis]','$data[id_kategori]','$data[no_bmn]', '$data[nama_barang]','$data[minimum_stok]', '$data[gambar_barang]', '$data[deskripsi]')");
    }
   
    function get_h_barang_masuk($id_barang)
    {
        $query = $this->db->query("select *from history_barang_masuk where id_barang = '$id_barang'");
        return $query;
    }

    function edit($id, $data)
    {
        $tgl    = date('Y-m-d');
        $query  = $this->db->query("update barang set nama_barang = '$data[nama_barang]',minimum_stok = '$data[minimum_stok]',no_bmn = '$data[no_bmn]',gambar = '$data[gambar]', id_jenis ='$data[id_jenis]', id_kategori = '$data[id_kategori]' ,deskripsi = '$data[deskripsi]' where id_barang = '$id'");
    }

    function edit_stok($id_b_masuk,$data)
    {
        $query = $this->db->query("update history_barang_masuk set tgl_entry= '$data[tgl_entry]', qty_masuk = '$data[qty_masuk]', harga = '$data[harga_satuan]', umur_manfaat = '$data[umur_manfaat]' where id_b_masuk = '$id_b_masuk' ");
    }
    function delete_stok($id_b_masuk)
    {
        $query = $this->db->query("delete from history_barang_masuk where id_b_masuk = '$id_b_masuk' ");
    }

    function cek($kode){
        $this->db->where($this->primary,$kode);
        $query=$this->db->get($this->table);
        
        return $query;
    }

    function delete($kode){
        $this->db->where($this->primary,$kode);
        $this->db->delete($this->table);

        $query = $this->db->query("delete from history_barang_masuk where id_barang ='$kode'");
    }

    //HISTORY BARANG MASUK

     function tambah_stok($id_barang,$data)
    {
        $query = $this->db->query("insert into history_barang_masuk values('','$id_barang','$data[tgl_entry]','$data[qty_masuk]','$data[harga_satuan]','$data[umur_manfaat]')");
    }

    function get_h_p_barang($id_barang)
    {
        $query = $this->db->query("select peminjaman.*, detail_peminjaman.* from peminjaman RIGHT JOIN detail_peminjaman ON peminjaman.id_p = detail_peminjaman.id_p where id_barang = '$id_barang'");
        return $query;
    }

    function total_stok($id_barang)
    {
        $query = $this->db->query("SELECT sum(qty_masuk) as total from history_barang_masuk where id_barang = '$id_barang' ");
        $row    = $query->row_array();
        $total = $row['total'];
        return $total;
    }

    



}