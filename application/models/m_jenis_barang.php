<?php 
class M_jenis_barang extends CI_Model{
private $table = "jenis_barang";
private $primary ="id_jenis";
    function total_by_jenis($id_jenis)
    {
        $query = $this->db->query("select jenis_barang.*, barang.*, history_barang_masuk.*, sum(qty_masuk) as total from barang LEFT JOIN jenis_barang ON barang.id_jenis = jenis_barang.id_jenis LEFT JOIN history_barang_masuk ON barang.id_barang = history_barang_masuk.id_barang where jenis_barang.id_jenis = '$id_jenis'
            group BY jenis_barang.id_jenis");
        return $query;
    }
    function all_semua()
    {
        $query = $this->db->query("select *from jenis_barang");
        return $query;
    }
    function barang_by_jenis($id_jenis)
    {
        $query = $this->db->query("select barang.id_barang, barang.nama_barang, sum(qty_masuk) as total from barang LEFT JOIN jenis_barang ON barang.id_jenis = jenis_barang.id_jenis LEFT JOIN history_barang_masuk ON barang.id_barang = history_barang_masuk.id_barang where jenis_barang.id_jenis = '$id_jenis' group BY barang.id_barang");
        return $query;
    }

    function get_last_no()
    {
        $query  = $this->db->query("select max(id_jenis) as last from jenis_barang");
        $row    = $query->row_array();
        $baru = $row['last']+1;
        return $baru;
    }

    function input($data)
    {
        $query = $this->db->query("insert into jenis_barang values('', '$data[nama_jenis]')");
    }

     function cek($kode){
        $this->db->where($this->primary,$kode);
        $query=$this->db->get($this->table);
        
        return $query;
    }

    function delete($kode){
        $this->db->where($this->primary,$kode);
        $this->db->delete($this->table);
    }

    function edit($id, $data)
    {
        $query  = $this->db->query("update jenis_barang set nama_jenis = '$data[nama_jenis]' where id_jenis= '$id'");
    }


}