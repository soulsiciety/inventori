<?php 
class M_kategori_barang extends CI_Model{
private $table = "kategori_barang";
private $primary ="id_kategori";
    function all()
    {
        $query = $this->db->query("select kategori_barang.*, jenis_barang.* from kategori_barang LEFT JOIN jenis_barang ON kategori_barang.id_jenis = jenis_barang.id_jenis GROUP BY id_kategori ASC");
        return $query;
    }

    function total_by_kategori($id_kategori)
    {
        $query = $this->db->query("select kategori_barang.*, barang.*, history_barang_masuk.*, sum(qty_masuk) as total from barang LEFT JOIN kategori_barang ON barang.id_kategori = kategori_barang.id_kategori LEFT JOIN history_barang_masuk ON barang.id_barang = history_barang_masuk.id_barang where kategori_barang.id_kategori = '$id_kategori'
            group BY kategori_barang.id_kategori");
        return $query;
    }
    function barang_by_kategori($id_kategori)
    {
        $query = $this->db->query("select barang.id_barang, barang.nama_barang, sum(qty_masuk) as total from barang LEFT JOIN kategori_barang ON barang.id_kategori = kategori_barang.id_kategori LEFT JOIN history_barang_masuk ON barang.id_barang = history_barang_masuk.id_barang where kategori_barang.id_kategori = '$id_kategori' group BY barang.id_barang");
        return $query;
    }

    function kategori_by_jenis($id_jenis)
    {
        $query = $this->db->query("select jenis_barang.*, kategori_barang.* from jenis_barang RIGHT JOIN kategori_barang ON jenis_barang.id_jenis = kategori_barang.id_jenis where jenis_barang.id_jenis ='$id_jenis'");
        return $query;
    }

    function get_last_no()
    {
        $query  = $this->db->query("select max(id_kategori) as last from kategori_barang");
        $row    = $query->row_array();
        $baru = $row['last']+1;
        return $baru;
    }

    function input($data)
    {
        $query = $this->db->query("insert into kategori_barang values('', '$data[nama_kategori]','$data[id_jenis]')");
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
        $query  = $this->db->query("update kategori_barang set nama_kategori = '$data[nama_kategori]' where id_kategori= '$id'");
    }
	
	function get_kat($id_jenis){
		$query = $this->db->query("select * from kategori_barang WHERE id_jenis='".$id_jenis."' GROUP BY id_kategori ASC");
        return $query;
	}

}